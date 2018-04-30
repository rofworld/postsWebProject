<?php
$servername = "localhost";
$username = "root";
$password = "pollo0123";
$dbname = "postOfToday";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$myarray = &$_POST ;

$id = $myarray["id"] ;

$rate = $myarray["rate"];

$result = mysqli_query($conn,"SELECT total_rate FROM videoOfToday.videos WHERE id=$id");
$fila = mysqli_fetch_array($result, 2);

$total_rate=$fila[0] + $rate;


$sql = "UPDATE videoOfToday.videos SET total_rate=$total_rate WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "New rate added";
    // Commit transaction
    mysqli_commit($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>