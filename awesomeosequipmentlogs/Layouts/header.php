<?php
include ("../CSS files/awesomeOSStyle.css");  
?>
<html>
    <head>
        <link rel="shortcut icon" href="../Images/AOS favicon.png"; />
         <title>Awesome OS Equipment Logs</title>
         <center>
         <div id="head">
         <div id="logo_title">
         <img src="../Images/Awesome OS Logo.png" width= "100%"><br/>
         <img src="../Images/Equipment Logs.png" width= "100%">
         </div>
         <div id="navigation_btns">
        <a href="logout.php"><button id="navigation"> Log out</button></a>
        <a href="scan.php"><button id="navigation">Create a new log</button></a>
		<a href="displayequipments.php"><button id="navigation">Display Equipments</button></a>
		<a href="displayequipmentlogs.php"><button id="navigation">Display Equipment Logs</button></a>
		<?php
		if (strpos($_SESSION["awesomeOSverifierusername"], "admin") !== false) {
			?>
			<a href="create_user.php"><button id="navigation">Create User</button></a>
			<a href="deactivateuser.php"><button id="navigation">Display Users</button></a>
		<?php
		}
		else {
			?>
						<a href="changepassword.php"><button id="navigation">Change Password</button></a>
						<?php
		}
		?>
		</div>
        </div>
        </center>
</head>
<body>
<center>
 <div id="wholeBody">
		
        