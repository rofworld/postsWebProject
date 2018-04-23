
<html>

<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



<link rel="stylesheet" href="css/style.css"/>
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
              <a class="nav-item nav-link active" href="#">Post of today</a>
              <a class="nav-item nav-link" href="#">Best posts</a>
            </div>
          </div>
	</nav>
	
	
	<div class="rowPrincipal">
		<h3>The post of yesterday was:</h3><br>
		<textarea rows='5' class='postOfTheDay' maxlength='250' disabled>
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
    	
    	$resultado = mysqli_query($conn,"SELECT post_of_the_day FROM post_of_the_day");
    	while ($fila = mysqli_fetch_array($resultado, 2)) {
    	   $postOfTheDay = $fila[0];
    	}
    	echo $postOfTheDay;
?>   	    
		</textarea>
	</div>
	
	<div class="row">
		<h4>write your post here:</h4>
	</div>
	<div class="row">
	
	<button type="button" id="addButton" class="btn btn-primary">Add</button>
	
	<textarea class="form-control" rows="5" id="post" maxlength="200"></textarea>
	
	<script type="text/javascript">
		$("#addButton").click(function() {
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			      //$("#txtHint").html(this.responseText);
					console.log(this.responseText);
					location.reload();
			    }
			}
			var params="text="  + $("#post").val()
			xmlhttp.open("POST","insert.php",true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
			xmlhttp.send(params);
			
		});
  	</script>
	
	
	</div> 
	
	<!-- 
	<div class="row">
		<div id="txtHint"><b></b></div>
	</div>
	 -->
	<div class="row">
	
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
    	
    	$resultado = mysqli_query($conn,"SELECT posts,total_rate FROM posts ORDER BY total_rate DESC");
    	echo "<h3>This are the user posts</h3>";
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
    	               echo "
                        
                        <form class='rating'>
  <label>
    <input type='radio' name='stars' value='1' />
    <span class='icon'>★</span>
  </label>
  <label>
    <input type='radio' name='stars' value='2' />
    <span class='icon'>★</span>
    <span class='icon'>★</span>
  </label>
  <label>
    <input type='radio' name='stars' value='3' />
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>   
  </label>
  <label>
    <input type='radio' name='stars' value='4' />
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>
  </label>
  <label>
    <input type='radio' name='stars' value='5' />
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>
    <span class='icon'>★</span>
  </label>
</form>

";
    	           echo "</td>";
    	       echo "</tr>";
    	       
    	    echo "</tbody>";
    	}
		
        echo "</table>";
	?>
	<script type="text/javascript">
		$('[type=radio]').change(function() {
			/* find row position */
			var post = $(this).parent().parent().parent().parent().find("textarea").val();
			console.log(post);
			
			//var post="La vida es una tombola";
			xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function() {
			    if (this.readyState==4 && this.status==200) {
			      //$("#txtHint").html(this.responseText);
			      	console.log(this.responseText);
			    	
			    }
			}
			var params="post="  + post + "&" + "rate=" + this.value;

			xmlhttp.open("POST","insertRate.php",true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
			xmlhttp.send(params);
			alert('New star rating: ' + this.value + ' and the post is: ' + post);
			location.reload();
		  	
		});
	</script>
	</div>
</body>


</html>
