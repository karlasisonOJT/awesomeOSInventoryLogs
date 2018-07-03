<?php
session_start();
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
    header("location: log-in.php");
}
?>
<div>
 	<form>
 		<input type="text" id="equipmentsearchbox" name="tosearchequipment" placeholder = "Search Equipment" onkeyup= "getequipment(this.value)" value="">
 		<span id="message"></span>
 	</form>
 </div>
 <table id="allequipments">
	<?php
	$sql = "SELECT * FROM equipment";
	printAllEquipment($sql);
	?>
<?php
include("../Layouts/footer.php"); 
?>