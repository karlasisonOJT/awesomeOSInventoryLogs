<?php
include ('../pages/config.php');
$q = $_REQUEST["officeTag"];
$sql = "DELETE FROM scanned_equipments WHERE officeTag = '$q'";
if (mysqli_query($link, $sql)) {
	echo "Delete Successful!";
}
else{
	echo "Failed to delete equipment!";
}

 
?>
