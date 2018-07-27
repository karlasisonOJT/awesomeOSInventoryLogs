<?php 
session_start();
if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
   ?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php
}

else{
if (strpos($_SESSION["awesomeOSverifierusername"], "admin") === true){
	?>
<META http-equiv="refresh" content = "0;URL=log-in.php">
  <?php
}
else{
	

include("../Layouts/header.php"); 
include("../Functions/functions.php"); 

 ?>
 <?php
	$tosearch = "";
	$sql = "SELECT * FROM verifier";
if (isset($_POST["submitSearch"])) {
		$q = $_POST["tosearchname"];
	$sql= "SELECT * FROM verifier WHERE vUsername LIKE '%$q%'";
	$tosearch = $q;
}
elseif(isset($_POST["resetbtn"])){
		$tosearch = "";
		?>
<META http-equiv="refresh" content = "0;URL=deactivateuser.php">
  <?php
	//$sql = "SELECT * FROM verifier";
}
?>
 <div id="searchform">
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" id="searchdiv" >
 		<input class="awesometextareas" type="text" id="searchbox" name="tosearchname" placeholder = "Search Name/ Username" onkeyup= "getUser(this.value)" value="<?php echo $tosearch;?>" required>
		<input id="submitbtn" type="submit" name="submitSearch" value="Search" >
 	</form>
  <a href="deactivateuser.php"><button id="cancelbtn" >Reset Form</button></a>
 		<span id="message"></span>
 </div>
 <div id="users">
<table id="allUsers">
	<?php
	printAllUsers($sql);
	?>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
}
?>
