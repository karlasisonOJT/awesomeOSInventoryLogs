<?php 
session_start();
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 
include ('config.php');

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
    header("location: log-in.php");
}
if (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") != 0) {
	header("location: log-in.php");
}
 ?>
<?php 
$sql = "SELECT * FROM verifier";

if ($result = mysqli_query($link, $sql)) {
	$ID = mysqli_num_rows($result) + 1;
	echo $ID;
}
 ?>
 <?php

if (!isset($_POST["submit"])) {
	$vfname = $vlname = $vusername = $vpassword = "";
}
elseif (isset($_POST["submit"])) {
	$vfname = $_POST["ufname"];
	$vlname = $_POST["ulname"];
	$vusername = $_POST["username"];
	$vpassword = $_POST["upassword"];
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
		}
	 else{
			die(mysqli_error($link));
		}
	}	
}
 ?>
<html>
<body>
<form id = "createUser" name = "createUser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">

	<input type="text" id="uID" value="<?php echo $ID;?>" hidden/>
	<label>First Name: </label>
	<input type="text" id = "fname" name="ufname" maxlength="50" onkeyup ="getName();" required/><br/>
	<span id="blah"></span><br/>

	<label>Last Name: </label>
	<input type="text" id = "lname" name="ulname" maxlength="50" onkeyup="getName();"required/><br/>
	<span id=""></span><br/>

	<label>Username: </label>
	<input type="text" id = "username" name="username" value = "" maxlength="50" readonly/><br/>
	<span id=""></span><br/>

	<label>USER PASSWORD: </label>
	<input type="text" id = "password" name="upassword" value = "" readonly/><br/>

	<input type="submit" name="submit" />
</form>
<div id="result"></div>
<?php
include("../Layouts/footer.php"); 
?>