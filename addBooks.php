<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');
if (!empty($_POST) && isset($_POST['shareId'])) {
    $seriesId = $_POST['id'];
}

if (isset($_GET['edit']) && empty($_GET['edit'])) {
    header('Location: index.php');
    exit();
}
if (!empty($_POST) && (isset($_POST['addBooks']))) {
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
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>series</title>
</head>

<body>
    <h2>Ajouter un Albums</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">titre</label>
            <p><input class="form-control" type="text" name="title" id="title" placeholder="Volume 1"></p>
        </div>

        <div class="form-group">
            <label for="title">Numéros</label>
            <p><input class="form-control" type="number" name="num" id="num" placeholder="1"></p>
        </div>
        <div class="form-group">
            <label for="writer">Scénario</label>
            <p><input class="form-control" type="text" name="writer" id="writer" placeholder="Watanabe, Tsunehiko"></p>
        </div>
        <div class="form-group">
            <label for="illustrator">Dessin</label>

            <p><input class="form-control" type="text" name="illustrator" id="illustrator" placeholder="Hinotsuki, Neko"></p>
        </div>
        <div class="form-group">
            <label for="editor">Editeur</label>
            <p><input class="form-control" type="text" name="editor" id="editor" placeholder="Delcourt"></p>
        </div>
        <div class="form-group">
            <label for="releaseyear">Année de création</label>
            <p><input class="form-control" type="text" name="releaseyear" id="releaseyear" placeholder="2019"></p>
        </div>
        <div class="form-group">
            <label for="strips">Planches </label>
            <p><input class="form-control" type="text" name="strips" id="strips" placeholder="164"></p>
        </div>
        <div class="form-group d-flex flex-column">
            <label for="cover" class="form-label">Image de couverture</label>
            <input type="file" name="avatar" id="cover" />
        </div>
        <input type='hidden' name='seriesId' value='<?= $seriesId ?>'>

        <p><button type="submit" name="addBooks">Ajouter</button></p>
    </form>

    <?php
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>