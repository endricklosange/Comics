<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

$t = Serie::all();
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
    <div class="container">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>