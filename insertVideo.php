<?php
    include 'pathVariables.php';
    
    $backSlash='\\';
    //print_r($_FILES);
    $MAX_VIDEOS=50;
    
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
    
    $result_count = mysqli_query($conn,"select count(*) from videoOfToday.videos"); 
    
    if ($fila = mysqli_fetch_array($result_count, 2)){
        $count = $fila[0];
        //Checks the number of videos that there are in the videos table MAX_VIDEOS
        if ($count<$MAX_VIDEOS){
            
            
            $videoData = file_get_contents($_FILES['videoFile']['tmp_name']);
            $filename=$_FILES['videoFile']['name'];
            $extension = pathinfo($filename, PATHINFO_EXTENSION);
            $videoType = $_FILES['videoFile']['type'];
            
            
            $sql = "INSERT INTO videoOfToday.videos (url,path,video_type,total_rate,uploadDate)
        VALUES ('x1','x1','$videoType','0',NOW())";
            
            
            if ($conn->query($sql) === FALSE) {
                
                echo "Error: " . $sql . "<br>" . $conn->error;
                die ("Error: " . $sql . "<br>" . $conn->error);
            }
            
            
            $id = mysqli_insert_id($conn);
            
            
            $fullpath = $physical_path."video".$id.".".$extension;
            $URL = $url_path."video".$id.".".$extension;
            
            $URL_escaped = mysqli_real_escape_string($conn,strval($URL));
            $fullpath_escaped= mysqli_real_escape_string($conn,strval($fullpath));
            
            $sql="UPDATE videoOfToday.videos SET url = '$URL_escaped', path = '$fullpath_escaped' WHERE id='$id'";
            
            if ($conn->query($sql) === TRUE) {
                
                mysqli_commit($conn);
                //Write file
                $handle = fopen($fullpath, "w");
                fwrite($handle,$videoData);
                fclose($handle);
                echo "The video was created\n";
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            
            
        }else{
            echo "xC1F4";
        }
    }
    
    
    
    
    
    
?>