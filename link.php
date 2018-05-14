<?php
// Link to a file accessible on the server
// with option to download to client filesystem
require_once "content.php";

class Shortcut extends Content{
	
	function __construct($location, $type, $expires){
		$this->location = htmlspecialchars($location);
		$this->type = htmlspecialchars($type);
		$this->expires = htmlspecialchars($expires);
		$this->id = microtime(true);
	}
		
	function writeHTML(){
			return "
                <div class='content-wrap shortcut'>
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
	
	
}



?>