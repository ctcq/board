var LAST_REFRESHED = Date.now();

var dragTimer;

$(document).on('dragover', function(e) {
  var dt = e.originalEvent.dataTransfer;
  if (dt.types && (dt.types.indexOf ? dt.types.indexOf('Files') != -1 : dt.types.contains('Files'))) {
    showFileTransfer(true);
    window.clearTimeout(dragTimer);
  }
});
$(document).on('dragleave', function(e) {
  dragTimer = window.setTimeout(function() {
	  showFileTransfer(false);
  }, 25);
});

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

// Makes a content-wrap div generated from content.php expand/retract
function contentAction(elem){
	if($(elem).children(".content-message").css('display') == 'none'){
		$(elem).children(".content-message").css("display","block");
		$(elem).children(".content-name").css("display","block");
		$(elem).children(".content-time").css("display","block");
	}
	else{
		$(elem).children(".content-message").css("display","none");
		$(elem).children(".content-name").css("display","inline");
		$(elem).children(".content-time").css("display","inline");
	}
}

function showFileTransfer(bool){
	if(bool){
		$(".filetransfer-wrap").css("display","block");
		$(".site-wrap").css("display","none");
	}
	else{
		$(".filetransfer-wrap").css("display","none");
		$(".site-wrap").css("display","block");
	}
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
$('#submitButton').click(function(){
	
	if($('#messageArea').value == ""){
		return;
	}
	
	var xhr = new XMLHttpRequest();
	var postData = new FormData();
	postData.append('name',$('#messageName').val());
	postData.append('message',$('#messageArea').val());
	xhr.onreadystatechange = function() {
	if (xhr.readyState == XMLHttpRequest.DONE) {
		$('#status').text(xhr.responseText);
		$('#messageArea').value = "";
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

$(".content-wrap").click(function(){
	contentAction($(this));
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