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
$serialNumber=$officeTag = $equipmentName = $equipmentBrand = "";
$serialNumber_err= $officeTag_err = $equipmentName_err = $equipmentBrand_err = "";
		
		if (!isset($_POST["submit"])) {
		$officeTag = $equipmentName = $equipmentBrand = "";
		$officeTag_err = $equipmentName_err = $equipmentBrand_err = "";
	}
	elseif (isset($_POST["submit"])) {
			$serialNumber=$officeTag = $equipmentName = $equipmentBrand = "";
			$serialNumber_err= $officeTag_err = $equipmentName_err = $equipmentBrand_err = "";

		if (empty(trim($_POST["serialNumber"]))) {
			$serialNumber_err = "Please fill this field";
		}
		else{
			$serialNumber = trim($_POST["officeTag"]);
		}

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
					   			die("Office Tag".$officeTag." already in the database. Please <a href='enternewequipment.php'/> scan</a> another equipment.");
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
			//	header("location: scannewequipment.php");
				?>
				<META http-equiv="refresh" content = "0;URL=displayequipments.php">
				<?php
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
	?>
<html>
<body>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
	<label>Serial Number: </label><br/>
	<input class="awesometextareas" type="text" name="serialNumber" value="<?php echo $serialNumber; ?>" autofocus/><br/>
	<span id = "scan_error"><?php echo $serialNumber_err; ?></span><br/>
	<label>Office Tag: </label><br/>
	<input class="awesometextareas" type="text" name="officeTag" autofocus="autofocus" value="<?php echo $officeTag; ?>" required/><br/>
	<span id = "scan_error"><?php echo $officeTag_err; ?></span><br/>
	<label>Equipment Name: </label><br/>
	<input class="awesometextareas" type="text" name="equipmentName" value="<?php echo $equipmentName; ?>" required/><br/>
	<span id = "scan_error"><?php echo $equipmentName_err; ?></span><br/>
	<label>Brand: </label><br/>
	<input class="awesometextareas" type="text" name="equipmentBrand" value="<?php echo $equipmentBrand; ?>" required/><br/>
	<span id = "scan_error"><?php echo $equipmentBrand_err; ?></span><br/>

<input  id="submitbtn" type="submit" name="submit"/>
</form>
<a href="displayequipments.php"><button  id="cancelbtn">Cancel</button></a>

<?php
include("../Layouts/footer.php"); 
include("../Functions/functions.php"); 

}
?>