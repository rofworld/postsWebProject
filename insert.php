<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "postOfToday";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$myarray = &$_POST ; 


$value = ""."'".$myarray["text"]."'" ;
$sql = "INSERT INTO posts (posts,total_rate)
VALUES ($value,0)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    // Commit transaction
    mysqli_commit($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();



?>