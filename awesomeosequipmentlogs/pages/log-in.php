<!DOCTYPE>
<?php
session_start();
if (isset($_SESSION["awesomeOSverifierusername"])) {
    //header("location: scan.php?user=$_SESSION[awesomeOSverifierusername]");
  ?>
<META http-equiv="refresh" content = "0;URL=scan.php">
  <?php
}
else{
include("../Layouts/loginheader.php"); 
include("../Functions/functions.php"); 
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
if (!isset($_POST["submit"])) {
	$verifierusername = $verifierpassword = "";
	$verifierusername_err = $verifierpassword_err = "";
}
elseif (isset($_POST["submit"])) {
	$verifierusername = $verifierpassword = "";
	$verifierusername_err = $verifierpassword_err = "";

	if(!filter_var(trim($_POST["vUserName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9-.\s ]+$/")))){
        $verifierusername_err = 'Invalid username.';
    } 
    elseif(empty(trim($_POST["vUserName"]))){
    	$verifierusername_err = 'Please fill this field';
    }
    else{
        $verifierusername = trim($_POST["vUserName"]);
    }

    if(!filter_var(trim($_POST["vPassword"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9-.\s ]+$/")))){
        $verifierpassword_err = 'Invalid password.';
    }
    elseif(empty(trim($_POST["vPassword"]))){
    	$verifierpassword_err = 'Please fill this field';
    }
    else{
        $verifierpassword = trim($_POST["vPassword"]);
    }

      if(empty($verifierusername_err) && empty($verifierpassword_err)){
      	    $sql = "SELECT verifierID, vUsername, vPassword, vFirstName, vLastName, active FROM verifier WHERE vUsername = ?";
      	     if($stmt = mysqli_prepare($link, $sql)){
      	     	 mysqli_stmt_bind_param($stmt, "s", $param_vusername);
      	     	 $param_vusername = $verifierusername;
      	     	 if(mysqli_stmt_execute($stmt)){
      	     	 	mysqli_stmt_store_result($stmt);
      	     	 	 if(mysqli_stmt_num_rows($stmt) == 1){
      	     	 	 	mysqli_stmt_bind_result($stmt, $verifierid, $vusername, $hashed_password, $vFirstName, $vLastName, $active);
                    	if(mysqli_stmt_fetch($stmt)){
                    		if ($active == 1) {
                    			
                    		
                    		if (strcasecmp(md5($verifierpassword), $hashed_password) ==0) {
                    			
                            $_SESSION['awesomeOSverifierusername'] = $verifierusername;
                            $_SESSION['awesomeOSverifierfirstname'] = $vFirstName;
                            $_SESSION['awesomeOSverifierlastname'] = $vLastName;
                            $_SESSION["awesomeOSverifierID"] = $verifierid;
                            //die($hashed_password." - ". $verifierpassword." - ".$_SESSION['awesomeOSverifierusername'] ."<br/>".$_SESSION['awesomeOSverifierfirstname']." ".$_SESSION['awesomeOSverifierlastname']);
                                //header("location: scan.php?user=$_SESSION[awesomeOSverifierusername]");
                                                  ?>
                      <META http-equiv="refresh" content = "0;URL=scan.php">
                        <?php
                    		}
                    		else{
                    		 $verifierpassword_err = 'Incorrect password.';                 			
                    		}
                    		}
                    		else{
                    			die("Sorry, you are restricted from logging in.");
                    		}

                    	}
      	     	 	 }
      	     	 	 else{
      	     	 	 	$verifierusername_err = 'Username not found!';
      	     	 	 }
      	     	 }
      	     }
      }


}

 			?>

<form id = "loginform" name = "loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
	<label>Username: </label>
	<input type="text" id = "uname" name="vUserName" maxlength="50" onkeyup="showHint(this.value)" value = "<?php echo $verifierusername;?>"required/><br/>
		<span id = "username_err"><?php echo $verifierusername_err; ?></span>
	<span id="warningmessage" ></span><br/>

	<label>Password: </label>
	<input type="password" id = "password" name="vPassword" required/>
		<span id = "password_err"><?php echo $verifierpassword_err; ?></span><br/>
	<input type="submit" name="submit" /><br/>
</form>

<?php
include("../JS Files/logqueries.js"); 
include("../Layouts/footer.php"); 
}
?>
