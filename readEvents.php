<?php

$location = "events.csv";
$eventList = [];

// Auslesen der csv Datei "events.csv"
$row = 1;
if (($handle = fopen($location, "r")) !== FALSE) {
  while (($eventList = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $num = count($eventList);
    $row++;
  }
  fclose($handle);
}

?>