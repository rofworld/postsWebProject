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

if ($myarray["text"]!=null && $myarray["text"]!=""){

        $value = mysqli_real_escape_string($conn,strval($myarray["text"]));


        $sql = "INSERT INTO postOfToday.posts (posts,total_rate)
        VALUES ('$value',0)";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            // Commit transaction
            mysqli_commit($conn);
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}


$conn->close();



?>