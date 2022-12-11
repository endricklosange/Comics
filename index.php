<?php
require_once('database.php');
require_once('series.php');
require_once('Books.php');



if (!empty($_POST) && (isset($_POST['add']) || isset($_POST['edit']))) {
    $new = new Serie($_POST);
    if ($new->isValid())
        $new->save();
    else
        var_dump('planté ! ');

    header('Location: index.php');
    exit();
} else if (!empty($_POST) && isset($_POST['delete'])) {
    $d = new Serie($_POST['id']);
    $d->delete();

    header('Location: index.php');
    exit();
}

if (isset($_GET['edit']) && empty($_GET['edit'])) {
    header('Location: index.php');
    exit();
}
if (!empty($_POST) && (isset($_POST['addBooks']))) {
    $new = new Books($_POST);
    if ($new->isValid())
        $new->save();
    else
        var_dump('planté ! ');

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
    <h1>Series</h1>
    <?php
    if (!empty($_GET['edit'])) :
        $o = new Serie($_GET['edit']); ?>
        <h2>Modifier</h2>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <input type='hidden' name='id' value='<?= $o->getId() ?>'>
            <p><input type='text' name="title" placeholder="titre de la série" required value="<?= $o->getTitle() ?>"></p>
            <p><input type='text' name="origin" placeholder="origine(bd/manga/comics)" value="<?= $o->getOrigin() ?>"></p>
            <p><button type="submit" name="edit">modifier</button></p>
        </form>

    <?php endif;
    $t = Serie::all();
    ?>
    <table>
        <thead>
            <tr>
                <th>Nom</th>

                <th>Origine</th>
                <th>Meta-datas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($t as $v) : ?>

                <tr>
                    <td><?= $v->getTitle() ?></td>
                    <td><?= $v->getOrigin() ?>
                    </td>
                    <td><?= $v->getId() ?><br />
                        <?= $v->getCreated() ?><br />
                        <?= $v->getUpdated() ?></td>
                    <td>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                            <p><button type="submit" name="delete">Delete</button></p>
                            <input type='hidden' name='id' value='<?= $v->getId() ?>'>
                        </form>
                        <a href="<?= $_SERVER['PHP_SELF'] ?>?edit=<?= $v->getId() ?>">Modifier </a>
                    </td>

                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <h2>Ajout d'une série</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><input type="text" name="title" placeholder="titre de la série " required></p>
        <p><input type="text" name="origin" placeholder="origine(bd/comics/manga)"></p>
        <p><button type="submit" name="add">Ajouter</button></p>
    </form>
    <h2>Ajouter un Albums</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <select class="form-select" aria-label="Default select example" name="serie_id">
            <?php foreach ($t as $v) : ?>
                <option value="<?= $v->getId() ?>"><?= $v->getTitle() ?></option>
            <?php endforeach; ?>
        </select>
        <p><input type="text" name="title" placeholder="Volume 1"></p>
        <p><input type="number" name="num" placeholder="1"></p>
        <p><input type="text" name="writer" placeholder="Watanabe, Tsunehiko"></p>
        <p><input type="text" name="illustrator" placeholder="Hinotsuki, Neko"></p>
        <p><input type="text" name="editor" placeholder="Delcourt"></p>
        <p><input type="text" name="releaseyear" placeholder="2019"></p>
        <p><input type="text" name="strips" placeholder="164"></p>
        <p><input type="text" name="cover" placeholder="Couv_366684.jpg"></p>
        <select class="form-select" aria-label="Default select example" name="rep">
            <option selected>Image de couverture</option>
            <option value="0">Non</option>
            <option value="1">Oui</option>
        </select>
        <p><button type="submit" name="addBooks">Ajouter</button></p>
    </form>

    <?php $books = Books::all();
    foreach ($books as $book) {
        //var_dump($book);
    }
    ?>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>