<!DOCTYPE>
<?php
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 
include ('config.php');
?>
<?php 
			$verifierID= "1";
			$sql = "SELECT * FROM verifier WHERE verifierID = ?";
			if($stmt = mysqli_prepare($link , $sql)){
				 mysqli_stmt_bind_param($stmt, "s", $param_verifierID);
				 	$param_verifierID= $verifierID;
				 	if(mysqli_stmt_execute($stmt)){
				 		mysqli_stmt_store_result($stmt);
				 		if(mysqli_stmt_num_rows($stmt) == 0){
				   			mysqli_stmt_close($stmt);
				   			$sql = "INSERT INTO verifier (vUsername, vPassword, vFirstName, vLastName, active) VALUES (?, ?, ?, ?, ?)";
				   			 if($stmt = mysqli_prepare($link, $sql)){
				   			 	 mysqli_stmt_bind_param($stmt, "sssss", $param_vusername, $param_vpassword, $param_vfname, $param_vlname, $param_active);
				   			 	 $param_vusername = "admin";
				   				 $param_vpassword = md5("admin");
				   				 $param_vfname = "AwesomeOS";
				   				 $param_vlname = "Admin";
				   				 $param_active = "1";
				   				 if(mysqli_stmt_execute($stmt)){
				   				 	mysqli_stmt_close($stmt);
				   				 }
				   				 else{
				   				 	die(mysqli_error($link));
				   				 }
				   			 }
				   			 
				   			
				   		}
				   

				 	}
				 	else{
				   		die(mysqli_error($link));
				   				 }
			}

//echo "string";

		/*$vusername = $vpassword = "";

		if (!isset($_POST["submit"])) {
		$vusername = $vpassword = "";
		$vusername_err = $vpassword_err = "";
					echo "lkjda";

		}
		else{
						echo "lkjda";
		$vusername_err = $vpassword_err = "";
		 $vusername = test_input(trim($_POST["vUserName"]));
		 $vpassword =   test_input(trim($_POST["vPassword"]));		
		echo $vusername." ".$vpassword;	 
		}*/
 			?>
<html>
<body>
<script>
/*function submits(){
//	alert("working");
	//var message = document.getElementById("warningmessage").innerHTML;
	//alert(message);
		var uname = $('#uname').val();
		var password = $('#password').val();
		$.post('../Functions/validate_login.php',{postuname:uname,postpassword:password},
			function(data){
				$('#result').html(data);
			});


}*/
function validation(){  
var name=document.loginForm.vUserName.value;  
var password=document.loginForm.vPassword.value;  
  
if (name==null || name==""){  
  alert("Name can't be blank");  
  return false;  
}else if(password.length<6){  
  alert("Password must be at least 6 characters long.");  
  return false;  
  }  
}  

/*
</script>
<form id = "loginform" name = "loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" onsubmit = "return validation()">
	<label>Username: </label>
	<input type="text" id = "uname" name="vUserName" maxlength="50" onkeyup="showHint(this.value)" required/><br/>
	<span id="warningmessage"></span><br/>

	<label>Password: </label>
	<input type="password" id = "password" name="vPassword" required/><br/>
	<input type="submit" name="submit" />
</form>
<div id="result"></div>
  </body>

  </html>