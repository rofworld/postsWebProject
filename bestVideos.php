<html>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/styleVideos.css"/>
<link rel="stylesheet" href="css/rating.css"/>

</head>


<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">PostOfToday</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link " href="index.php">Post of today</a>
              <a class="nav-item nav-link" href="bestPosts.php">Best posts</a>
              <a class="nav-item nav-link" href="videoOfToday.php">Video of today</a>
              <a class="nav-item nav-link active" href="bestVideos.php">Best videos</a>
            </div>
          </div>
	</nav>
	<div class="row">	
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

    $resultado = mysqli_query($conn,"SELECT * FROM videoOfToday.best_videos ORDER BY total_rate DESC");
    echo "<h3>Best videos</h3>";
        echo "<table class='table'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<td>";
                        echo "<b>Videos</b>";
                    echo "</td>";
                    echo "<td hidden>";
                        echo "<b>Id</b>";
                    echo "</td>";
                    echo "<td>";
                        echo "<b>Total Hits</b>";
                    echo "</td>";

                echo "</tr>";

            echo "</thead>";
    while ($fila = mysqli_fetch_array($resultado, 2)) {
    
            echo "<tbody>";
                echo "<tr>";
                    echo "<td>";
                        echo "<video class='videoShow' controls>
  			                       <source src='".$fila[1]."' type='".$fila[3]."'>
  		                    </video>";
                        echo "</td>";
                    echo "<td hidden>";
                         echo "<div class='idVideo'>";
                            echo $fila[0];
                         echo "</div>";
                    echo "</td>";
                    echo "<td>";
                        echo $fila[4];
                    echo "</td>";
                echo "</tr>";
    
             echo "</tbody>";
    }

echo "</table>";
?>
	</div>
</body>
</html>