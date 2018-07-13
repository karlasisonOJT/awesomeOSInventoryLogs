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
	$sql = "SELECT * FROM verifier";
}
?>
 <div>
 	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post" >
 		<input type="text" id="searchbox" name="tosearchname" placeholder = "Search Name/ Username" onkeyup= "getUser(this.value)" value="<?php echo $tosearch;?>" required>
		<input type="submit" name="submitSearch" value="Search" >
 		<input type="button" value="Reset Form" name="resetbtn" onclick="clr()">
 		<span id="message"></span>
 	</form>
 </div>
 <script type="text/javascript">
 function clr(){
location.reload();
 }
 </script>
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
