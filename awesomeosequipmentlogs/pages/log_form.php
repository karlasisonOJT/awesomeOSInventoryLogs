<?php
include("../Functions/functions.php"); 
include ('config.php');
?>
<?php
if (isset($_GET["serialNumber"])) {
	
//	echo trim($_GET["serialNumber"]);
	$officeTag ="";
	$equipmentName ="";
	$equipmentBrand = "";

			$sql = "SELECT * FROM equipment WHERE serialNumber = ? ";
			if($stmt = mysqli_prepare($link, $sql)){
				$param_serialNumber = trim($_GET["serialNumber"]);
				mysqli_stmt_bind_param($stmt, "s", $param_serialNumber);

				 if(mysqli_stmt_execute($stmt)){
				 	 $result = mysqli_stmt_get_result($stmt);
				 	 if(mysqli_num_rows($result) == 1){
				 	 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				 	 	$serialNumber =$row["serialNumber"];
				 	 		$officeTag = $row["officeTag"];
								$equipmentName = $row["equipmentName"];
								$equipmentBrand = $row["equipmentBrand"];
								//echo $officeTag." ".$equipmentName." ".$equipmentBrand ;
				     mysqli_stmt_close($stmt);
				     
						
				 	 	}
				 	 	else{
				 	 	echo "==".mysqli_num_rows($result);
				 	 		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				 	 		var_dump($row);
				 	 	}

				 	 }
				 }
		if (isset($_POST["submit"])) {
			die("nice ka");
		}

}
else{
	header("location: scan.php");
}

?>
<html>
<body>
<form name = "log-inForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?serialNumber=".$serialNumber;?>" method = "post" >
	<label>Serial Number: </label>
	<input type="text" name="serialNumber" value="<?php echo $serialNumber; ?>" disabled/><br/>
	<label>Office Tag: </label>
	<input type="text" name="officeTag" value="<?php echo $officeTag; ?>" disabled/><br/>
	<label>Equipment Name: </label>
	<input type="text" name="equipmentName" value="<?php echo $equipmentName; ?>" disabled/><br/>
	<label>Brand: </label>
	<input type="text" name="equipmentBrand" value="<?php echo $equipmentBrand; ?>" disabled/><br/>

	<label>Borrower: </label>
	<input type="text" name="bfirstName" placeholder = "Borrower's First Name" required/><br/>
	<input type="text" name="blastName" placeholder = "Borrower's Last Name" required/><br/>
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
	<br/>

	<label>Quantity: </label>
	<input type="number" name="quantity" value = "1"required/><br/>

	<label>Status: </label>
	<select name = "status" required>
		<option></option>
		<option value="1">Deployed</option>
		<option value="2"> Pulled out</option>
	</select><br/>
	<label>Verified by: </label>
	<input type="text" name="vfirstName" placeholder = "First Name" required/><br/>
	<input type="text" name="vlastName" placeholder = "Last Name" required/><br/>
	<br/>

	<br/>
<input type="submit" name="submit"/>

</form>
  </body>

  </html>