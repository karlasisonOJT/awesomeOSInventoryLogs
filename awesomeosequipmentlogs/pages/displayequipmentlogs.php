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
	$offset =0;
	$count = 10;
$link2 = mysqli_connect("localhost", "root", "", "awesomeos_equipment_logs");
if($link2 === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
	$resquery= "SELECT COUNT(*) as cnt FROM equipment_logs";
	if ($rescntr= mysqli_query($link2, $resquery)) {
		$row = mysqli_fetch_assoc($rescntr);
	$resultcount=$row["cnt"];
	mysqli_close($link2);
	}
	else{
		die(mysqli_error($link2));
	}
	
	$sql = "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID ORDER BY  equipment_logs.logNumber desc LIMIT $offset, $count";
	$toappendsql = "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID ORDER BY  equipment_logs.logNumber desc";
	if (isset($_POST["search"])) {
		$q = $_POST["tosearchequipmentlog"];
	$sql= "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID WHERE equipment.equipmentBrand LIKE '%$q%' || equipment.equipmentName LIKE '%$q%' || equipment.serialNumber LIKE '%$q%' || equipment.officeTag LIKE '%$q%' || equipment_logs.logDate LIKE '%$q%' || equipment_logs.borrowerFirstName LIKE '%$q%' || equipment_logs.borrowerLastName LIKE '%$q%' || equipment_logs.logdate LIKE '%$q%' || equipment_logs.site LIKE '%$q%' || CONCAT(equipment_logs.borrowerFirstName,' ' ,equipment_logs.borrowerLastName) LIKE '%$q%' || verifier.vFirstName LIKE '%$q%' || verifier.vLastName LIKE '%$q%' ORDER BY  equipment_logs.logNumber desc";

	$tosearch = $q;
	$count=null;
	$resultcount=null;
	echo "<script type='text/javascript'>
document.getElementById('resultpages').style.display ='none';
                 document.getElementById('divpages').style.display ='none';	
                 </script>";
}
elseif(isset($_POST["reset"])){
		$tosearch = "";
	$sql = "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID ORDER BY  equipment_logs.logNumber desc LIMIT $offset, $count";
	$toappendsql = "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID ORDER BY  equipment_logs.logNumber desc";
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
<br/>
 <div id="divpages">
 <?php
if ($count!=null) {
	?>
<select onchange = "paginateresults(this.value, <?php echo $resultcount;?>, <?php  echo "'".$toappendsql."' ";?>)">
		<option>10</option>
		<option>20</option>
		<option>30</option>
		<option>Show All</option>
	</select>
	<?php
}
 ?>
	
</div>
<br/>
<div id="resultpages">
<script type="text/javascript">
	paginateresults(<?php echo $count;?>, <?php echo $resultcount;?>, <?php echo "\"".$toappendsql."\" "; ?>);
</script>
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