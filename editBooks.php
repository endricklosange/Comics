<?php 
require_once('database.php');
require_once('books.php');


if (!empty($_POST) && (isset($_POST['edit']))) {
    $new = new Books($_POST);
 
    $uploadDir = 'assets/uploads/';
    // le nom de fichier sur le serveur est celui du nom d'origine du fichier sur le poste du client (mais d'autres stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);

    // on déplace le fichier temporaire vers le nouvel emplacement sur le serveur. Ça y est, le fichier est uploadé
    move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
    if (empty($_FILES['avatar']['name'])) {
        $new->save($_POST['seriesId'],'no-image.jpg',0);
    }else {
        $new->save($_POST['seriesId'],$_FILES['avatar']['name'],1);
    }

    header('Location: index.php');
    exit();
}
?>

<h1>Series</h1>

    <?php
    if (!empty($_GET['edit'])) :
        $o = new Books($_GET['edit']); ?>
        <h2>Modifier</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
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
        <div class="form-group d-flex flex-column">
            <label for="cover" class="form-label">Image de couverture</label>
            <input type="file" name="avatar" id="cover" />
        </div>
        <input type='hidden' name='seriesId' value='<?= $o->getSerie_id()?>'>

        <p><button type="submit" name="edit">Modifier</button></p>
    </form>
    <?php  endif;