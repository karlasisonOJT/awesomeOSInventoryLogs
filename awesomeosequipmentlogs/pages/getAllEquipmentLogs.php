<?php
include ('../Functions/functions.php');

$c=0;
$q = $_REQUEST["tosearchequipmentlog"];
if ($q != "") {
	$sql= "SELECT * FROM equipment_logs LEFT JOIN equipment ON equipment_logs.serialNUmber = equipment.serialNumber WHERE equipment.equipmentBrand LIKE '%$q%' || equipment.equipmentName LIKE '%$q%' || equipment.serialNumber LIKE '%$q%' || equipment.officeTag LIKE '%$q%' || equipment_logs.logDate LIKE '%$q%'";
}
else{
$sql= "SELECT * FROM equipment_logs LEFT JOIN equipment ON equipment_logs.serialNUmber = equipment.serialNumber";
}

 
?>
<table>
	<?php 
	$num_rows = printAllEquipmentLogs($sql);
	echo " ".$num_rows;
	?>