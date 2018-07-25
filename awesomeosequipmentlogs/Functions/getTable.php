<?php
$scode = "";
$iqty = "";
$verifieruname = "";
$officeTag = "";
if (isset($_POST["scanItem"])) {
	


$scode = $_POST["serialNumber"];
$iqty = $_POST["itemQuantity"];
$verifieruname = $_POST["uname"];
$officeTag = $_POST["officetag"];
//$sql1 = "SELECT * FROM equipment WHERE serialNumber = ?";

	$equipmentName ="";
	$equipmentBrand = "";


			$sql = "SELECT * FROM equipment WHERE serialNumber = ? && officeTag = ?";
			if($stmt = mysqli_prepare($link, $sql)){
				$param_serialNumber = $scode;
				$param_officeTag = $officeTag;
				mysqli_stmt_bind_param($stmt, "ss", $param_serialNumber, $param_officeTag);

				 if(mysqli_stmt_execute($stmt)){
				 	 $result = mysqli_stmt_get_result($stmt);
				 	 if(mysqli_num_rows($result) > 0){
				 	 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				 	 	$serialNumber =$row["serialNumber"];
								$equipmentName = $row["equipmentName"];
								$equipmentBrand = $row["equipmentBrand"];
								//echo $officeTag." ".$equipmentName." ".$equipmentBrand ;
				     mysqli_stmt_close($stmt);

				     $sql = "SELECT * FROM scanned_equipments WHERE serialNumber = ? && officeTag = ?";
			if($stmt = mysqli_prepare($link, $sql)){
				$param_serialNumber = $scode;
				$param_officeTag = $officeTag;
				mysqli_stmt_bind_param($stmt, "ss", $param_serialNumber, $param_officeTag);

				 if(mysqli_stmt_execute($stmt)){
				 	 $result = mysqli_stmt_get_result($stmt);
				 	 if(mysqli_num_rows($result) == 0){
								//echo $officeTag." ".$equipmentName." ".$equipmentBrand ;
				     mysqli_stmt_close($stmt);
				     $sql2 = "INSERT INTO scanned_equipments (vUsername, serialNumber, officeTag, equipmentName, equipmentBrand, quantity) VALUES ('$verifieruname', '$serialNumber','$officeTag', '$equipmentName','$equipmentBrand','$iqty')";
						if (mysqli_query($link, $sql2)) {
							$scode="";
						echo '<META http-equiv="refresh" content = "0;URL=scan.php">';
			
					// $_SESSION['form_processed'] = true;
					//echo '<META http-equiv="refresh" content = "0;URL=scan.php">';

						}
						else{
							$scode=mysqli_error($link);
						}
				     
						$_POST = array();
				 	 	}
				 	 	else{
				 	 	$scode= "Equipment ".$officeTag." already scanned!";
				 	 	}

				 	 }
				 }

				     
						
				 	 	}
				 	 	else{
				 	 	$scode = "Item not in the database!";
				 	 	}

				 	 }
				 }
				 if ($scode != "") {
				 	echo "<script>
					alert('$scode');
					</script>";
					echo '<META http-equiv="refresh" content = "0;URL=scan.php">';
				 }
				 $_POST = array();
}
else{
	$scode = "";
$iqty = "";
$verifieruname = "";
$officeTag = "";
}

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
														die("Error! please try again later.");
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
    unset($_POST);
	echo '<META http-equiv="refresh" content = "0;URL=redirect.php">';
													

}
else{
		$bfname = $blastName = $site = $status = $vID = "";
	$bfname_err = $blastName_err = $site_err = $status_err = "";

}
?>