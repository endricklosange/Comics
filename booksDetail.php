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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Detail</title>
</head>

<body>
    <?php require_once('navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                    <img src="<?= $books->getCover() ?>" class="card-img-top" alt="...">
                </div>
            <div class="col-md-8">
            <h1 >Titre : <?= $books->getTitle() ?></h1>
            <p >Scénario : <?= $books->getWriter() ?></p>
            <p >Dessin : <?= $books->getIllustrator() ?></p>
            <p >Editeur : <?= $books->getEditor() ?></p>
            <p >Planches : <?= $books->getStrips() ?></p>
            <p >Créé le : <?= $books->getReleaseyear() ?></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>