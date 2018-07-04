<?php
function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;		 
			}

function printAllUsers($query){
include ('../pages/config.php');
$result = mysqli_query($link, $query); 
$num_rows = mysqli_num_rows($result);

	?>
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Username</th>
			<th>Actions</th>
		</tr>
	</thead>
	<?php
$sql = $query;
if($stmt = mysqli_prepare($link, $sql)){
	if(mysqli_stmt_execute($stmt)){
		$result = mysqli_stmt_get_result($stmt);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<tr>
					<td><?php echo $row["vFirstName"]." ".$row["vLastName"];?></td>
					<td id="<?php echo $row["vUsername"]; ?>"><?php echo $row["vUsername"];?></td>
					<td> <?php
					$userID = $row["verifierID"];
					$activity = $row["active"];

						
					?><button onclick="changeStatus(<?php echo $userID; ?>, <?php echo $activity; ?>)" id="<?php echo $userID; ?>">

					<?php
					if ($activity ==1) {
						?>
						Deactivate
						<?php
}
					else{
						?>
						Activate
						<?php
						
					}
					?>
					</button><span id ="<?php echo $userID; ?>" hidden><?php echo $userID; ?></span>
					<button id="<?php echo $row["vUsername"]; ?>" onclick="showchangepassform(<?php echo $userID; ?>)">Change password</button>
						
					</td>
				</tr>
		<?php
			}
	}

}


	?>

</table>

				<div id="changepassform" hidden>
					<form onsubmit="submitNewPW(upw.value, uID.value);">
					<label>User ID:</label>
						<input type="text" id="uid" name="uID" value="" readonly=""><br/>
					<label> New Password: </label>
						<input type="password" id = "uPassw" name = "upw" value="" required>
						<u><span id="show" onclick = "showpass()">Show Password</span></u><br/>
					<input type="submit" name="submitNewPassword" value="Change Password" >
					</form>
				</div>

	<?php
	return $num_rows;
}


function printAllEquipment($query){
include ('../pages/config.php');
$result = mysqli_query($link, $query); 
$num_rows = mysqli_num_rows($result);
?>
<thead>
		<tr>
			<th>Brand</th>
			<th>Name</th>
			<th>Serial Code</th>
			<th>Office Tag</th>
			<Actions>
		</tr>
	</thead>
<?php

$sql = $query;
if($stmt = mysqli_prepare($link, $sql)){
	if(mysqli_stmt_execute($stmt)){
		$result = mysqli_stmt_get_result($stmt);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<tr>
					<td><?php echo $row["equipmentBrand"];?></td>
					<td><?php echo $row["equipmentName"];?></td>
					<td><?php echo $row["serialNumber"];?></td>
					<td><?php echo $row["officeTag"];?></td>
					<?php
			}
	}

}
?>
</table>
<?php
return $num_rows;
}
function printAllEquipmentLogs($logQuery){
	include ('../pages/config.php');
$result = mysqli_query($link, $logQuery); 
$num_rows = mysqli_num_rows($result);
?>
<thead>
		<tr>
			<th>Brand</th>
			<th>Name</th>
			<th>Serial Code</th>
			<th>Office Tag</th>
			<Actions>
		</tr>
	</thead>
<?php

$sql = $logQuery;
if($stmt = mysqli_prepare($link, $sql)){
	if(mysqli_stmt_execute($stmt)){
		$result = mysqli_stmt_get_result($stmt);
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				?>
				<tr>
					<td><?php echo $row["equipmentBrand"];?></td>
					<td><?php echo $row["equipmentName"];?></td>
					<td><?php echo $row["serialNumber"];?></td>
					<td><?php echo $row["officeTag"];?></td>
					<?php

			}
	}

}
?>
</table>
<?php
return $num_rows;
}


include("../JS Files/queries.js"); 

?>