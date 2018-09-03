
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
    					
    					if (isUploaded==false){
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
    		    					
        					
    					}else{
        					alert("You already uploaded a video today");
    					}
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
  	
	