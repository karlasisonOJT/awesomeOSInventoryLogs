<?php 
session_start();
include("../Layouts/header.php"); 
include("../Functions/functions.php"); 
include("../JS Files/queries.js"); 
include ('config.php');

if (!isset($_SESSION["awesomeOSverifierusername"])|| is_null($_SESSION["awesomeOSverifierusername"])) {
    header("location: log-in.php");
}
if (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") != 0) {
	header("location: log-in.php");
}
 ?>
 search engine
table with the following:
		print headings
		query for rows *isulod sa while para mudaghan
		full name
		username 
		actions: change pw/ deactivate/ activate
<table>
	<thead>
		<tr>
			<th>Full Name</th>
			<th>Username</th>
			<th>Actions</th>
		</tr>
	</thead>
	<?php
$sql = "SELECT * FROM verifier";
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
					
					</td>
				</tr>
		<?php
			}
	}

}


	?>
		
	

</table>


<?php
include("../Layouts/footer.php"); 
?>
<?php


$sql = "SELECT * FROM users";
if ($result = mysqli_query($link, $sql)) {
	while($row = mysqli_fetch_assoc($result)){
		echo "ID: ".$row["id"]."<br/>";
		echo "Username: ".$row["username"]."<br/>";
		echo "Email: ".$row["email"]."<br/>";
		echo "-----------------------";
	}
}


?>