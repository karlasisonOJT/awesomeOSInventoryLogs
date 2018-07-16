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

?>
<?php 
	$vusername = $_SESSION["awesomeOSverifierusername"];
	$curdatetime = time();
$logtime = date("G:i:s",$curdatetime);
$logdate = date("Y-m-d");
if (isset($_POST["submitwholeform"])) {
$curdatetime = time();
$logtime = date("G:i:s",$curdatetime);
$logdate = date("Y-m-d");

	$bfname = $blastName = $site = $status = $vID = "";
	$bfname_err = $blastName_err = $site_err = $status_err = "";

	if(!filter_var(trim($_POST["bfirstName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9-.\s ]+$/")))){
        $bfname_err = 'First Name must not contain proibited symbols';
    } else{
        $bfname = trim($_POST["bfirstName"]);
    }
    if(!filter_var(trim($_POST["blastName"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9-.\s ]+$/")))){
        $blastName_err = 'Last Name must not contain proibited symbols';
    } else{
        $blastName = trim($_POST["blastName"]);
    }
    if (empty($bfname_err) && empty($blastName_err)) {
    	    $site = trim($_POST["site"]);
    $status = trim($_POST["status"]);

    $sqlforID = "SELECT verifierID FROM verifier WHERE vUsername = ?";
    if($stmt = mysqli_prepare($link, $sqlforID)){
      	     	 mysqli_stmt_bind_param($stmt, "s", $param_vusername);
      	     	 $param_vusername = $vusername;
      	     	 if(mysqli_stmt_execute($stmt)){
      	     	 	mysqli_stmt_store_result($stmt);
      	     	 	 if(mysqli_stmt_num_rows($stmt) == 1){
      	     	 	 	mysqli_stmt_bind_result($stmt, $vID);
      	     	 	 	mysqli_stmt_fetch($stmt);
      	     	 	 	 mysqli_stmt_close($stmt);
	      	     	 	 	$sql = "SELECT * FROM scanned_equipments  WHERE vUsername = ? ";
							if($stmt = mysqli_prepare($link, $sql)){

								mysqli_stmt_bind_param($stmt, "s", $param_vuname);
								$param_vuname = $vusername;


								 if(mysqli_stmt_execute($stmt)){
								 	 $result = mysqli_stmt_get_result($stmt);
								 	 while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
								 	 	$serialNumber = $row["serialNumber"];
								 	 	$officeTag = $row["officeTag"];
								 	 	$quantity = $row["quantity"];

								 	 	//mysqli_stmt_close($stmt);

								 	 	$sqlforinsertinglogs = "INSERT INTO equipment_logs (serialNumber, officeTag, borrowerFirstName, borrowerLastName, logdate, logtime, site, quantity, status, verifierID) VALUES (?,?,?,?,?,?,?,?,?,?)";
								 	 	if ($stmt = mysqli_prepare($link, $sqlforinsertinglogs)) {
								 	 				mysqli_stmt_bind_param($stmt, "ssssssssss", $param_serialNumber, $param_officeTag, $param_bfname, $param_blastName, $param_logdate, $param_logtime, $param_site, $param_quantity, $param_status, $param_vID);
								 	 				$param_serialNumber = $serialNumber;
								 	 				$param_officeTag = $officeTag;
								 	 				$param_bfname = $bfname;
								 	 				$param_blastName = $blastName;
								 	 				$param_logdate = $logdate;
								 	 				$param_logtime = $logtime;
								 	 				$param_site = $site;
								 	 				$param_quantity = $quantity;
								 	 				$param_status = $status;
								 	 				$param_vID = $vID;

								 	 		if(mysqli_stmt_execute($stmt)){
													mysqli_stmt_close($stmt);
													
												}
											 else{
													die(mysqli_error($link));
												}

								 	 	}
								 	 }
								 	 $sqlforemptyingtemptable = "DELETE FROM scanned_equipments WHERE vUsername = '$vusername'";
													if (!mysqli_query($link, $sqlforemptyingtemptable)) {
														die("yeah bitch");
													}
								 	 }
								 }
      	     	 	 }
      	     	 	 else{
      	     	 	 	die('Username not found!');
      	     	 	 }
      	     	 }
      	     }
    }

}
else{
		$bfname = $blastName = $site = $status = $vID = "";
	$bfname_err = $blastName_err = $site_err = $status_err = "";

}

 ?>
 <div id="leftdiv">
<div>
	<button id="myBtn">Reset Scanned Equipments </button>

<!-- The Modal -->
		<div id="myModal" class="modal">

		  <!-- Modal content -->
		  <div class="modal-content">
		    <span class="close"><button >No, back to scanning equipment</button>
</span>
		   	<button onclick="emptyTable()">Yes, reset scanned equipment</button>

		  </div>

		</div>
</div>
<form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post" onsubmit = "enterItems(serialNumber.value, itemQuantity.value, uname.value, officetag.value)"  >
	<label>SCAN ITEM </label><br/>
	<input id="scancode" type="text" name="serialNumber" onchange="getOfficeTags(this.value)" required/><br/>	
	<label>Office Tag</label><br/>
	<select id="equipofficetag" name="officetag" required>
      </select>
      <br/>
	<label>Quantity:</label><br/>
	<input type="number" name="itemQuantity" required/><br/>
	<input type="text" name="uname" value="<?php echo $vusername;?>" hidden />
	<input type="submit" name="submit" value="Submit" id="submitbtn" />
</form>
</div>
<div id="rightdiv">
<div>
<h3 id="scannedItems">Scanned Items</h3>
<table id="scanned">
				 	<thead>
				 	 			<tr>
				 	 			<th>Equipment Name</th>
				 	 			<th>Equipment Brand</th>
				 	 			<th>Quantity</th>
				 	 			<th>Serial Number</th>
				 	 			<th>Office Tag</th>				 	 			
				 	 			</tr>
				 	 	</thead>
				 	 	<tbody >
				 	 		
				 	 	
<?php 
$sql = "SELECT * FROM scanned_equipments WHERE vUsername = ? ";

			if($stmt = mysqli_prepare($link, $sql)){
				mysqli_stmt_bind_param($stmt, "s", $param_vuname);
				$param_vuname = $vusername;

				 if(mysqli_stmt_execute($stmt)){
				 	 $result = mysqli_stmt_get_result($stmt);
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
				 	 		<button  id="cancelbtn" onclick="cancelequipment(this.value)" value = "<?php echo $offTag; ?>">
				 	 		Cancel
							</button>
							
				 	 		</td>
				 	 		<td id ="<?php echo $offTag;?>" hidden>
							<p>Are you sure you want to cancel this equipment?</p><br/>
							<button onclick="deletethis(this.value, <?php echo $row["equipmentID"];?>)" value="<?php echo $offTag; ?>">Yes</button>
							<button onclick="canceldelete(this.value)" value="<?php echo $offTag; ?>">No</button>
							</td>

				 	 	</tr>

				 	 	
				 	 	<?php
				 	 }
				 	mysqli_stmt_close($stmt);
				 	 }
				 }
 ?>
 </tbody>
 </table>
