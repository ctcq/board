<?php

include "load.php";

if(isSet($_POST['time'])){
	echo printAllSince($_POST['time']);
}
else{
	echo printAll();
}

?>