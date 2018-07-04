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
include("../Functions/functions.php"); 
include ('config.php');

?>
<?php
$userID = $_SESSION["awesomeOSverifierID"];
$newpass= $confirmpass = "";
$newpass_err= $confirmpass_err = "";
if (!isset($_POST["changePassword"])) {
$newpass= $confirmpass = "";
$newpass_err= $confirmpass_err = "";
}
elseif (isset($_POST["changePassword"])) {
	if (empty(trim($_POST["upw"]))) {
		$newpass_err ="Please fill in this field!";
	}
	else{
		$newpass = trim($_POST["upw"]);
	}

	if (empty(trim($_POST["upwconfirm"]))) {
		$newpass_err ="Please fill in this field!";
	}
	else{
		$confirmpass = trim($_POST["upwconfirm"]);
	}

	if (strcasecmp($newpass, $confirmpass) !=0) {
		$newpass_err = "Passwords not matched!";
	}

	if (empty($newpass_err) && empty($confirmpass_err)) {
		$newpass = md5($newpass);
		$sql = "UPDATE verifier SET vPassword = ? WHERE verifierID = ?";
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "ss", $param_usernewpw, $param_userid);
						$param_usernewpw = $newpass;
						$param_userid = $userID;
						 if(mysqli_stmt_execute($stmt)){
						 	
						 		//$message = "Password change successful for user ". $userid. "<br/>New Password: ".$userpw;

						 	mysqli_stmt_close($stmt);
						 }
						 else{
							die(mysqli_error($link));
						 	//$username = mysqli_error($link);
						 }
		}

	}

}

?>

				<div id="changeownpass" >
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
					<label>User ID:</label>
						<input type="text" id="uid" name="uID" value="<?php echo $userID;?>" readonly=""><br/>
					<label> New Password: </label>
						<input type="password" id = "uPassw" name = "upw" value="" required>
						<u><span id="show" onclick = "showpass()">Show Password</span></u><br/>
						<span><?php echo $newpass_err;?></span><br/>
					<label> Confirm Password: </label>
						<input type="password" id = "uPasswconfirm" name = "upwconfirm" value="" required><br/>
						<span><?php echo $confirmpass_err;?></span><br/>
					<input type="submit" name="changePassword" value="Change Password" >
					</form>
				</div>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>