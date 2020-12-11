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
    <h3>Hello World</h3>
    <?php
	require_once("login_db.php");
	
	$sql = "UPDATE Counter SET visits = visits+1";
	$conn->query($sql);
	
	$sql = "SELECT visits FROM Counter";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $visits = $row["visits"];
	}
	
	} else {
        echo "no results";
	}
	
	
	$name1 = $_POST[‘name’];
	echo “Hello “;
	echo $name1,
	
    
    ?>
	
	form action=”index.php” method=”post”>
		<p>What is your name? <input type=”text” id="name" name=”name” /></p>
		<p><input type=”submit” /></p>
	</form>
	
    You are visitor #: <?php print $visits; ?>
</body>
</html>

<?php
$conn->close(); 
?>
