<?php 
require_once('database.php');
require_once('books.php');

if (!empty($_POST) && (isset($_POST['edit']))) {
    $new = new Books($_POST);
        $new->save($_POST['seriesId']);
    header('Location: index.php');
    exit();
}
?>

<h1>Series</h1>

    <?php
    if (!empty($_GET['edit'])) :
        $o = new Books($_GET['edit']); ?>
        <h2>Modifier</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input type='hidden' name='id' value='<?= $o->getId() ?>'>
        <div class="form-group">
            <label for="title">titre</label>
            <p><input class="form-control" value="<?= $o->getTitle() ?>" type="text" name="title" id="title" placeholder="Volume 1"></p>
        </div>

        <div class="form-group">
            <label for="title">Numéros</label>
            <p><input class="form-control" value="<?= $o->getNum() ?>" type="number" name="num" id="num" placeholder="1"></p>
        </div>
        <div class="form-group">
            <label for="writer">Scénario</label>
            <p><input class="form-control" value="<?= $o->getWriter() ?>" type="text" name="writer" id="writer" placeholder="Watanabe, Tsunehiko"></p>
        </div>
        <div class="form-group">
            <label for="illustrator">Dessin</label>

            <p><input class="form-control" value="<?= $o->getIllustrator() ?>" type="text" name="illustrator" id="illustrator" placeholder="Hinotsuki, Neko"></p>
        </div>
        <div class="form-group">
            <label for="editor">Editeur</label>
            <p><input class="form-control" value="<?= $o->getEditor() ?>" type="text" name="editor" id="editor" placeholder="Delcourt"></p>
        </div>
        <div class="form-group">
            <label for="releaseyear">Année de création</label>
            <p><input class="form-control" value="<?= $o->getReleaseyear() ?>" type="text" name="releaseyear" id="releaseyear" placeholder="2019"></p>
        </div>
        <div class="form-group">
            <label for="strips">Planches </label>
            <p><input class="form-control" value="<?= $o->getStrips() ?>" type="text" name="strips" id="strips" placeholder="164"></p>
        </div>
        <div class="form-group">
            <label for="cover">Image de couverture</label>
            <p><input class="form-control" value="<?= $o->getCover() ?>" type="text" name="cover" id="cover" placeholder="Couv_366684.jpg"></p>
        </div>
        <div class="form-group">
            <label selected>Image principale de la série</label>
            <select class="form-select" aria-label="Default select example" name="rep">
                <option selected value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>
        <input type='hidden' name='seriesId' value='<?= $o->getSerie_id()?>'>

        <p><button type="submit" name="edit">Modifier</button></p>
    </form>
    <?php  endif;