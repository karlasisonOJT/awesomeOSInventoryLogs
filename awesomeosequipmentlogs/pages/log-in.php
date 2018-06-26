<!DOCTYPE>
<?php
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 
include ('config.php');
?>
<?php 
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
	<input type="text" id = "uname" name="vUserName" maxlength="50" onkeyup="showHint(this.value)" /><br/>
	<span id="warningmessage"></span><br/>

	<label>Password: </label>
	<input type="password" id = "password" name="vPassword" /><br/>
	<input type="submit" name="submit" />
</form>
<div id="result"></div>
  </body>

  </html>