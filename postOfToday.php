
<html>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/rating.css"/>

</head>

<?php include 'var_html_rate.php';?>

<body>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#">PostOfToday</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Posts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="postOfToday.php">Posts</a>
              <a class="dropdown-item" href="bestPosts.php">Bests Posts</a>
            </div>
            
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Videos
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="videoOfToday.php">Videos</a>
              <a class="dropdown-item" href="bestVideos.php">Bests Videos</a>
            </div>
            
          </li>
        </ul>
      </div>
	</nav>

	
	
	<!-- 
	<div class="row">
		<div id="txtHint"><b></b></div>
	</div>
	 -->
	 
	 <br>
	<div class="tablePosts">
	
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
    	
	
    	$resultado = mysqli_query($conn,"SELECT posts,total_rate FROM postOfToday.posts ORDER BY total_rate DESC");
    	//echo "<h3>This are the posts of Today</h3>";
    	echo "<table class='table'>";
    	echo "<thead>"; 
    	   echo "<tr>";
    	       echo "<td>";
    	           echo "<b>Posts</b>";
    	       echo "</td>";
    	       echo "<td>";
    	           echo "<b>Total Hits</b>";
    	       echo "</td>";
    	       echo "<td>";
    	           echo "<b>Rate</b>";
    	       echo "</td>";
    	   echo "</tr>";
    	
    	echo "</thead>";
    	while ($fila = mysqli_fetch_array($resultado, 2)) {
    	    
    	    echo "<tbody>";
    	       echo "<tr>";
    	           echo "<td>";
    	               echo "<textarea rows='5' class='postShow' maxlength='250' disabled>";
    	                   echo $fila[0];
    	               echo "</textarea>";
    	           echo "</td>";
    	           echo "<td>";
    	               echo $fila[1];
                   echo "</td>";
    	           
    	           
    	           echo "<td>";
    	               echo $var_html_rate;
    	           echo "</td>";
    	       echo "</tr>";
    	       
    	    echo "</tbody>";
    	}
		
        echo "</table>";
	?>
	
	</div>
	</div>
	
	<div class="form">
			<!-- 
			<div class="row">
				<h5>write your post here:</h5>
			</div>
			-->
        	<div class="row">
        		
            	
            	<textarea class="form-control" rows="5" id="post" maxlength="200"></textarea>
            	
            	<button type="button" id="addButton" class="btn btn-primary">Add Post</button>
            	
        	
        	
        	</div> 
	</div>
<script src="js/postsController.js"></script>	
</body>


</html>