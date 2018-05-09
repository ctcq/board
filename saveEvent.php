<?php
require_once "event.php";

//expects POST Parameters:  date, title and message
$event = new Event($_POST['date'],$_POST['title'],$_POST['message']);
echo $event->filename;
$event->save();

?>