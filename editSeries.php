<?php 
require_once('database.php');
require_once('series.php');

?>

<h1>Series</h1>

    <?php
    if (!empty($_GET['edit'])) :
        $o = new Serie($_GET['edit']); ?>
        <h2>Modifier</h2>
        <form action="/" method="post">
            <input type='hidden' name='id' value='<?= $o->getId() ?>'>
            <p><input type='text' name="title" placeholder="titre de la série" required value="<?= $o->getTitle() ?>"></p>
            <p><input type='text' name="origin" placeholder="origine(bd/manga/comics)" value="<?= $o->getOrigin() ?>"></p>
            <p><button type="submit" name="edit">modifier</button></p>
        </form>
    <?php  endif;