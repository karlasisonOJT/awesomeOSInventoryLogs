<!DOCTYPE>
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

$serialNumber = "";
if (!isset($_POST["submit"])) {
		$serialNumber = "";
		}
		else{

			$serialNumber = test_input($_POST["serialNumber"]);
			$sql = "SELECT serialNumber FROM equipment WHERE serialNumber = ?";
			if($stmt = mysqli_prepare($link , $sql)){
				 mysqli_stmt_bind_param($stmt, "s", $param_serialNumber);
				 $param_serialNumber = $serialNumber;
				   if(mysqli_stmt_execute($stmt)){
				   		mysqli_stmt_store_result($stmt);
				   		if(mysqli_stmt_num_rows($stmt) == 1){
				   			mysqli_stmt_close($stmt);

				   			header("location: log_form.php?serialNumber=$serialNumber");

				   		}
				   		else{
				   			die("Item Not Found!".$serialNumber);
				   		}
				   }
				   else{
				   	die(mysqli_error($link));
				   }
			}
			else{
				die(mysqli_error($link));
			}

		}

 ?>

<a href="logout.php"><button> Log out</button></a>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post" >
	<label>SCAN ITEM </label>
	<input type="text" name="serialNumber" required/><br/>	
	<input type="submit" name="submit"/>
</form>
 <?php
include("../Layouts/footer.php"); 
?>
