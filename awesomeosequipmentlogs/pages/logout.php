<?php
include("emptyScannedItems.php")
?>
<!DOCTYPE html>
<html>
<body>
</body>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 

header("location: log-in.php")
?>

</body>
</html>
<?php include("../JS Files/queries.js"); 
?>