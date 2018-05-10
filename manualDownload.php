<?php

$location = "./Anleitungen/";
$file = $_GET['file'];

header("Content-Type: ".pathinfo($file)['extension']);
header("Content-Disposition: attachment; filename=".$file);

readfile($location.$file);

?>

