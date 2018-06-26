<?php
include ('../pages/config.php');

$c=0;
$sql= "SELECT vUserName FROM verifier";
$result = mysqli_query($link, $sql); 
 while($row = mysqli_fetch_assoc($result)){
 	$user[$c] =  $row;
 	$c++;
 }

$q = $_REQUEST["q"];

$warning = "";
$r = 0;
if ($q != "") {
	foreach ($user as $uname) {
		foreach ($uname as $value) {
		if (strcasecmp($value, $q) == 0) {
			$r++;
		}
		}
	}
	if ($r == 0) {
		$warning = "no matches";
	}
	else{
		$warning = "correct!";
	}
}
echo " ".$warning;


?>