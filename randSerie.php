<?php
require_once('database.php');
require_once('series.php');
require_once('books.php');

$p = Serie::randSerie();

?>
<!DOCTYPE html>

<html>

<head>
    <?php require_once('head.php') ?>
    <title>series</title>
</head>

<div class="row firstRow">
    <div class="col-md-2">
        <?php require_once('navbar.php'); ?>
    </div>
    <div class="col-md-10">
        <div class="container">
            <h1>Series</h1>
            <div class="row my-2">
                        <?php
                        $b = new Books($p->getId());
                        if (isset($b->all($p->getId())[0])) {
                            $book = $b->all($p->getId());
                        } else {
                        }
                        ?>
                        <div class="col-md-3">
                            <div class="customCard">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <?php if (isset($b->all($p->getId())[0])) { ?>
                                            <img src="/assets/uploads/<?= $book[0]->getCover(); ?>" class="card-img-top" alt="...">
                                        <?php } else { ?>
                                            <img src="/assets/img/no-image.jpg" class="card-img-top" alt="...">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="card-title"><?= $p->getTitle() ?> </h2>
                                        <h3 class="card-title"><?= $p->getOrigin() ?> </h3>
                                        <?php if (isset($b->all($p->getId())[0])) { ?>
                                            <h4 class="card-title">Scénario : <?= $book[0]->getWriter() ?> </h4>
                                        <?php } ?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>