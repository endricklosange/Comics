<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

if (!empty($_POST) && isset($_POST['detail'])) {
    $s = new Serie($_POST['id']);
    $b = new Books($_POST['id']);
    $series = $s->detail($_POST['id'])[0];
    $allBooks = $b->all($_POST['id']);
}else if (!empty($_POST) && isset($_POST['delete'])) {
    $d = new Books($_POST['id']);
    $d->delete();

    header('Location: index.php');
    exit();
} 
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Detail <?= $series->getTitle() ?></title>
</head>

<body>

    <?php require_once('navbar.php'); ?>
    <div class="container">
        <div class="row">
            <form action="addBooks.php" method="post">
                <p><button type="submit" name="shareId">Ajouter un Albums</button></p>
                <input type='hidden' name='id' value='<?= $_POST['id'] ?>'>
            </form>
            <h1><?= $series->getTitle() ?></h1>
            <h2><?= $series->getOrigin() ?></h2>
        </div>
        <div class="row">
            <?php foreach ($allBooks as $books) { ?>
                <div class="col-md-4">
                    <div class="card my-2">
                        <img src="/assets/uploads/<?= $books->getCover() ?>" class="card-img-top" alt="..." width="50%" height="50%">
                        <div class="card-body">
                            <h5 class="card-title"><?= $books->getTitle() ?></h5>
                            <form action="/editBooks.php" method="get">
                            <input type='hidden' name='edit' value='<?= $books->getId() ?>'>
                            <p><button type="submit">Modifier</button></p>
                        </form>
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                                <p><button type="submit" name="delete">Delete</button></p>
                                <input type='hidden' name='id' value='<?= $books->getId() ?>'>
                            </form>
                        </form>
                            <form action="/booksDetail.php" method="post">
                                <p><button type="submit" name="detail">Voir plus</button></p>
                                <input type='hidden' name='id' value='<?= $books->getId() ?>'>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>