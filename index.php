<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Hello</title>
	<link rel="stylesheet" href="styles/styles.css">
	
</head>
<body>
    <h3>Hello</h3>
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
    } 
    else {
        echo "no results";
    }
    ?>
    Visits: <?php print $visits; ?>
</body>
</html>

<?php
$conn->close();
?>