</div>
<div id="borrowerform">

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method = "post" >
 	<label>Borrower: </label><br/>
	<input type="text" name="bfirstName" placeholder = "Borrower's First Name" required/><br/>
	<span><?php echo $bfname_err; ?></span><br/>
	<input type="text" name="blastName" placeholder = "Borrower's Last Name" required/><br/>
	<span><?php echo $blastName_err; ?></span>
	<br/>
	<label>Site: </label><br/>
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
	<br/>
	<label>Status: </label><br/>
	<select name = "status" required>
		<option></option>
		<option value="Deployed">Deploy</option>
		<option value="Pulled Out"> Pull out</option>
	</select><br/>
	<label>Verified by: </label>
	<input type="text" name="vusername" value = "<?php echo $_SESSION['awesomeOSverifierusername']; ?>" hidden/><br/>
	<input type="text" name="vfirstName" value = "<?php echo $_SESSION['awesomeOSverifierfirstname']; ?>" readonly/><br/>
	<input type="text" name="vlastName" value = "<?php echo $_SESSION['awesomeOSverifierlastname']; ?>" readonly/><br/>
	<br/>
	<br/>
<input type="submit" name="submitwholeform" value="Submit Equipment Logs" id="submitbtn"/>
 </form>
 </div>
</div>
 <?php
include("../JS Files/queries.js"); 
include("../Layouts/footer.php"); 
}
?>
