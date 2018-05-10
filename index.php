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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
		
		
        <link rel='stylesheet' type='text/css' href='index.css'>
    </head>
    <body>
		<span id='status'>
		</span>
        <div class='header-wrap'>
			<button id='showChat' class='tabButton'>Chat</button>
			<button id='showEvents' class='tabButton'>Ankündigungen</button> <!--- Insert number of unread events later --->
			<button id='showNewEvent' class='tabButton'>Veranstaltung ansagen</button>
			<button id='showManuals' class='tabButton'>Anleitungen</button>
        </div>
        
        <div class='site-wrap'>
		
		<!--- New Event Tab --->
		<div id="newEvent-tab" class="tab">
			<div class="newEvent-wrap">
				<h1> Neue Veranstaltung ankündigen </h1><p>
				<label> Datum </label><input id="datepicker" type="text"/></p><p>
				<label> Name der Veranstaltung </label><input id="eventTitleInput" type="text"/></p><p>
				<label> Beschreibung </label> <textarea id="eventDescription"></textarea></p><p>
				<button id="submitEvent">Bestätigen</button></p>
			</div>
		</div>
		
		<!--- Manuals Tab --->
		<div id="manuals-tab" class='tab'>
				<?php include "manuals.php";?>
		</div>
				
		<!--- Chat Tab --->
		<div id="chat-tab" class="tab">
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
		</div>
		
			<script>
				window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
			</script>
    </body>
</html>
