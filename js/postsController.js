$('[type=radio]').change(function() {
			/* find post */
			var post = $(this).parent().parent().parent().parent().find("textarea").val();
			console.log(post);
			
			var votedPosts = "[]";
			//Examine wether SessionStorage is set
			if (localStorage.getItem('votedPosts')!=null){
    			
    			var votedPosts = sessionStorage.getItem('votedPosts');
			}

			console.log("This are the already voted posts:")
			console.log(votedPosts);

			var isVoted=false;
		
			votedPosts=JSON.parse(votedPosts);
			console.log("Recorriendo Array")
			//Examine if the post is already voted
			for (var x=0;x<votedPosts.length;x++){
				console.log(votedPosts[x]);
				if (votedPosts[x]==post){
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
    			    	
    			    }
    			}
    			var params="post="  + post + "&" + "rate=" + this.value;
    
    			xmlhttp.open("POST","insertRate.php",true);
    			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    			xmlhttp.send(params);
    			//alert('New star rating: ' + this.value + ' and the post is: ' + post);
    			//push array
    			votedPosts.push(post);
    			//Set SessionStorage
    			localStorage.setItem('votedPosts',JSON.stringify(votedPosts));
    			
    			location.reload();
			}else{
				alert('You already voted for this post');
			}
		  	
		});
	
		
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