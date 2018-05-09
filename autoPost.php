<?php
include post.php;

class Event{
	
	function __construct($date, $title, $message){
		$this->date = $date;
		$this->title = htmlspecialchars($title);
		$this->message = htmlspecialchars($message);
	}
	
	function isToday(){
		return $this->date ===  date("d-m-Y",microtime(true));
	}
	
	function writeHTML(){
			return "
                <div class='post-wrap' style='border-color:red'>
                    <div class='name-post'>
						".$this->title."
                    </div>
                    <div class='message-post'>
                       ".$this->message."
                    </div>					
                    <div class='time-post'>
						".$this->date."
                    </div>
                </div>
			";
		}
	
}

?>