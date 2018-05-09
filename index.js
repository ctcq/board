var LAST_REFRESHED = Date.now();

function refresh(t){
	var time = Date.now(); // For later comparison
	
	var xhr = new XMLHttpRequest();
	var postData = new FormData();
	postData.append('time', t);
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {			
			//Replaces everything
			output.innerHTML += this.responseText;
			window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
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
    
    var submitButton = document.getElementById('submitButton');

    var nameInput = document.getElementById('messageName');
    var messageInput = document.getElementById('messageArea');
	
	var statusBar = document.getElementById('status');
	var output = document.getElementById('output');

    submitButton.onclick = function(){
		
		if(messageInput.value == ""){
			return;
		}
		
		var xhr = new XMLHttpRequest();
		var postData = new FormData();
		postData.append('name',nameInput.value);
		postData.append('message',messageInput.value);
		xhr.onreadystatechange = function() {
		if (xhr.readyState == XMLHttpRequest.DONE) {
			statusBar.innerHTML = xhr.responseText;
			messageInput.value = "";
			refreshButton.click();
			}
		}
       xhr.open("post", "save.php");
       xhr.send(postData);
    };
	
	refreshButton.onclick = function(){
		LAST_REFRESHED = refresh(10*LAST_REFRESHED); //10 bc php microtime got one more digit :/
	};
	
	$(".toggle-comment").click(function(){
		console.log("triggered");
		if(!this.checked === true){
			$(this).parent().siblings(".message-post").css("display","block");
		}
		else{
			$(this).parent().siblings(".message-post").css("display","none");
		}
	});
};