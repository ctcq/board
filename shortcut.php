<?php
// Link to a file accessible on the server
// with option to download to client filesystem
require_once "content.php";

class Shortcut extends Content{
	
	function __construct($location, $type, $expires){
		$this->loc = $location;
		$this->type = htmlspecialchars($type);
		$this->expires = htmlspecialchars($expires);
	}
		
	function writeHTML(){
			return "
                <div class='content-wrap shortcut'>
                    <div class='content-name'>
						".$this->title."
                    </div>
                    <div class='content-message'>
                       <a href='manualDownload.php?file=".$this->loc."' class='manual-elem' download> 
							<img class='manual-elem-icon' src='./icons/textfile.png'></img>
							<label class='manual-elem-text'>".$this->loc."</label>
						</a>
                    </div>					
                    <div class='content-time'>
						".htmlspecialchars($this->date)."
                    </div>
                </div>
			";
		}
	
	
}



?>