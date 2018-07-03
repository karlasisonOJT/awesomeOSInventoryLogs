<?php
include ('functions.php');

$c=0;
$q = $_REQUEST["usertosearch"];
if ($q != "") {
	$sql= "SELECT * FROM verifier WHERE vUsername LIKE '%$q%'";
}
else{
$sql= "SELECT * FROM verifier";

}

 
?>
<table>
	<?php 
	$num_rows = printAllUsers($sql);
	echo " ".$num_rows;
	?>