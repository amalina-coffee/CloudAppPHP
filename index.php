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
    <h1>Hello World</h1>
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
	
	$name = $_POST['name'];
	if(isset($name)) {
		$query = 'INSERT INTO `sampledb`.`User` (`name`) VALUES ("'.$name.'");';

		if ($conn->query($query) === TRUE) {
			echo "User created successfully";
		} else {
			echo "Error: <br>" . $conn->error;
		}
	}

    
    ?>
	<form method='POST'>
		<h3>What is your name?</h3>
		<input type="text" id="name" name="name">
		<button type="submit" name="greet">Submit</button>

	</form>
	
	
	
	
	
	
	<p>You are visitor #: <?php print $visits; ?></p>
</body>
</html>

<?php
$conn->close(); 
?>
