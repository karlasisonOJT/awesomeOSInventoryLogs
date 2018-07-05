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
$officeTag = $equipmentName = $equipmentBrand = "";
		$officeTag_err = $equipmentName_err = $equipmentBrand_err = "";
if (isset($_GET["serialNumber"])) {
	$serialNumber = trim($_GET["serialNumber"]);

				
	if (!isset($_POST["submit"])) {
		$officeTag = $equipmentName = $equipmentBrand = "";
		$officeTag_err = $equipmentName_err = $equipmentBrand_err = "";
	}
	elseif (isset($_POST["submit"])) {
		$officeTag = $equipmentName = $equipmentBrand = "";
		$officeTag_err = $equipmentName_err = $equipmentBrand_err = "";

		if (empty(trim($_POST["officeTag"]))) {
			$officeTag_err = "Please fill this field";
		}
		else{
			$officeTag = trim($_POST["officeTag"]);
		}

		if (empty(trim($_POST["equipmentName"]))) {
			$equipmentName_err = "Please fill this field";
		}
		else{
			$equipmentName = trim($_POST["equipmentName"]);
		}
		if (empty(trim($_POST["equipmentBrand"]))) {
			$equipmentBrand_err = "Please fill this field";
		}
		else{
			$equipmentBrand = trim($_POST["equipmentBrand"]);
		}

		$sql = "SELECT serialNumber FROM equipment WHERE officeTag = ?";
				if($stmt = mysqli_prepare($link , $sql)){
					 mysqli_stmt_bind_param($stmt, "s", $param_officeTag);
					 $param_officeTag = $officeTag;
					   if(mysqli_stmt_execute($stmt)){
					   		mysqli_stmt_store_result($stmt);
					   		if(mysqli_stmt_num_rows($stmt) >0){
					   			mysqli_stmt_close($stmt);
					   			die("Office Tag".$officeTag." already in the database. Please scan another equipment.");
					   		}
					   		
					   }
					   else{
					   	die(mysqli_error($link));
					   }
				}
				else{
					die(mysqli_error($link));
				}

if (empty($officeTag_err) && empty($equipmentName_err) && empty($equipmentBrand_err)) {
	$active = "1";
		 $sql = "INSERT INTO equipment (serialNumber, officeTag, equipmentName, equipmentBrand, active) VALUES (?,?,?,?,?)";
		 if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "sssss", $param_serialNumber, $param_officeTag, $param_equipmentName, $param_equipmentBrand, $param_active);
			$param_serialNumber = $serialNumber;
			$param_officeTag = $officeTag;
			$param_equipmentName = $equipmentName;
			$param_equipmentBrand = $equipmentBrand;
			$param_active = $active;
			if(mysqli_stmt_execute($stmt)){

				mysqli_stmt_close($stmt);
				header("location: scannewequipment.php");
			}
		 else{
				die(mysqli_error($link));
			}
		}
		else{
			die(mysqli_error($link));

		}
}
		
	}
}
else{
	header("location: scannewequipment.php");
}

?>
<html>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?serialNumber=".$serialNumber;?>" method = "post" >
	<label>Serial Number: </label>
	<input type="text" name="serialNumber" value="<?php echo $serialNumber; ?>" readonly/><br/>
	<label>Office Tag: </label>
	<input type="text" name="officeTag" value="<?php echo $officeTag; ?>" required/><br/>
	<span id = "scan_error"><?php echo $officeTag_err; ?></span><br/>
	<label>Equipment Name: </label>
	<input type="text" name="equipmentName" value="<?php echo $equipmentName; ?>" required/><br/>
	<span id = "scan_error"><?php echo $equipmentName_err; ?></span><br/>
	<label>Brand: </label>
	<input type="text" name="equipmentBrand" value="<?php echo $equipmentBrand; ?>" required/><br/>
	<span id = "scan_error"><?php echo $equipmentBrand_err; ?></span><br/>

<input type="submit" name="submit"/>

</form>
<?php
include("../Layouts/footer.php"); 
include("../Functions/functions.php"); 

}
?>