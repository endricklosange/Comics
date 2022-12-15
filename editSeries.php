<?php
require_once('database.php');
require_once('series.php');

?>
<!DOCTYPE html>

<html>

<head>
    <?php require_once('head.php') ?>
    <title>series</title>
</head>

<body>

    <?php
    if (!empty($_POST) && isset($_POST['delete'])) {
        $d = new Serie($_POST['id']);
        $d->delete();

        header('Location: index.php');
        exit();
    }
    if (!empty($_GET['edit'])) :
        $o = new Serie($_GET['edit']); ?>
        <div class="row firstRow">
            <div class="col-md-2">
                <?php require_once('navbar.php'); ?>
            </div>
            <div class="col-md-10">
                <div class="container">
                    <h2>Modifier</h2>
                    <form action="/" method="post">
                        <input type='hidden' name='id' value='<?= $o->getId() ?>'>
                        <div class="form-group">
                            <label for="title">titre</label>
                            <p><input class="form-control" type="text" name="title" id="title" value="<?= $o->getTitle() ?>"></p>
                        </div>
                        <div class="form-group">
                            <label selected>Type</label>
                            <select class="form-select" aria-label="Default select example" name="origin">
                                <option selected value="mangas">Mangas</option>
                                <option value="Comics">Comics</option>
                            </select>
                        </div>
                        <p><button type="submit" name="edit" class="btn btn-primary my-2">modifier</button></p>
                    </form>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <p><button type="submit" class="btn btn-primary" name="delete">Delete</button></p>
                        <input type='hidden' name='id' value='<?= $o->getId() ?>'>
                    </form>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>