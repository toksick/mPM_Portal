<?php
$view["slots"]->set("title", "Service");

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Mastering PM - Serviceportal</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header>
    <div align="center">
        <img src="../img/logowappen.png" alt="Logo, Mastering PM - Let's Plan A Project">
    </div>
</header>
<div class="col-xs-12">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sende uns Deine Frage!</h3>
            </div>
            <div class="panel-body">
                <form action="/service/" method="post">
                    <div class="form-group">
                        <label for="email">Deine E-Mail Adresse:</label>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <hr/>
                    <div class="form-group">
                        <textarea class="form-control" rows="2" id="question" name="frage"
                                  placeholder="Trag hier deine Frage ein"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer1" name="rAntwort" placeholder="Richtige Antwort">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer2" name="bAntwort" placeholder="2. Antwort">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer3" name="cAntwort" placeholder="3. Antwort">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="answer4" name="dAntwort" placeholder="4. Antwort">
                    </div>
                    <div class="form-group">
                        <label>Schwierigkeit:</label>
                        <select class="form-control">
                            <option>1 - leicht</option>
                            <option>2 - mittel</option>
                            <option>3 - schwer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thema:</label>
                        <select class="form-control">
                        	<?php foreach ($files as $value) {?>
	                            <option><?= $value?></option>
                        	<?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Absenden</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>