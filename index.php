<!DOCTYPE html>
<!--

-->
<html>
    <head>
		
        <title>AMK Textboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src='index.js'></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <link rel='stylesheet' type='text/css' href='index.css'>
    </head>
    <body>
		<span id='status'>
		</span>
        <div class='header-wrap'>
			AMK Chat
        </div>
        
        <div class='site-wrap'>
        <div id="output" class='output-wrap'>
            <!--
            All posted content goes here
            -->
			<?php
				//Prints all saved posts
				include "load.php";
				printAll();
			?>
			
        </div>
        </div>
        <div class='input-wrap'>
            <div class='nameInput-wrap'>
                <input id='messageName' type='text' name='name' class='name-input' <?php if(isset($_COOKIE['name'])){echo "value = '".$_COOKIE['name']."'";}else{echo "Niemand";}?>></input>
                </div>
            <div class='message-wrap'>
                <textarea id='messageArea' name='message'></textarea>
                </div>
            <div class='refreshButton-wrap'>
                <input id='refreshButton' type='submit' class='refresh-button' value='Aktualisieren'/>
                </div>
            <div class='submitButton-wrap'>
                <input id='submitButton' type='submit' class='submit-button' value='Senden'/>
            </div>
        </div>
		
			<script>
				window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
			</script>
    </body>
</html>
