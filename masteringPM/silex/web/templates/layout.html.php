<?php
$title = $view["slots"]->get("title", "MyWebsite");
?>
<!DOCTYPE html>
<html>
<head>                   
	<meta charset="UTF-8">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	
	<!-- Optional theme -->
	
	<!-- Latest compiled and minified JavaScript -->	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="theme-color" content="#272c34">
	<script src="../js/jquery.min.js"></script>
	<script>var Game = Game || {};</script>
	<!--script src="js/teststuff.js"></script-->
	<script src="../js/Game.question.js"></script>
	<script src="../js/Game.static.js"></script>
	<script src="../js/Game.static.isWinner.js"></script>
	<script src="../js/Game.config.js"></script>
	<script src="../js/Game.main.js"></script>
	<script src="../js/Game.creator.js"></script>
	<script src="../js/Game.player.js"></script>
	<script src="../js/Game.ki.js"></script>
	<script src="../js/game.js"></script>
	<link rel="stylesheet" href="../style.css" type="text/css">
	<link rel="stylesheet" href="../form.css">
	<style id="css" class="forJavascriptOnly"></style>
	<title> <?= $title ?> </title>
</head>
<body id="body">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">masteringPM</a>
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="nav navbar-nav">
					<li <?= $title == "Game" ? "class=\"active\"" : "" ?>><a href="/game"><span class="glyphicon glyphicon-hand-right"
							aria-hidden="true"></span>Game</a></li>
					<li <?= $title == "Service" ? "class=\"active\"" : "" ?>><a href="/service"><span class="glyphicon glyphicon-eye-open"
							aria-hidden="true"></span>Service</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
        <?php
        $view["slots"]->output("_content");
        ?>
    </div>
</body>