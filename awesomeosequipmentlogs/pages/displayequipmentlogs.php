<?php
session_start();
if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
   // header("location: log-in.php");
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
 		<input type="text" id="equipmentlogsearchbox" name="tosearchequipmentlog" placeholder = "Search Equipment Log" onkeyup= "getequipmentlog(this.value)" value="">
 		<span id="message"></span>
 	</form>
 </div>
 <table id="allequipmentlogs">
	<?php
	$sql = "SELECT * FROM equipment_logs LEFT JOIN equipment ON equipment_logs.serialNUmber = equipment.serialNumber";
	printAllEquipmentLogs($sql);
	?>
<?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>