<?php 
session_start();
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
    header("location: log-in.php");
}
if (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") != 0) {
	header("location: log-in.php");
}
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
include("../Layouts/footer.php"); 
?>
