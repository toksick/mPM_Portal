<?php
use Symfony\Component\HttpFoundation\Request;
include ("methods.php");

$app->match ( '/service/', function (Request $request) use($app) {
	if ($request->isMethod ( 'POST' )) {
		
		$thema = $request->get ( 'thema' );
		$neu = $request->get ( 'neu' );
		$frage = $request->get ( 'frage' );
		$rAntwort = $request->get ( 'rAntwort' );
		$bAntwort = $request->get ( 'bAntwort' );
		$cAntwort = $request->get ( 'cAntwort' );
		$dAntwort = $request->get ( 'dAntwort' );
		$email = $request->get ( 'user' );
		$schwer = $request->get ( 'difficult' );
		
		if (empty ( $email ) 
				or empty ( $frage ) 
				or empty ( $rAntwort ) 
				or empty ( $bAntwort ) 
				or empty ( $cAntwort ) 
				or empty ( $dAntwort )) {
			
			$array = loadTopics ();
			return $app ['templating']->render ( 'service.html.php', array (
					"files" => $array,
					"error" => true,
					"neuFalse" => false 
			) );
		}
		
		if (strcmp ( $thema, '*neu*' ) == 0) {
			$dateiname = changeChar ( $neu );
			if (ctype_alnum ( $dateiname ) == false) {
				$array = loadTopics ();
				return $app ['templating']->render ( 'service.html.php', array (
						"files" => $array,
						"error" => false,
						"neuFalse" => true 
				) );
			}
			$json = new stdClass ();
			$json->topic = $neu;
			$json->description = "";
			$json->questions = array ();
		} else {
			$dateiname = changeChar ( $thema );
			$file = file_get_contents ( 'questions/' . $dateiname . '.json', FILE_USE_INCLUDE_PATH );
			$json = json_decode ( $file );
		}
		$frageObj = new stdClass ();
		
		$frageObj->Kategorie = "Multiple Choice";
		$frageObj->Frage = $frage;
		$frageObj->{'Antwort A'} = $rAntwort;
		$frageObj->{'Antwort B'} = $bAntwort;
		$frageObj->{'Antwort C'} = $cAntwort;
		$frageObj->{'Antwort D'} = $dAntwort;
		$frageObj->Schwierigkeit = $schwer;
		$frageObj->Quelle = "Portal";
		$frageObj->Überprüft = "Nein";
		$frageObj->{'Richtige Antwort'} = $rAntwort;
		$frageObj->Ersteller = $email;
		$frageObj->{'Antwort Buchstabe'} = "A";
		
		array_push ( $json->questions, $frageObj );
		
		$datei = fopen ( 'questions/' . $dateiname . '.json', 'w+' );
		
		$string = json_encode ( $json, JSON_PRETTY_PRINT );
		$string = preg_replace_callback ( '/\\\\u([0-9a-fA-F]{4})/', function ($match) {
			return mb_convert_encoding ( pack ( 'H*', $match [1] ), 'UTF-8', 'UTF-16BE' );
		}, $string );
		fwrite ( $datei, $string );
		fclose ( $datei );
		return $app ['templating']->render ( 'success.html.php', array () );
	} else {
		$array = loadTopics ();
		
		return $app ['templating']->render ( 'service.html.php', array (
				"files" => $array,
				"error" => false,
				"neuFalse" => false 
		) );
	}
} );

$app->match ( '//', function (Request $request) use($app) {
	return $app ['templating']->render ( 'game.html.php', array () );
} );
$app->match ( '/game/', function (Request $request) use($app) {
	return $app ['templating']->render ( 'game.html.php', array () );
} );

