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
    <?php require_once('head.php') ?>
    <title>series</title>
</head>

<body>
    <?php
    $t = Serie::all();
    ?>
    <div class="row firstRow">
        <div class="col-md-2">
            <?php require_once('navbar.php'); ?>
        </div>
        <div class="col-md-10">
            <div class="container">
                <h1>Series</h1>
                <form action="/search.php" method="post">
                    <div class="form-group d-flex">
                        <p><input class="form-control" type="text" name="title" id="text" placeholder="Bleach"></p>
                        <p><button type="submit" class="btn btn-primary" name="search">Go</button></p>
                    </div>
                </form>
                <a href="/addSeries.php">Ajouter une série</a>
                <div class="row my-2">
                    <?php
                    foreach ($t as $v) : ?>
                        <?php
                        $b = new Books($v->getId());
                        if (isset($b->all($v->getId())[0])) {
                            $book = $b->all($v->getId());
                        } else {
                        }
                        ?>
                        <div class="col-md-3 my-2">
                            <div class="customCard">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <?php if (isset($b->all($v->getId())[0])) { ?>
                                            <img src="/assets/uploads/<?= $book[0]->getCover(); ?>" class="card-img-top" alt="...">
                                        <?php } else { ?>
                                            <img src="/assets/img/no-image.jpg" class="card-img-top" alt="...">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="card-title"><?= $v->getTitle() ?> </h2>
                                        <h3 class="card-title"><?= $v->getOrigin() ?> </h3>
                                        <?php if (isset($b->all($v->getId())[0])) { ?>
                                            <h4 class="card-title">Scénario : <?= $book[0]->getWriter() ?> </h4>
                                        <?php } ?>
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="/editSeries.php" method="get">
                                                    <input type='hidden' name='edit' value='<?= $v->getId() ?>'>
                                                    <p><button type="submit" class="btn btn-outline-primary">Editer</button></p>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <form action="/seriesDetail.php" method="post">
                                                    <p><button type="submit" class="btn btn-primary" name="detail">Détails</button></p>
                                                    <input type='hidden' name='id' value='<?= $v->getId() ?>'>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>