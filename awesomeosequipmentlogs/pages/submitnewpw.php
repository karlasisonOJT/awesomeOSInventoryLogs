<?php
include ('config.php');

$userid = $_REQUEST["userID"];
$userpw = $_REQUEST["newPW"];
$usernewpw = md5($userpw);
$message = "";
$sql = "UPDATE verifier SET vPassword = ? WHERE verifierID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "ss", $param_usernewpw, $param_userid);
				$param_usernewpw = $usernewpw;
				$param_userid = $userid;
				 if(mysqli_stmt_execute($stmt)){
				 	
				 		$message = "Password change successful for user ". $userid. "<br/>New Password: ".$userpw;

				 	mysqli_stmt_close($stmt);
				 }
				 else{
					$message = mysqli_error($link);
				 	//$username = mysqli_error($link);
				 }
}

echo $message;
?>