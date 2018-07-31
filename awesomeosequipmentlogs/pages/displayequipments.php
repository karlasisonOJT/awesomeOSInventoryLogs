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
	$sql = "SELECT * FROM equipment";
	if (isset($_POST["search"])) {
		$q = $_POST["tosearchequipment"];
	$sql= "SELECT * FROM equipment WHERE equipmentBrand LIKE '%$q%' || equipmentName LIKE '%$q%' || serialNumber LIKE '%$q%' || officeTag LIKE '%$q%'";
	$tosearch = $q;
}
elseif(isset($_POST["reset"])){
		$tosearch = "";
	$sql = "SELECT * FROM equipment";
}
?>
<div> <a href="enternewequipment.php"><button id="navigation">Scan new equipment</button></a></div>
<div>
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
 		<input class="awesometextareas" type="text" id="equipmentsearchbox" name="tosearchequipment" placeholder = "Search Equipment" onkeyup= "getequipment(this.value)" value="<?php echo $tosearch;?>" required>
 		<input id="submitbtn" type="submit" name="search" value="Search" >
 		<input id="cancelbtn" type="submit" value="Reset Form" name="reset">
 	</form>
 </div>
  		<span id="message"></span>
 <table id="allequipments">
	<?php

	printAllEquipment($sql);
	?>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>