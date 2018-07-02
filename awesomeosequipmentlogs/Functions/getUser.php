<?php
include ('../pages/config.php');
$username = $_REQUEST["verifieruname"];
$activity = $_REQUEST["activity"];

if ($activity =="1") {
	$newActivity ="2";
}
else{
	$newActivity ="1";
}

$sql = "UPDATE verifier SET active = ? WHERE verifierID = ?";
if($stmt = mysqli_prepare($link, $sql)){
	mysqli_stmt_bind_param($stmt, "ss", $param_active, $param_username);
				$param_active = $newActivity;
				$param_username = $username;
				 if(mysqli_stmt_execute($stmt)){
				 	
				 	echo $newActivity;
				 	mysqli_stmt_close($stmt);
				 }
				 else{
				 	echo "unsuccessful!";
				 	$username = mysqli_error($link);
				 }
}




?>