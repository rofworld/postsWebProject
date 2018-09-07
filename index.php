<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/styleIndex.css"/>

<title>Post of today HomePage</title>

<meta name="description" content="Here you see the description of the webpage with its sections. The sections are posts, videos and photos. In each section you can see the post, video and photo winner yesterday"/>

<meta name="keywords" content="post of today, postoftoday, post of today homepage, postoftoday homepage"/>

</head>

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
	
<div class="row posts">
	
	<h1>Posts</h1>
	<p>
	This section is about posts. Posts can be phrases, opinions or whatever you want to write.
	User posts are every day voted and removed from the server. The winner is saved in the server in the section Best Posts. You can vote every day for the post you most like and see the the ranking on-line of the texts that are posted.
	The post winner yesterday was the following one:
	</p>

</div>	
	
	<div class="rowPrincipal">
		<textarea rows='5' class='postOfTheDay' maxlength='250' disabled>
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
    	
    	$resultado = mysqli_query($conn,"SELECT post_of_the_day FROM postOfToday.post_of_the_day");
    	$postOfTheDay=null;
    	if ($fila = mysqli_fetch_array($resultado, 2)) {
    	   $postOfTheDay = $fila[0];
    	}
    	if ($postOfTheDay!=null){
    	   echo $postOfTheDay;
    	}
    ?>   	    
		</textarea>
	</div>
	
	
	
    <div class="row videos">
    	
    	<h1>Videos</h1>
    	<p>
    	This section is about videos. You can upload the videos you want. I would like not to have porn videos or I will remove by my self. But you can post
    	videos about adventures, sports, music, humor or whatever you want. User videos are voted and removed every day. The winner is saved in the server in the section Best Videos.
    	The winner yesterday was: 
    	</p>
    
    </div>	
	<div class="rowPrincipal">
		<video class="videoOfTheDay" controls>
		<?php 
    		
    		$resultado = mysqli_query($conn,"SELECT * FROM videoOfToday.video_of_the_day");
    		if ($fila = mysqli_fetch_array($resultado, 2)) {
    		    echo "<source src='".$fila[1]."' type='".$fila[3]."'";
    		}
		?>
  		</video>
	</div>
	
	<div class="row photos">
    	<h1>Photos</h1>
    	<p>This section is about photos. You can upload the photos you want. Artistic, nature or whatever you want. This section is under construction.
    	</p>

	</div>
</body>

