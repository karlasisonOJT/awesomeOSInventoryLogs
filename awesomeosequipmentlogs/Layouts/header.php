<html>
    <head>
         <title>Awesome OS Equipment Logs</title>
         <center>
         <h1>Awesome OS</h1>
         <h2>Equipment Logs</h2>
         </center>
</head>
<body style="width:100%;">		
        <center> 
        <a href="logout.php"><button> Log out</button></a>
        <a href="scan.php"><button>Create a new log</button></a>
		<a href="displayequipments.php"><button>Display Equipments</button></a>
		<a href="displayequipmentlogs.php"><button>Display Equipment Logs</button></a>
		<?php
		if (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") == 0) {
			?>
			<a href="create_user.php"><button>Create User</button></a>
			<a href="deactivateuser.php"><button>Display Users</button></a>
		<?php
		}
		elseif (strcasecmp($_SESSION["awesomeOSverifierusername"], "admin") != 0) {
			?>
						<a href="changepassword.php"><button>Change Password</button></a>
						<?php
		}
		?>