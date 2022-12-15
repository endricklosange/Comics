<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

if (!empty($_POST) && isset($_POST['detail'])) {
    $b = new Books($_POST['id']);
    $books = $b->detail($_POST['id'])[0];
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
                    <div class="col-md-4">
                        <img src="/assets/uploads/<?= $books->getCover() ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                        <h1>Titre : <?= $books->getTitle() ?></h1>
                        <p>Scénario : <?= $books->getWriter() ?></p>
                        <p>Dessin : <?= $books->getIllustrator() ?></p>
                        <p>Editeur : <?= $books->getEditor() ?></p>
                        <p>Planches : <?= $books->getStrips() ?></p>
                        <p>Créé le : <?= $books->getReleaseyear() ?></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>