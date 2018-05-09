<?php

// includes all info about post
	require_once("event.php");
	
	class Post extends Event{
		
		function __construct($n,$m){
			//date_default_timezone_set('UTC');
			$this->time = microtime(true);
			$this->name = htmlspecialchars($n);
			$this->message = htmlspecialchars($m);
			$this->filename = "./savedPosts/".str_replace(".","",$this->time).".rpd";
		}
		
		function writeHTML(){
			return "
                <div class='post-wrap'>
                    <div class='name-post'>
						".$this->name."
                    </div>
					<div class='commentToggle-wrap>
						<label>
							<span class='commentToggle-label'> ausblenden
							</span>
						<input class='toggle-comment' type='checkbox'></input>
						
						</label>
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
		
	}

?>