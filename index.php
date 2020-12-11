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
	
	$name = $_POST[‘name’];
	if(isset($name)) {
		$query = 'INSERT INTO `sampledb`.`User` (`name`) VALUES ("'.$name.'");';

		if ($conn->query($query) === TRUE) {
			echo "Hello " . $name;
		} else {
			echo "Error: <br>" . $conn->error;
		}
	}

    
    ?>
	<form method='POST'>
		<h2>What is your name?</h2>
		<input type="text" id="name" name="name">
		<input type="submit" value="Submit Name">
	</form>
	
	
	
	
	
	
	You are visitor #: <?php print $visits; ?>
</body>
</html>

<?php
$conn->close(); 
?>
