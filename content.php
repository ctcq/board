<?php

abstract class Content{
	
	// HTML for use in Browser, returns string
	abstract function writeHTML();
	
	// Save this Object to Database, returns path
	function save(){
		// Save serialized class with current date at 0:00 as filename
		$file = fopen($this->getLocation(), "w") or die("Speichern fehlgeschlagen!");
		fwrite($file, serialize($this));
		fclose($file);
		return $this->getLocation();
	}
		
	// Calculates location on server based on timestamp etc
	function getLocation(){
		return "./saves/".str_replace(".","",$this->getTime()).".rpd";
	}
		
	// returns this object's timestamp
	function getTime(){
		return microtime(true);
	}
	
	
}

?>