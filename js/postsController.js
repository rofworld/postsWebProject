$('[type=radio]').change(function() {
			/* find post */
			var id = $(this).closest("tr").find(".idPost").html();
			console.log(id);
			
			var votedIDS = "[]";
			//Examine wether SessionStorage is set
			if (localStorage.getItem('votedIDS')!=null){
    			
    			var votedIDS = localStorage.getItem('votedIDS');
			}

			console.log("This are the already voted posts:")
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
    	    			localStorage.setItem('votedIDS',JSON.stringify(votedIDS));
    	    			
    	    			location.reload();
    			    	
    			    }
    			}
    			var params="id="  + id + "&" + "rate=" + this.value;
    
    			xmlhttp.open("POST","insertRate.php",true);
    			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    			xmlhttp.send(params);
    			
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