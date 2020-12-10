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
	
	mysql_query($sql);
	
	mysql_query("UPDATE counter SET visits = visits + 1");
	$result = mysql_fetch_row(mysql_query("SELECT visits FROM counter"));
    
    ?>
    You are visitor #: <?php print $result; ?>
</body>
</html>

<?php
$conn->close(); 
?>
