function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires;
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

window.onload = function(){
         
    var changeNameButton = document.getElementById('changeNameButton');
    var submitButton = document.getElementById('submitButton');

    var nameInput = document.getElementById('messageName');
    var messageInput = document.getElementById('messageArea');

    nameInput.value = getCookie('username');  

    changeNameButton.onclick = function(){   

        if(nameInput.disabled){
            nameInput.disabled = false;
            this.style = 'background-color: yellow; color: black;';
            this.innerText = 'Namen bestätigen';
        }
        else{
            setCookie('username', nameInput.value, 360*10);
            
            nameInput.disabled = true;
            this.style = 'background-color: #003300; color: #dbe6e4;';
            this.innerText = '  Namen ändern  ';
        }
    }

    submitButton.onclick = function(){
       var xhr = new XMLHttpRequest();
       var postData = new FormData();
       postData.append('name',username.value);
       postData.append('message',messageInput.value);
    }


}