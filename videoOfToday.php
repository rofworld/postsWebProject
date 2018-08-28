<?php 
    include 'pathVariables.php';
    include 'var_html_rate.php';
?>
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
              <a class="nav-item nav-link active" href="videoOfToday.php">Video of today</a>
              <a class="nav-item nav-link" href="bestVideos.php">Best videos</a>
            </div>
          </div>
	</nav>
	
	<div class="popup-overlay">
        <!--Creates the popup content-->
       	<div  class="popup-content">
          <h2>Uploading video...</h2>
          <div class="loader"></div>
        </div>
	</div>
	<div class="rowPrincipal">
		<h3>The video of yesterday was:</h3><br>
		<video class="videoOfTheDay" controls>
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
    		
    		$resultado = mysqli_query($conn,"SELECT * FROM videoOfToday.video_of_the_day");
    		if ($fila = mysqli_fetch_array($resultado, 2)) {
    		    echo "<source src='".$fila[1]."' type='".$fila[3]."'";
    		}
		?>
  		</video>
	</div>
	
	<br>
	<div class="row">
		<h5>Upload your video here (mp4, ogv, webm) MAX: 120Mbytes</h5>
	</div>
	<div class="row">
		
		
		<button type="button" id="fileUploadButton" class="btn btn-primary">...</button>
    
    	<textarea class="form-control" rows="1" id="filePath" maxlength="200" disabled></textarea>
    	
    	<button type="button" id="addButton" class="btn btn-primary">Add Video</button>
    	
    	<input type="file" id="videoFile" style="display:none">
    	
    	<script type="text/javascript">
    		$("#fileUploadButton").click(function() {
    			$("#videoFile").click();
    			
    		});
    		$('#videoFile').on('change', function () {
    			if ($("#videoFile")[0].files.length>0){
        			var fileName = $("#videoFile")[0].files[0].name;
        			console.log(fileName);
    			  	$("#filePath").val(fileName);
    			}else{
    				$("#filePath").val("");
    			}
    		});
      	</script>
    	
    	
    	<script type="text/javascript">
    		$("#addButton").click(function() {
    			
    			if ($("#videoFile")[0].files.length>0){
    				var fileName = $("#videoFile")[0].files[0].name;
    				console.log("fileName = " + $("#videoFile")[0].files[0].name + ". File Size = " + $("#videoFile")[0].files[0].size);
    				if (isVideo(fileName)){
    					//console.log("Is video");
        				if ($("#videoFile")[0].files[0].size < 120000000){
            				currentDate = new Date();
            				currentDate = new Date(currentDate.getFullYear(),currentDate.getMonth(),currentDate.getDate());
            				var saveDate="[]";
        					if (localStorage.getItem('saveDate')!=null){
        		    			
        		    			var saveDate = localStorage.getItem('saveDate');
        					}
    
        					
        					console.log("This is the current date:");
        					console.log(currentDate);
    
        					var isUploaded=false;
        				
        					saveDate=JSON.parse(saveDate);
	
							
        					console.log("This is the date saved:");
        					console.log(saveDate[0]);


        					
        					//Examine the saveDate
        					if (saveDate.length==0){
            					console.log("There is no date saved");
            					isUploaded=false;
        					}else{
        						saveDate=new Date(saveDate[0]);
            					//The saved Date is lower than the savedDate
            					if (saveDate.getTime()==currentDate.getTime()){
            						console.log("The saved date is today");
                					isUploaded=true;
            					}else{
                					
                					console.log("The saved Date is lower than the current date");
                					isUploaded=false;
            					}
        					}
            				
        					console.log("is Uploaded = " + isUploaded);
        					
        					//if (isUploaded==false){
        						  openDialog();
        						  var fd = new FormData();
        						  fd.append("videoFile", $("#videoFile")[0].files[0]);
        						  
        						  // These extra params aren't necessary but show that you can include other data.
        						  
        						  var xhr = new XMLHttpRequest();
        						  xhr.open('POST', 'insertVideo.php', true);
        						  
        						  xhr.upload.onprogress = function(e) {
        						    if (e.lengthComputable) {
        						      var percentComplete = (e.loaded / e.total) * 100;
        						      console.log(percentComplete + '% uploaded');
        						    }
        						  };
        						  xhr.onload = function() {
        						    if (this.status == 200) {
        						      	console.log(this.responseText);
        								if (this.responseText!="xC1F4"){
            						      	//push array
            				    			saveDate = [ currentDate ]; 
            				    			//Set SessionStorage
            				    			localStorage.setItem('saveDate',JSON.stringify(saveDate));
            				    			closeDialog();
            				    			location.reload();
        								}else{
            								alert("You reached the maximum number of videos allowed in the server");
        								}
        						    };
        						  };
        						  xhr.send(fd);
        		    					
            					
        					//}else{
            				//	alert("You already uploaded a video today");
        					//}
        				}else{
        					alert("The video size is over 120Mbytes")
        				}
    				}else{
    					alert("The file selected is not a valid video");
    				}
    				
        			

    			}else{
        			alert("There is no file selected");
    			}

    			function getExtension(filename) {
    			    var parts = filename.split('.');
    			    return parts[parts.length - 1];
    			}

    			function isVideo(filename) {
    			    var ext = getExtension(filename);
    			    switch (ext.toLowerCase()) {
    			    case 'mp4':
    			    case 'ogv':
    			    case 'webm':
    			        // etc
    			        return true;
    			    }
    			    return false;
    			}
    			function openDialog() {
                    
    				$(".popup-overlay, .popup-content").addClass("active");
                        
                }
                
                function closeDialog() {
                	$(".popup-overlay, .popup-content").removeClass("active");
                }
    		});
      	</script>
	
	</div> 
	
	<!-- 
	<div class="row">
		<div id="txtHint"><b></b></div>
	</div>
	 -->
	 
	 <br>
	<div class="row">
	
	<?php
    	
    	$resultado = mysqli_query($conn,"SELECT * FROM videoOfToday.videos ORDER BY total_rate DESC");
    	echo "<h3>This are the videos of today</h3>";
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
    	       echo "<td>";
    	           echo "<b>Rate</b>";
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
    	           
    	           echo "<td class='rateShowing'>";
    	               echo $var_html_rate;
    	           echo "</td>";
    	       echo "</tr>";
    	       
    	    echo "</tbody>";
    	}
		
        echo "</table>";
	?>
	
	<script type="text/javascript">
		$('[type=radio]').change(function() {
			/* find id */
			var id = $(this).parent().parent().parent().parent().find(".idVideo").html();
			console.log(id);
			
			var votedIDS = "[]";
			//Examine wether SessionStorage is set
			if (sessionStorage.getItem('votedIDS')!=null){
    			
    			var votedIDS = sessionStorage.getItem('votedIDS');
			}

			console.log("This are the already voted IDS:")
			console.log(votedIDS);

			var isVoted=false;
		
			votedIDS=JSON.parse(votedIDS);
			console.log("Recorriendo Array")
			//Examine if the post is already voted
			for (var x=0;x<votedIDS.length;x++){
				console.log(votedIDS[x]);
				if (votedIDS[x]==id){
			    	isVoted=true; 
				}
			}  
			console.log("is Voted = " + isVoted);
			
			if (isVoted==false){
			
				
    			xmlhttp=new XMLHttpRequest();
    			xmlhttp.onreadystatechange=function() {
    			    if (this.readyState==4 && this.status==200) {
    			      //$("#txtHint").html(this.responseText);
    			      	console.log(this.responseText);
    			      	
    	    			//push array
    	    			votedIDS.push(id);
    	    			//Set SessionStorage
    	    			sessionStorage.setItem('votedIDS',JSON.stringify(votedIDS));
    	    			
    	    			location.reload();
    			    	
    			    }
    			}
    			var params="id="  + id + "&" + "rate=" + this.value;
    			
    			xmlhttp.open("POST","insertVideoRate.php",true);
    			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    			xmlhttp.send(params);
    			//alert('New star rating: ' + this.value + ' and the id is: ' + id);
    			
			}else{
				alert('You already voted for this id');
			}
		  	
		});
	</script>
	</div>
</body>


</html>

