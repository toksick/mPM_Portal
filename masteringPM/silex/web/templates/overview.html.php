<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Blog");

?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title"><?= $post['title']?></h3>
          </div>
          <div class="panel-body">
            <?= $post['text']?>
          </div>
        </div>        
    </div>
</div>