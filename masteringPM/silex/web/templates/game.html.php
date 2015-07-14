<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Game");

?>
<div class="row">
		<div id="modal">
		    <p>Player Green</p>
		
		    <h3>Frage?</h3>
		
		    <div>
		        <a href="">Antwort 1</a>
		        <a href="">Antwort 2</a>
		        <a href="">Antwort 3</a>
		        <a href="">Antwort 4</a>
		    </div>
		</div>
		<header>
		    <div id="welcome">
		        <img src="../img/logowappen.png" alt="Logo, Mastering PM - Let's Plan A Project">
		
		        <p>Willkommen, w&auml;hle die Spieleranzahl</p>
		        <input class="slider" type="range" name="numberOfPlayers" min="2" max="6" step="1" id="numberOfPlayers"
		               oninput="Game.player.setPlayerNumber()" onchange="Game.player.setPlayerNumber()" value="2">
		
		        <div class="playerinput"></div>
		    </div>
		</header>
		<div class="game-area-container">
		    <div id="here"></div>
		</div>
		<div class="footer">
    		<p><button class="button gray"> <a href="#">Service</a></button><button class="button">DONATE</button><button id="restart" class="button gray"><a href="howTo.html">HowTo?</a></button></button></p>
		</div>
</div>
