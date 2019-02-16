<?php
include 'pathVariables.php';
include 'var_html_rate.php';
?>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link rel="stylesheet" media="(min-width: 800px)" href="css/styleVideos.css"/>
<link rel="stylesheet" media="(max-width: 800px)" href="css/m.styleVideos.css"/>

<link rel="stylesheet" media="(min-width: 800px)" href="css/rating.css"/>
<link rel="stylesheet" media="(max-width: 800px)" href="css/m.rating.css"/>

<title>Upload Daily Videos</title>

<meta name="description" content="You can upload your daily videos here"/>

<meta name="keywords" content="daily videos, ranking videos, rate videos, top 100 Internet Videos"/>
</head>


<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="videoOfToday.php">Daily Videos</a>
          </li>
         <li class="nav-item">
            <a class="nav-link" href="bestVideos.php">Top 100 Internet Videos</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="uploadVideo.php">Upload Daily Video</a>
          </li>
        </ul>
      </div>
	</nav>
	<div class="popup-overlay">
        <!--Creates the popup content-->
       	<div  class="popup-content">
          <h2>Uploading video...</h2>
          <div class="loader"></div>
        </div>
	</div>
	
	<div class="form">
	<div class="row">
		<h5>Upload your dayly video here (mp4, ogv, webm) MAX: 120Mbytes</h5>
	</div>
	<div class="row">
		
		
		<button type="button" id="fileUploadButton" class="btn btn-primary">...</button>
    
    	<textarea class="form-control" rows="1" id="filePath" maxlength="200" disabled></textarea>
    	
    	<button type="button" id="addButton" class="btn btn-primary">Add Video</button>
    	
    	<input type="file" id="videoFile" style="display:none">
    	
    	
	
	</div> 
	</div>
	<!-- 
	<div class="row">
		<div id="txtHint"><b></b></div>
	</div>
	 -->
	 
<script src="js/videosController.js"></script>	
</body>


</html>

