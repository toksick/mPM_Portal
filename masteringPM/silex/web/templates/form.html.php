<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Post");

?>
<div class="container">
	<div class="row">
	    <?php if ($error==true) {?>
		  <h3 class="text-danger">Nicht alle Felder gefüllt!</h3>
		<?php }?>
	    <?php if ($username == "") {?>
		  <h3 class="text-danger">Du musst eingelogt sein.</h3>
		<?php }?>
	</div>
	<div class="row">
		<form action="/form/" method="post">
		    <h2>Titel</h2>
			<input class="form-control" type="text" name="title" />
			<h2>Text</h2>
			<textarea class="form-control" name="text" rows="5" cols="30"></textarea>
			<button class="btn btn-default" type="submit">Post</button>
		</form>
	</div>
</div>