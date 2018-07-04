<?php 
session_start();
if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
   ?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php
}
else{
if (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") != 0) {
	?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php
}
else{

include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include ('config.php');


 ?>
<?php 
$vfname = $vlname = $vusername = $vpassword = "";
$vfname_err = $vlname_err = $vusername_err = $vpassword_err = "";
 ?>
 <?php

if (!isset($_POST["submit"])) {
	$vfname = $vlname = $vusername = $vpassword = "";
	$vfname_err = $vlname_err = $vusername_err = $vpassword_err = "";

}
elseif (isset($_POST["submit"])) {
	$vfname = $vlname = $vusername = $vpassword = "";
	$vfname_err = $vlname_err = $vusername_err = $vpassword_err = "";

	if (empty(trim($_POST["ufname"]))) {
			$vfname_err = "Please fill this field";
		}
		else{
			$vfname = trim($_POST["ufname"]);
		}

	if (empty(trim($_POST["ulname"]))) {
			$vlname_err = "Please fill this field";
		}
		else{
			$vlname = trim($_POST["ulname"]);
		}

	if (empty(trim($_POST["username"]))) {
			$vusername_err = "Please fill this field";
		}
		else{
			$vusername = trim($_POST["username"]);
		}	

	if (empty(trim($_POST["upassword"]))) {
			$vpassword_err = "Please fill this field";
		}
		else{
			$vpassword = trim($_POST["upassword"]);
		}
	
	if (empty($vfname_err) && empty($vlname_err) && empty($vusername_err) && empty($vpassword_err)) {
		$sqltest = "SELECT * FROM verifier where vUsername = '$vusername'";
		if ($result = mysqli_query($link, $sqltest)) {
			if (mysqli_num_rows($result) == 0) {
				$sql = "INSERT INTO verifier (vUsername, vPassword, vFirstName, vLastName, active) VALUES (?, ?, ?, ?, ?)";
	if($stmt = mysqli_prepare($link, $sql)){
		mysqli_stmt_bind_param($stmt, "sssss", $param_vusername, $param_vpassword, $param_vfname, $param_vlname, $param_active);
		$param_vusername = $vusername;
		$param_vpassword = md5($vpassword );
		$param_vfname = $vfname;
		$param_vlname = $vlname;
		$param_active = "1";
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_close($stmt);
		$vfname = $vlname = $vusername = $vpassword = "";
		$vfname_err = $vlname_err = $vusername_err = $vpassword_err = "";
		}
	 else{
			die(mysqli_error($link));
		}
	}	
			}
			else{
				die("Sorry, username already in the database.");
			}
		}

		
	}
	

}

$sql = "SELECT * FROM verifier";

				if ($result = mysqli_query($link, $sql)) {
					$ID = mysqli_num_rows($result) + 1;
					echo $ID;
				}
 ?>
<html>
<body>
<form id = "createUser" name = "createUser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">

	<input type="text" id="uID" value="<?php echo $ID;?>" hidden/>
	<label>First Name: </label>
	<input type="text" id = "fname" name="ufname" maxlength="50" onkeyup ="getName();" value = "<?php echo $vfname;?>" required/><br/>
	<span id=""><?php echo $vfname_err;?> </span><br/>

	<label>Last Name: </label>
	<input type="text" id = "lname" name="ulname" maxlength="50" onkeyup="getName();" value = "<?php echo $vlname;?>" required/><br/>
	<span id=""><?php echo $vlname_err;?> </span><br/>

	<label>Username: </label>
	<input type="text" id = "username" name="username"  maxlength="50" value = "<?php echo $vusername;?>" readonly/><br/>
	<span id=""><?php echo $vusername_err;?></span><br/>

	<label>USER PASSWORD: </label>
	<input type="text" id = "password" name="upassword"  value = "<?php echo $vpassword;?>" readonly/><br/>
	<span id=""><?php echo $vpassword_err;?></span><br/>

	<input type="submit" name="submit" />
</form>
<div id="result"></div>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
}
?>