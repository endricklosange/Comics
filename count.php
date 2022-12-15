<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

$t = Serie::all();
?>
<!DOCTYPE html>

<html>

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
            <h1>Nombre total</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Serie</th>
                        <th scope="col">Album</th>
                        <th scope="col">Auteur</th>
                        <th scope="col">Planches</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= count($t = Serie::all()) ?></td>
                        <td><?= count($t = Books::allCount()) ?></td>
                        <td><?= count($t = Books::allWriter()) ?></td>
                        <td><?= count($t = Books::allStrips()) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>