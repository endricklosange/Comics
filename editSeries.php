<?php
require_once('database.php');
require_once('series.php');

?>

<h1>Series</h1>

<?php
if (!empty($_POST) && isset($_POST['delete'])) {
    $d = new Serie($_POST['id']);
    $d->delete();

    header('Location: index.php');
    exit();
}
if (!empty($_GET['edit'])) :
    $o = new Serie($_GET['edit']); ?>
    <h2>Modifier</h2>
    <form action="/" method="post">
        <input type='hidden' name='id' value='<?= $o->getId() ?>'>
        <p><input type='text' name="title" placeholder="titre de la série" required value="<?= $o->getTitle() ?>"></p>
        <p><input type='text' name="origin" placeholder="origine(bd/manga/comics)" value="<?= $o->getOrigin() ?>"></p>
        <p><button type="submit" name="edit">modifier</button></p>
    </form>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p><button type="submit" class="btn btn-primary" name="delete">Delete</button></p>
        <input type='hidden' name='id' value='<?= $o->getId() ?>'>
    </form>
    </div>
<?php endif;
