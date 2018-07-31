<?php
include ('../Functions/functions.php');

$c=0;
$q = $_REQUEST["tosearchequipmentlog"];
if ($q != "") {
$sql= "SELECT * FROM (equipment_logs LEFT JOIN equipment ON equipment_logs.officeTag = equipment.officeTag) LEFT JOIN verifier ON equipment_logs.verifierID= verifier.verifierID WHERE equipment.equipmentBrand LIKE '%$q%' || equipment.equipmentName LIKE '%$q%' || equipment.serialNumber LIKE '%$q%' || equipment.officeTag LIKE '%$q%' || equipment_logs.logDate LIKE '%$q%' || equipment_logs.borrowerFirstName LIKE '%$q%' || equipment_logs.borrowerLastName LIKE '%$q%' || equipment_logs.logdate LIKE '%$q%' || equipment_logs.site LIKE '%$q%' || CONCAT(equipment_logs.borrowerFirstName,' ' ,equipment_logs.borrowerLastName) LIKE '%$q%' || verifier.vFirstName LIKE '%$q%' || verifier.vLastName LIKE '%$q%' || CONCAT(verifier.vFirstName, ' ', verifier.vLastName) LIKE '%$q%' ORDER BY  equipment_logs.logNumber desc";}
else{
	$sql = "SELECT * FROM (equipment LEFT JOIN equipment_logs ON equipment.serialNUmber = equipment_logs.serialNumber) LEFT JOIN verifier ON equipment_logs.verifierID = verifier.verifierID ";
}

 
?>
<table>
	<?php 
	$num_rows = printAllEquipmentLogs($sql);
	echo " ".$num_rows;
	?>