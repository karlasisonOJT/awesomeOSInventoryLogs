<?php
include ('../pages/config.php');
$scode = $_REQUEST["serialcode"];
$iqty = $_REQUEST["qty"];
//$sql1 = "SELECT * FROM equipment WHERE serialNumber = ?";

$officeTag ="";
	$equipmentName ="";
	$equipmentBrand = "";

			$sql = "SELECT * FROM equipment WHERE serialNumber = ? ";
			if($stmt = mysqli_prepare($link, $sql)){
				$param_serialNumber = $scode;
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
				     $sql2 = "INSERT INTO scanned_equipments (serialNumber, officeTag, equipmentName, equipmentBrand, quantity) VALUES ('$serialNumber','$officeTag', '$equipmentName','$equipmentBrand','$iqty')";
						if (mysqli_query($link, $sql2)) {
							$scode="gago";
						}
						else{
							$scode="hahahah";
						}
				     
						
				 	 	}
				 	 	else{
				 	 	echo "==".mysqli_num_rows($result);
				 	 		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
				 	 		var_dump($row);
				 	 	}

				 	 }
				 }

 echo $scode." ".$iqty;

?>