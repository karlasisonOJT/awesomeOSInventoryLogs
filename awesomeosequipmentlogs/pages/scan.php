<!DOCTYPE>
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
include ('config.php');
include ("../Functions/getTable.php");
?>

 <div id="leftdiv">
<form id="scanform"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post" >
	<label> </label><br/>
	<input id="scancode" type="text" name="serialNumber" autofocus onchange="getOfficeTags(this.value)" placeholder="SCAN ITEM HERE" required/><br/>	
	<label>Office Tag</label><br/>
	<select id="equipofficetag" name="officetag" required>
      </select>
      <br/>
	<label>Quantity:</label><br/>
	<input id="eqty" type="number"  name="itemQuantity" required/><br/>
	<input type="text" name="uname" value="<?php echo $vusername;?>" hidden />
	<input type="submit" name="scanItem" value="Submit" id="submitbtn" />
</form>

	
</div>

<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
		  <p>Reset Scanned items?</p>
		    <span class="close"><button id="negativebtn" >No, back to scanning equipment</button>
</span>
		   	<button id="positivebtn" onclick="emptyTable()">Yes, reset scanned equipment</button>

		  </div>

		</div>
<div id="rightdiv">
<div id="scannedtable">
<div id="tablehead">
<h3 id="scannedItems">Scanned Items</h3>
<button id="myBtn2"> Submit Scanned Equipment</button>
<button id="myBtn">Reset Scanned Equipments </button>
</div>
<table id="scanned">
<thead>
				 	 			<tr>
				 	 			<th>Equipment Name</th>
				 	 			<th>Equipment Brand</th>
				 	 			<th>Quantity</th>
				 	 			<th>Serial Number</th>
				 	 			<th>Office Tag</th>
				 	 			<th>Actions</th>				 	 			
</thead>
<tbody >
				 	 		
				 	 	
<?php 
$sql = "SELECT * FROM scanned_equipments WHERE vUsername = ? ORDER BY equipmentID desc";

			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt, "s", $param_vuname);
				$param_vuname = $vusername;

				 if(mysqli_stmt_execute($stmt)){
				 	 $result = mysqli_stmt_get_result($stmt);
				 	 $scannedcount=0;
				 	 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
				 	 	//var_dump($row);
				 	 	?>
				 	 	<tr >
				 	 		<td><?php echo $row["equipmentName"];?></td>
				 	 		<td><?php echo $row["equipmentBrand"];?></td>
				 	 		<td><?php echo $row["quantity"];?></td>
				 	 		<td><?php echo $row["serialNumber"];?></td>
				 	 		<td><?php echo $row["officeTag"];?></td>
				 	 		
				 	 		<td>
				 	 		<?php
				 	 		$offTag =$row["officeTag"];
				 	 		$sn = $row["serialNumber"];
				 	 		$dd = $row["equipmentID"];
				 	 		?>
				 	 		<div id="cancelbtn<?php echo $offTag; ?>">
				 	 		<button  id="cancelbtn" onclick="cancelequipment(this.value)" value = "<?php echo $offTag; ?>">
				 	 		Cancel
							</button>
							</div>
							<div id ="<?php echo $offTag;?>" hidden>
							<p id="question">Are you sure you want to cancel this equipment?</p><br/>
							<button id="positivebtn" onclick="deletethis(this.value, <?php echo $row["equipmentID"];?>)" value="<?php echo $offTag; ?>">Yes</button>
							<button id="negativebtn" onclick="canceldelete(this.value)" value="<?php echo $offTag; ?>">No</button>
							</div >
				 	 		</td>
				 	 		

				 	 	</tr>

				 	 	
				 	 	<?php
				 	 	$scannedcount++;
				 	 }
				 	mysqli_stmt_close($stmt);
				 	 }
				 }
 ?>
 </tbody>
 </table>
 <p id="scancount" hidden><?php echo $scannedcount;?></p>
</div>
</div>
		<div id="myModal2" class="modal2">

		  <!-- Modal2 content -->
		  <div class="modal-content2">
		  <p>Submit Scanned Items</p>
		  

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post" >
 	<label>Borrower: </label>
	<input type="text" name="bfirstName" placeholder = "Borrower's First Name" required/>
	<input type="text" name="blastName" placeholder = "Borrower's Last Name" required/><br/>
	<span><?php echo $bfname_err; ?></span>
	<span><?php echo $blastName_err; ?></span>
	<br/>
	<label>Site: </label>
	<select name="site" required>
		<option></option>
		<option value="Araullo"> Araullo </option>
		<option value="Landco"> Landco </option>
		<option value="Hai 2F "> Hai 2F </option>
		<option value="Hai 3F"> Hai 3F </option>
		<option value="Tavera 6F"> Tavera 6F </option>
		<option value="Tavera 3F"> Tavera 3F</option>
		<option value="MTS 6"> MTS 6 </option>
		<option value="MTS 5"> MTS 5 </option>
		<option value="MTS 4"> MTS 4 </option>
	</select>

	<label>Status: </label>
	<select name = "status" required>
		<option></option>
		<option value="Deployed">Deploy</option>
		<option value="Pulled Out"> Pull out</option>
	</select>
	<br/><label>Verified by: </label>
	<input type="text" name="vusername" value = "<?php echo $_SESSION['awesomeOSverifierusername']; ?>" hidden/>
	<input type="text" name="vfirstName" value = "<?php echo $_SESSION['awesomeOSverifierfirstname']; ?>" readonly/>
	<input type="text" name="vlastName" value = "<?php echo $_SESSION['awesomeOSverifierlastname']; ?>" readonly/>
	<br/>
	<br/>
<input type="submit" name="submitwholeform" value="Submit Equipment Logs" id="submitbtn"/>
 </form>
 
		    <span class="close2"><button id="negativebtn" >No, continue scanning equipment</button>
</span>

		  </div>

		</div>

 <?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>