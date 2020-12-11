<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" href="styles/styles.css">
	
</head>
<body>
    <h3>Hello</h3>
    <?php
	require_once("login_db.php");
	
	$sql = "UPDATE counter SET visits = visits + 1");
	$conn->query($sql);
	
	$sql = "SELECT visits FROM counter";
	$result = $conn->query($sql);
    
    ?>
    You are visitor #: <?php print $result; ?>
</body>
</html>

<?php
$conn->close(); 
?>
