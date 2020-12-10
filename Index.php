<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Visit counter</title>
</head>
<body>
    <h3>LAMP App</h3>
    <?php
	require_once("login_db.php");
    
    $sql = "UPDATE Counter SET visits = visits+1 WHERE id = 1";
    $conn->query($sql);
    $sql = "SELECT visits FROM Counter WHERE id = 1";
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
    
    <h3>Visits: <?php print $visits; ?></h3>
</body>
</html>

<?php
$conn->close();
?>
     
