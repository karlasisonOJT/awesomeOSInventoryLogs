
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
					<td>
					<?php
					if ( $row["active"] ==1) {
						echo "<img src='../Images/icons/active.ico'>";
					}
					else{
						echo "<img src='../Images/icons/inactive.ico'>";
					}
					?>
					<?php echo $row["vFirstName"]." ".$row["vLastName"];?></td>
					<td id="<?php echo $row["vUsername"]; ?>"><?php echo $row["vUsername"];?></td>
					<td> <?php
					$userID = $row["verifierID"];
					$activity = $row["active"];

						
					?><button class="negativebtn" onclick="changeStatus(<?php echo $userID; ?>, <?php echo $activity; ?>)" id="<?php echo $userID; ?>">
					<script type="text/javascript">
					 //writelabel(<?php echo $activity; ?>, <?php echo $userID; ?>);
					</script>
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
					</button>
					<span id ="<?php echo $userID; ?>" hidden><?php echo $userID; ?></span>
					<button class="positivebtn" id="<?php echo $row["vUsername"]; ?>" onclick="showchangepassform(<?php echo $userID; ?>)">Change password</button>
						
					</td>
				</tr>
		<?php
			}
	}

}


	?>

</table>
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
			<th>Borrower's Name</th>
			<th>Date and Time</th>
			<th>Site</th>
			<th>Quantity</th>
			<th>Status</th>
			<th>Verified By:</th>
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
					<td><?php echo $row["borrowerFirstName"]." ". $row["borrowerLastName"];?></td>
					<td><?php echo $row["logdate"]." - ".$row["logtime"];?></td>
					<td><?php echo $row["site"]?></td>
					<td><?php echo $row["quantity"]?></td>
					<td><?php echo $row["status"]?></td>					
					<td><?php echo $row["vFirstName"]." ".$row["vLastName"];?></td>
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