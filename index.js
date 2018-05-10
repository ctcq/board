var LAST_REFRESHED = Date.now();

function refresh(t){
	var time = Date.now(); // For later comparison
	
	var xhr = new XMLHttpRequest();
	var postData = new FormData();
	postData.append('time', t);
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {			
			//Replaces everything
			$('#output').append(this.responseText);
			$(".output-wrap").animate({ scrollTop: $('.output-wrap').prop("scrollHeight")}, 1000);
			}
		};
		
	xhr.open("post", "reload.php", true);
	xhr.send(postData);
	
	return time;
}

function newEvent(d,t,m){
	var xhr = new XMLHttpRequest();
	var postData = new FormData();
	postData.append('title',t);
	postData.append('date',d);
	postData.append('message',m);
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {			
			return xhr.responseText;
			}
		}
   xhr.open("post", "saveEvent.php");
   xhr.send(postData);
}

window.onload = function(){
    
    var nameInput = $('#messageName');
    var messageInput = $('#messageArea');
	
	var statusBar = $('#status');
	var output = $('#output-wrap');

    $('#submitButton').click(function(){
		
		if(messageInput.value == ""){
			return;
		}
		
		var xhr = new XMLHttpRequest();
		var postData = new FormData();
		postData.append('name',nameInput.val());
		postData.append('message',messageInput.val());
		xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {
			statusBar.text(xhr.responseText);
			messageInput.value = "";
			$('#refreshButton').click();
			}
		}
       xhr.open("post", "save.php");
       xhr.send(postData);
    });
	
	$('#refreshButton').click(function(){
		LAST_REFRESHED = refresh(10*LAST_REFRESHED); //10 bc php microtime got one more digit :/
	});
	
	// Collapse/Expand Comments
	
	$(".post-wrap").click(function(){
		if($(this).children(".message-post").css('display') == 'none'){
			$(this).children(".message-post").css("display","block");
			$(this).children(".name-post").css("display","block");
			$(this).children(".time-post").css("display","block");
		}
		else{
			$(this).children(".message-post").css("display","none");
			$(this).children(".name-post").css("display","inline");
			$(this).children(".time-post").css("display","inline");
		}
	});	
	
	// Show/Hide Tabs
	
	$("#showManuals").click(function(){
		$('.tab').css("display","none");
		$('#manuals-tab').css("display","block");
	});
	
	$("#showChat").click(function(){
		// Show all Events and Posts in case disabled
		$('.post').css("display","block");
		$('.event').css("display","block");
		
		$('.tab').css("display","none");
		$('#chat-tab').css("display","block");
	});
	
	$("#showNewEvent").click(function(){
		//Hide all Tabs
		$('.tab').css("display","none");
		//Show NewEvent Tab
		$('#newEvent-tab').css("display","block");
	});
	
	$("#showEvents").click(function(){
		//Show Chat Tab
		$('.tab').css("display","none");
		$('#chat-tab').css("display","block");	
		
		//Disable all Posts and show all events
		$('.post').css("display","none");
		$('.event').css("display","block");
	});
	
	/*
		NewEventTab Stuff
	*/	
	$( function() {
		$( "#datepicker" ).datepicker();
	} );
	
	$("#submitEvent").click(function(){
		newEvent($("#datepicker").val(),$("#eventTitleInput").val(),$("#eventDescription").val());
		/*
		Todo show calendar
		until then
		*/
		$("#showChat").click();
	});
	
};