<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Login");

?>
<div class="container">
	<div class="row">
	    <?php if ($error==true) {?>
		<p class="text-danger">Benutzername oder Passwort falsch!</p>
		<?php }?>
	</div>
	<div class="row">
		<form action="/register/" method="post">
			<div class="form-group">
				<label for="user">Benutzername</label> <input type="text"
					class="form-control" name="user" placeholder="Benutzername"/>
			</div>
			<div class="form-group">
				<label for="password1">Passwort</label> <input type="password"
					class="form-control" name="password1" placeholder="Passwort"/>
			</div>
			<div class="form-group">
				<label for="password2">Passwort wiederholen</label> <input type="password"
					class="form-control" name="password2" placeholder="Passwort"/>
			</div>
			<button type="submit" class="btn btn-default">Registrieren</button>
		</form>

	</div>
</div>