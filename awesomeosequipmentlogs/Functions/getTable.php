<?php
include ('../pages/config.php');
$scode = $_REQUEST["serialcode"];
$iqty = $_REQUEST["qty"];
$verifieruname = $_REQUEST["verifier"];
$officeTag = $_REQUEST["offtag"];
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
				 	 if(mysqli_num_rows($result) == 1){
				 	 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				 	 	$serialNumber =$row["serialNumber"];
								$equipmentName = $row["equipmentName"];
								$equipmentBrand = $row["equipmentBrand"];
								//echo $officeTag." ".$equipmentName." ".$equipmentBrand ;
				     mysqli_stmt_close($stmt);
				     $sql2 = "INSERT INTO scanned_equipments (vUsername, serialNumber, officeTag, equipmentName, equipmentBrand, quantity) VALUES ('$verifieruname', '$serialNumber','$officeTag', '$equipmentName','$equipmentBrand','$iqty')";
						if (mysqli_query($link, $sql2)) {
							$scode=$scode;
						}
						else{
							$scode=mysqli_error($link);
						}
				     
						
				 	 	}
				 	 	else{
				 	 	die($officeTag);
				 	 	}

				 	 }
				 }

 echo $scode." ".$iqty." ".$verifieruname;

?>