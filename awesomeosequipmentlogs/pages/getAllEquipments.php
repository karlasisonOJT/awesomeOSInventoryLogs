<?php
include ('../Functions/functions.php');

$c=0;
$q = $_REQUEST["tosearchequipment"];
if ($q != "") {
	$sql= "SELECT * FROM equipment WHERE equipmentBrand LIKE '%$q%' || equipmentName LIKE '%$q%' || serialNumber LIKE '%$q%' || officeTag LIKE '%$q%'";
}
else{
$sql= "SELECT * FROM equipment";

}

 
?>
<table>
	<?php 
	$num_rows = printAllEquipment($sql);
	echo " ".$num_rows;
	?>