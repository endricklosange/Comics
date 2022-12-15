<?php

?>
<!DOCTYPE html>

<html>

<head>
    <?php require_once('head.php') ?>
    <title>Ajout d'une série</title>
</head>

<body>
    <div class="row firstRow">
        <div class="col-md-2">
            <?php require_once('navbar.php'); ?>
        </div>
        <div class="col-md-10">
        <h2>Ajout d'une série</h2>
        <form action="/" method="post">
            <div class="form-group">
                <label for="title">Titre</label>
                <p><input class="form-control" type="text" name="title" id="title" placeholder="titre de la série"></p>
            </div>
            <div class="form-group">
                <label selected>Type</label>
                <select class="form-select" aria-label="Default select example" name="origin">
                    <option selected value="mangas">Manga</option>
                    <option value="Comics">Comics</option>
                </select>
            </div>
            <p><button type="submit" name="add" class="btn btn-primary my-2">Ajouter</button></p>
        </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>