<!DOCTYPE html>

<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		</head>
	<body>
	
<?php

$location = "./Anleitungen/"; //later smth like /samba/SchwarzesBrett/Anleitungen/;

//List all files
$files = array_slice(scandir($location),2);

//Write HTML-Code with Download-Link
echo "<div class='manuals-wrap'>";
foreach($files as $file){
	echo "<a href='manualDownload.php?file=".$file."' class='manual-elem' download> 
			<img class='manual-elem-icon' src='./icons/textfile.png'></img>
			<label class='manual-elem-text'>".$file."</label>
			</a>";
}
echo "</div>";

?>
	</body>
</html>