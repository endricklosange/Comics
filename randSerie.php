<?php
require_once('database.php');
require_once('series.php');

$p = Serie::randSerie();

?>
<div class="row">
    <?php
    foreach ($p as $v) : ?>
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $v->getTitle() ?></h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <form action="/editSeries.php" method="get">
                        <input type='hidden' name='edit' value='<?= $v->getId() ?>'>
                        <p><button type="submit">Modifier</button></p>
                    </form>
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <p><button type="submit" name="delete">Delete</button></p>
                        <input type='hidden' name='id' value='<?= $v->getId() ?>'>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>