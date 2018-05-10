<?php

// includes all info about post
	
	class Post{
		
		function __construct($n,$m){
			//date_default_timezone_set('UTC');
			$this->time = microtime(true);
			$this->name = htmlspecialchars($n);
			$this->message = htmlspecialchars($m);
			$this->filename = "./savedPosts/".str_replace(".","",$this->time).".rpd";
		}
		
		function getFormattedTime(){
				$time = DateTime::createFromFormat('U.u', $this->time);
				return $time->format("d-m-Y H:i:s");
			}
		
		function writeHTML(){
			return "
                <div class='post-wrap post'>
                    <div class='name-post'>
						".$this->name."
                    </div>
                    <div class='message-post'>
                       ".str_replace("\n","<br>",$this->message)."
                    </div>					
                    <div class='time-post'>
						".$this->getFormattedTime()."
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