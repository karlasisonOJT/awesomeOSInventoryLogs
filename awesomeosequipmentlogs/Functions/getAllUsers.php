<?php
include ('functions.php');

$c=0;
$q = $_REQUEST["usertosearch"];
if ($q != "") {
	$sql= "SELECT * FROM verifier WHERE vUsername LIKE '%$q%'";
}
elseif(($q = "") || empty($q) || ($q = null)){
$sql= "SELECT * FROM verifier";
}

?>
<table>
	<?php 
	$num_rows = printAllUsers($sql);
	echo $num_rows;
	?>
	