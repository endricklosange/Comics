<?php
require_once('database.php');
require_once('series.php');


if(!empty($_POST) && (isset($_POST['add']) || isset($_POST['edit']))){
    $new = new Serie($_POST);
    if($new->isValid())
    $new->save();
    else
   var_dump('planté ! ');
 //  PersonalVarDump($new);

    header('Location: index.php');
    exit();
} else if (!empty($_POST) && isset($_POST['delete'])){
    $d = new Serie($_POST['id']);
    $d->delete();
   // PersonalVarDump($new);

    header('Location: index.php');
    exit();
} 

if(isset($_GET['edit']) && empty($_GET['edit'])){
    header('Location: index.php');
    exit();
}

function personalVarDump($x)
{
    print '<pre>';
    var_dump($x);
    print '</pre>';
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>series</title>
</head>

<body>
    <h1>Series</h1>
    <?php
if(!empty($_GET['edit'])):
    $o = new Serie($_GET['edit']); ?>
    <h2>Modifier</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type='hidden' name='id' value='<?= $o->getId() ?>'>
    <p><input type='text' name="title" placeholder="titre de la série" required value="<?= $o->getTitle() ?>"></p>
    <p><input type='text' name="origin" placeholder="origine(bd/manga/comics)" value="<?= $o->getOrigin() ?>"></p>
    <p><button type="submit" name="edit">modifier</button></p>
    </form>

<?php endif;
  $t =Serie::all();
    ?>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
             
                <th>Origine</th>
                <th>Meta-datas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($t as $v): ?>
<tr>
    <td><?= $v->getTitle() ?></td>
    <td><?= $v->getOrigin() ?>
</td>
    <td><?= $v->getId() ?><br />
    <?= $v->getCreated() ?><br/>
    <?= $v->getUpdated() ?></td>
    <td>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <p><button type ="submit" name="delete">Delete</button></p>
    <input type='hidden' name='id' value='<?= $v->getId() ?>'>
    </form>
    <a href="<?= $_SERVER['PHP_SELF'] ?>?edit=<?= $v->getId() ?>">Modifier </a>
</td>

</tr>
        <?php endforeach; ?>    

        </tbody>
    </table>
    <h2>Ajout d'une série</h2>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<p><input type="text" name="title" placeholder="titre de la série " required></p>
<p><input type="text" name="origin" placeholder="origine(bd/comics/manga)"></p>
<p><button type ="submit" name="add">Ajouter</button></p>

    </form>
</body>

</html>