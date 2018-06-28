<?php
session_start();
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include ('config.php');

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
    header("location: log-in.php");
}
?>
<?php
if (isset($_GET["serialNumber"])) {
	$serialNumber = trim($_GET["serialNumber"]);

				$sql = "SELECT serialNumber FROM equipment WHERE serialNumber = ?";
				if($stmt = mysqli_prepare($link , $sql)){
					 mysqli_stmt_bind_param($stmt, "s", $param_serialNumber);
					 $param_serialNumber = $serialNumber;
					   if(mysqli_stmt_execute($stmt)){
					   		mysqli_stmt_store_result($stmt);
					   		if(mysqli_stmt_num_rows($stmt) >0){
					   			mysqli_stmt_close($stmt);
					   			die("Item number ".$serialNumber." already in the database. Please scan another equipment.");
					   		}
					   		
					   }
					   else{
					   	die(mysqli_error($link));
					   }
				}
				else{
					die(mysqli_error($link));
				}
	if (!isset($_POST["submit"])) {
		$officeTag = $equipmentName = $equipmentBrand = "";
	}
	elseif (isset($_POST["submit"])) {
		$officeTag = trim($_POST["officeTag"]);
		$equipmentName = trim($_POST["equipmentName"]);
		$equipmentBrand = trim($_POST["equipmentBrand"]);
		$active = "1";
		 $sql = "INSERT INTO equipment (serialNumber, officeTag, equipmentName, equipmentBrand) VALUES (?,?,?,?,?)";
		 if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "ssssss", $param_serialNumber, $param_officeTag, $param_equipmentName, $param_equipmentBrand,$param_active);
			$param_serialNumber = $serialNumber;
			$param_officeTag = $officeTag;
			$param_equipmentName = $equipmentName;
			$param_equipmentBrand = $equipmentBrand;
			$param_active = $active;
			if(mysqli_stmt_execute($stmt)){

				mysqli_stmt_close($stmt);
				header("location: log-in.php");
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
	<input type="text" name="officeTag" value="" required/><br/>
	<label>Equipment Name: </label>
	<input type="text" name="equipmentName" value="" required/><br/>
	<label>Brand: </label>
	<input type="text" name="equipmentBrand" value="" required/><br/>
<input type="submit" name="submit"/>

</form>
<?php
include("../Layouts/footer.php"); 
?>