<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Login");

?>
<div class="container">
	<div class="row">
	    <?php if ($username != "") {?>
		<p class="text-success">Eingeloggt als: <?= $username?></p>
		<?php }?>
	    <?php if ($error==true) {?>
		<p class="text-danger">Benutzername oder Passwort falsch.</p>
		<?php }?>
	</div>
	<div class="row">
		<form action="/login/" method="post">
			<div class="form-group">
				<label for="user">Benutzername</label> <input type="text"
					class="form-control" name="user" placeholder="Benutzername">
			</div>
			<div class="form-group">
				<label for="password">Passwort</label> <input type="password"
					class="form-control" name="password" placeholder="Passwort">
			</div>
			<button type="submit" class="btn btn-default">Login</button>
			<a class="btn btn-default" type="Button" href="/register/">Registrierung</a>
		</form>

	</div>
</div>