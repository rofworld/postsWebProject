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

$post = "".'"'.$myarray["post"].'"' ;

$rate = $myarray["rate"];

$result_id = mysqli_query($conn,"SELECT id,total_rate FROM posts WHERE posts=$post");
$fila = mysqli_fetch_array($result_id, 2);
$id=$fila[0];
$total_rate=$fila[1] + $rate;


$sql = "UPDATE posts SET total_rate=$total_rate WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "New rate added";
    // Commit transaction
    mysqli_commit($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();



?>
