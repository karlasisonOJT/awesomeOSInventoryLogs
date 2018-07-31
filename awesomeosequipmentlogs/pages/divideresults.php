<?php
include ('../Functions/functions.php');

$rescount=$_REQUEST["rcount"];
$resoffset= $_REQUEST["resoffset"];
$resquery=$_REQUEST["qry"];
?>

<table>
	<?php 
	$newq = $resquery." LIMIT ".$resoffset.", ".$rescount;
	printAllEquipmentLogs($newq);
	?>