<?php

function loadTopics(){
	$ornder = scandir('questions');
	$array = array();
	
	$i = 2;
	foreach (array_slice($ornder, 2) as $dateiname) {
		$finde = strpos($dateiname, ".json");
		if (empty($finde) == false) {
			$datei = file_get_contents("questions/".$dateiname);
			$json = json_decode($datei);
			array_push($array, $json->topic);
		}
	}
	return $array;
}

function changeChar($string){
	return str_replace(array("ä", "ö", "ü", "ß", "Ä", "Ö", "Ü") , array("ae", "oe", "ue", "ss", "Ae", "Oe", "Ue"), $string);
}