<?php

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
    <h2>Ajout d'une série</h2>
    <form action="/" method="post">
        <div class="form-group">
            <label for="title">titre</label>
            <p><input class="form-control" type="text" name="title" id="title" placeholder="titre de la série"></p>
        </div>
        <div class="form-group">
            <label selected>Image principale de la série</label>
            <select class="form-select" aria-label="Default select example" name="origin">
                <option selected value="mangas">Manga</option>
                <option value="Comics">Comics</option>
            </select>
        </div>
        <p><button type="submit" name="add">Ajouter</button></p>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>