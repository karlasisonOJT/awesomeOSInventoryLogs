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
<div> <a href="scannewequipment.php"><button>Scan new equipment</button></a></div>
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
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>