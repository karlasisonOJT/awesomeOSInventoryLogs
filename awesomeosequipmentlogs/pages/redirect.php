<!DOCTYPE>
<?php
session_start();

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
	?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php

}
else{

include("../Layouts/header.php"); 
include ('config.php');

?>
<html>
<body>
<p>Success! You are being redirected.</p>
<META http-equiv="refresh" content = "0;URL=scan.php">
 <?php
 include("../Functions/functions.php"); 
include("../Layouts/footer.php"); 
}
?>