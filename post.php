<?php
require_once "content.php";

//	Textpost for Chat
	class Post extends Content{
		
		function __construct($n,$m){
			//date_default_timezone_set('UTC');
			$this->time = microtime(true);
			$this->name = htmlspecialchars($n);
			$this->message = htmlspecialchars($m);
		}
		
		function getFormattedTime(){
				$time = DateTime::createFromFormat('U.u', $this->time);
				return $time->format("d-m-Y H:i:s");
			}
		
		function writeHTML(){
			return "
                <div class='content-wrap post'>
                    <div class='content-name'>
						".$this->name."
                    </div>
                    <div class='content-message'>
                       ".str_replace("\n","<br>",$this->message)."
                    </div>					
                    <div class='content-time'>
						".$this->getFormattedTime()."
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