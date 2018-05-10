<?php
require_once "post.php";

class Event{
	
	function __construct($date, $title, $message){
		date_default_timezone_set('Europe/Berlin');
		$this->date = $date; //Format like "22-04-2018"
		$this->title = htmlspecialchars($title);
		$this->message = htmlspecialchars($message);
		$this->filename = "./savedPosts/".strtotime($this->date).".".$this->title.".rpd";
	}
		
	function writeHTML(){
			return "
                <div class='post-wrap event'>
                    <div class='name-post'>
						".$this->title."
                    </div>
                    <div class='message-post'>
                       ".str_replace("\n","<br>",$this->message)."
                    </div>					
                    <div class='time-post'>
						".htmlspecialchars($this->date)."
                    </div>
                </div>
			";
		}
	
	function save(){
		// Save serialized class with current date at 0:00 as filename
		$file = fopen($this->filename, "w") or die("Speichern fehlgeschlagen!");
		fwrite($file, serialize($this));
		fclose($file);
		return $this->filename;
	}
	
}

?>