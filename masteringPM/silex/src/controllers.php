<?php
use Symfony\Component\HttpFoundation\Request;


$app->match('/service/', function (Request $request) use($app)
{
	if ($request->isMethod('POST')) {
		
		$thema = $request->get('thema');
		$neu = $request->get('neu');
		$frage = $request->get('frage');
		$rAntwort = $request->get('rAntwort');
		$bAntwort = $request->get('bAntwort');
		$cAntwort = $request->get('cAntwort');
		$dAntwort = $request->get('dAntwort');
		$email = $request->get('user');
		$difficult = $request->get('difficult');
		
		if (empty($email)
				or empty($frage)
				or empty($rAntwort)
				or empty($bAntwort)
				or empty($cAntwort)
				or empty($dAntwort)) {
			$folder = scandir('questions');
			$array = array();
			
			$i = 2;
			foreach (array_slice($folder, 2) as $value) {
				array_push($array, str_replace(".json", "", $value));
			}
			return $app['templating']->render('service.html.php', array("files" => $array, "error" => true));
		}
		
		if(strcmp($thema, '*neu*') == 0){
			$json = new stdClass();	
			$json->topic = $neu;
			$json->description = "";
			$json->questions = array();
		}
		else {
			$file = file_get_contents('questions/'.$thema.'.json', FILE_USE_INCLUDE_PATH);
			$json = json_decode($file);
		}
		$questions = new stdClass();
		
		$questions->Kategorie = "Multiple Choice";
		$questions->Frage = $frage;
		$questions->{'Antwort A'} = $rAntwort;
		$questions->{'Antwort B'} = $bAntwort;
		$questions->{'Antwort C'} = $cAntwort;
		$questions->{'Antwort D'} = $dAntwort;
		$questions->Schwierigkeit = $difficult;
		$questions->Quelle = "Portal";
		$questions->{utf8_encode('Überprüft')} = "Nein";
		$questions->{'Richtige Antwort'} = $rAntwort;
		$questions->Ersteller = $email;
		$questions->{'Antwort Buchstabe'} = "A";
		
		array_push($json->questions, $questions);		
		
		if(strcmp($thema, '*neu*') == 0){
			$datei = fopen('questions/'.$neu.'.json', 'w+');
		}
		else {
			$datei = fopen('questions/'.$thema.'.json', 'w+');
		}
		$string = json_encode($json, JSON_PRETTY_PRINT);
		$string = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
			return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
		}, $string);
		
		fwrite($datei, $string);
		fclose($datei);
	    return $app['templating']->render('success.html.php', array());				
	}
	else {
		$folder = scandir('questions');
		$array = array();
		
		$i = 2;
		foreach (array_slice($folder, 2) as $value) {
			array_push($array, str_replace(".json", "", $value));
		}
		
	    return $app['templating']->render('service.html.php', array("files" => $array, "error" => false));		
	}
});

