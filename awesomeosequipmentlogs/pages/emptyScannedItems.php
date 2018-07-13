<?php
session_start();
include ('config.php');
	$vusername = $_SESSION["awesomeOSverifierusername"];

 $sqlforemptyingtemptable = "DELETE FROM scanned_equipments WHERE vUsername = '$vusername'";
													if (!mysqli_query($link, $sqlforemptyingtemptable)) {
														die("yeah bitch");
													}
?>