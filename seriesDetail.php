<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

if (!empty($_POST) && isset($_POST['detail'])) {
    $s = new Serie($_POST['id']);
    $b = new Books($_POST['id']);
    $series = $s->detail($_POST['id'])[0];
    $allBooks = $b->all($_POST['id']);
} 
?>

<head>
    <?php require_once('head.php') ?>
    <title>series</title>
</head>

<body>
    <div class="row firstRow">
        <div class="col-md-2">
            <?php require_once('navbar.php'); ?>
        </div>
        <div class="col-md-10">
            <div class="container">
                <div class="row">

                    <h1><?= $series->getTitle() ?></h1>
                    <h2><?= $series->getOrigin() ?></h2>
                </div>
                <form action="addBooks.php" method="post">
                    <p><button type="submit" name="shareId" class="btn btn-primary">Ajouter un Albums</button></p>
                    <input type='hidden' name='id' value='<?= $_POST['id'] ?>'>
                </form>
                <div class="row">
                    <?php foreach ($allBooks as $books) { ?>
                        <div class="col-md-3">
                            <div class="customCard">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <img src="/assets/uploads/<?= $books->getCover() ?>" class="card-img-top" alt="..." width="50%" height="50%">
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="card-title"><?= $books->getTitle() ?> </h2>
                                            <h4 class="card-title">Scénario : <?= $books->getWriter() ?> </h4>
                                        <div class="row">
                                            <div class="col-6">
                                                <form action="/editBooks.php" method="get">
                                                    <input type='hidden' name='edit' value='<?= $books->getId() ?>'>
                                                    <p><button type="submit" class="btn btn-outline-primary">Editer</button></p>
                                                </form>
                                            </div>
                                            <div class="col-6">
                                                <form action="/booksDetail.php" method="post">
                                                    <p><button type="submit" class="btn btn-primary" name="detail">Détails</button></p>
                                                    <input type='hidden' name='id' value='<?= $books->getId() ?>'>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>