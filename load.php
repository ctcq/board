<?php

require_once "post.php";
require_once "event.php";
require_once "shortcut.php";

$saveLocation = "./saves/";

// Prints all posts since $time in chronological order in in HTML
function printAllSince($time){
	global $saveLocation;
	$fileList = array_slice(scandir($saveLocation),2);
	$validFiles = [];

	foreach($fileList as $filename){
		//Filenames as timestamp[.event].rsv, [] optional
		if((string)$filename > (string)$time){
			$validFiles[] = $filename;
		}
	}
	foreach ($validFiles as $filename){
		$post = unserialize(file_get_contents($saveLocation."/".$filename));
			if(!$post){
				echo "Laden fehlgeschlagen!";
			}
			else{
				echo $post->writeHTML();
			}
	}
	
}

function printAll(){
	global $saveLocation;
	$fileList = array_slice(scandir($saveLocation),2);

	foreach ($fileList as $filename){
		$post = unserialize(file_get_contents($saveLocation."/".$filename));
			if(!$post){
				echo "Laden fehlgeschlagen!";
			}
			else{
				echo $post->writeHTML();
			}
	}
	
}


?>