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

        $new->save($_POST['seriesId']);

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
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
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
        <div class="form-group">
            <label for="cover">Image de couverture</label>
            <p><input class="form-control" type="text" name="cover" id="cover" placeholder="Couv_366684.jpg"></p>
        </div>
        <div class="form-group">
            <label selected>Image principale de la série</label>
            <select class="form-select" aria-label="Default select example" name="rep">
                <option selected value="0">Non</option>
                <option value="1">Oui</option>
            </select>
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