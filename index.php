<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');
?>
<?php
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
} else if (!empty($_POST) && isset($_POST['detail'])) {
    $d = new Serie($_POST['id']);
    $d->detail();
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
    <?php require_once('navbar.php'); ?>

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
    <div class="container">

        <form action="/search.php" method="post">
            <div class="form-group d-flex">
                <p><input class="form-control" type="text" name="title" id="text" placeholder="Volume 1"></p>
                <p><button type="submit" name="search">Go</button></p>
            </div>
        </form>
        <a href="/addSeries.php">Ajouter une série</a>
        <div class="row">
            <?php
            foreach ($t as $v) : ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $v->getTitle() ?></h5>
                            <form action="/editSeries.php" method="get">
                                <input type='hidden' name='edit' value='<?= $v->getId() ?>'>
                                <p><button type="submit">Modifier</button></p>
                            </form>
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <p><button type="submit" name="delete">Delete</button></p>
                                <input type='hidden' name='id' value='<?= $v->getId() ?>'>
                            </form>
                            <form action="/seriesDetail.php" method="post">
                                <p><button type="submit" name="detail">Voir plus</button></p>
                                <input type='hidden' name='id' value='<?= $v->getId() ?>'>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>