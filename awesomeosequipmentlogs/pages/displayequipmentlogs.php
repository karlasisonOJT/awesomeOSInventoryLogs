<?php
session_start();
if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
   // header("location: log-in.php");
	?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php

}
else{
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 


?>
<?php
	$tosearch = "";
	$sql = "SELECT * FROM (equipment LEFT JOIN equipment_logs ON equipment.serialNUmber = equipment_logs.serialNumber) LEFT JOIN verifier ON equipment_logs.verifierID = verifier.verifierID ORDER BY  equipment_logs.logNumber desc";
	if (isset($_POST["search"])) {
		$q = $_POST["tosearchequipmentlog"];
	$sql= "SELECT * FROM (equipment LEFT JOIN equipment_logs ON equipment.serialNUmber = equipment_logs.serialNumber) LEFT JOIN verifier ON equipment_logs.verifierID = verifier.verifierID WHERE equipment.equipmentBrand LIKE '%$q%' || equipment.equipmentName LIKE '%$q%' || equipment.serialNumber LIKE '%$q%' || equipment.officeTag LIKE '%$q%' || equipment_logs.logDate LIKE '%$q%' || equipment_logs.borrowerFirstName LIKE '%$q%' || equipment_logs.borrowerLastName LIKE '%$q%' || equipment_logs.logdate LIKE '%$q%' || equipment_logs.site LIKE '%$q%' || CONCAT(equipment_logs.borrowerFirstName,' ' ,equipment_logs.borrowerLastName) LIKE '%$q%' || verifier.vFirstName LIKE '%$q%' || verifier.vLastName LIKE '%$q%' || CONCAT(verifier.vFirstName, ' ', verifier.vLastName) LIKE '%$q%' ORDER BY  equipment_logs.logNumber desc";
	$tosearch = $q;
}
elseif(isset($_POST["reset"])){
		$tosearch = "";
	$sql = "SELECT * FROM (equipment LEFT JOIN equipment_logs ON equipment.serialNUmber = equipment_logs.serialNumber) LEFT JOIN verifier ON equipment_logs.verifierID = verifier.verifierID ORDER BY  equipment_logs.logNumber desc";
}
?>

<div>
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
 		<input class="awesometextareas" type="text" id="equipmentlogsearchbox" name="tosearchequipmentlog" placeholder = "Search Equipment Log" onkeyup= "getequipmentlog(this.value)" value="<?php echo $tosearch;?>" required>
 		 <input id="submitbtn" type="submit" name="search" value="Search" >
 		<input id="cancelbtn" type="submit" value="Reset Form" name="reset">
 		<span id="message"></span>
 	</form>
 </div>
 <table id="allequipmentlogs">
	<?php
	printAllEquipmentLogs($sql);
	?>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>