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

 ?>
 <div>
 	<form>
 		<input type="text" id="searchbox" name="tosearchname" placeholder = "Search Name/ Username" onkeyup= "getUser(this.value)" value="">
 		<span id="message"></span>
 	</form>
 </div>
<table id="allUsers">
	<?php
	$sql = "SELECT * FROM verifier";
	printAllUsers($sql);
	?>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
}
?>
