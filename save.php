<?php
//Includes post class
require_once "post.php";

setcookie("name",$_POST['name'],0);
// All Info saved
$name = $_POST['name'];
$message = /*str_replace("\n","<br>",*/($_POST['message']);
// Create Post Object
$post = new Post($name,$message);
$post->save();

?>