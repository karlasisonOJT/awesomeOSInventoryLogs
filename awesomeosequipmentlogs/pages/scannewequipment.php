<!DOCTYPE>
<?php
session_start();

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
   // header("location: log-in.php");
	?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php

}
else{

include("../Layouts/header.php"); 
include ('config.php');

?>
<?php 

$serialNumber = "";
$serialNumber_err = "";
if (!isset($_POST["submit"])) {
		$serialNumber = "";
		$serialNumber_err = "";
		}
		else{
			$serialNumber = "";
			$serialNumber_err = "";

			if (empty(trim($_POST["serialNumber"]))) {
				$serialNumber_err = "Please fill this field";
			}
			else{
				$serialNumber = trim($_POST["serialNumber"]);
			}

			if (empty($serialNumber_err)) {
				   			header("location: enternewequipment.php?serialNumber=$serialNumber");

			}
		}

 ?>

<html>
<body>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
	<label>SCAN NEW ITEM </label>
	<input type="text" name="serialNumber" required/><br/>	
	<span id = "scan_error"><?php echo $serialNumber_err; ?></span><br/>
	<input type="submit" name="submit"/>
</form>

 <?php
 include("../Functions/functions.php"); 
include("../Layouts/footer.php"); 
}
?>