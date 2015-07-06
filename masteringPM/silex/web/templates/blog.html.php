<?php
$view->extend("layout.html.php");
$view["slots"]->set("title", "Blog");

?>
<div class="row">
    <div class="col-sm-12" >
        <?php foreach ($posts as $value) { ?>
            <div class="list-group">
              <a href="/blogposts/post/<?= $value['id']?>" class="list-group-item">
                <h4 class="list-group-item-heading"><?= $value['title']?> - (von: <?= $value["author"]?> am: <?= $value["created_at"]?>)</h4>
                <p class="list-group-item-text"><?= $value['text']?></p>
              </a>
              <a class="btn btn-default" type="Button" href="/blogpost/delete/<?= $value['id']?>">Delete</a>
            </div>
        <?php }?>
    </div>
</div>