<?php
include "config.php";

$serialCode = $_REQUEST['serialNumber'];   // department id

$sql = "SELECT officeTag FROM equipment WHERE serialNumber = '$serialCode'";

if ($result = mysqli_query($link,$sql)) {
	while( $row = mysqli_fetch_array($result) ){
   // $officeTags = $row['id'];
   // $name = $row['name'];

    //$users_arr[] = array("id" => $userid, "name" => $name);
		echo "<option value = \"".$row{'officeTag'}."\">" . $row{'officeTag'} . "</option>";
}

}
else{
	die(mysqli_error($link));
}
?>