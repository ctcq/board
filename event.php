<?php
require_once "content.php";

// Content for Event tab
class Event extends Content{
	
	function __construct($date, $title, $message){
		date_default_timezone_set('Europe/Berlin');
		$this->date = $date; //Format like "22-04-2018"
		$this->title = htmlspecialchars($title);
		$this->message = htmlspecialchars($message);
	}
	
	function writeHTML(){
			return "
                <div class='content-wrap event'>
                    <div class='content-name'>
						".$this->title."
                    </div>
                    <div class='content-message'>
                       ".str_replace("\n","<br>",$this->message)."
                    </div>					
                    <div class='content-time'>
						".htmlspecialchars($this->date)."
                    </div>
                </div>
			";
		}
	/*
	function save(){
		// Save serialized class with current date at 0:00 as filename
		$file = fopen($this->filename, "w") or die("Speichern fehlgeschlagen!");
		fwrite($file, serialize($this));
		fclose($file);
		return $this->filename;
	}
	*/
}

?>