
<?php
   
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO posts (posts)
VALUES ('this post created with AJAX')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    mysqli_commit($conn);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Commit transaction
mysqli_commit($conn);
$conn->close();


    
?>

