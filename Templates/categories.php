<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
global $categories;
?>

<body>

    <div class="container" style="background-color:#fbf2d1">
        <?php
        include_once('defaults/header.php');
        include_once('defaults/navbar.php');
        include_once('defaults/pictures.php');

        ?>
    <div style="width: 95%; margin: auto;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/home">Home</a></li>
                <li class="breadcrumb-item"><a class="text-black" href="/categories">Categories</a></li>
            </ol>
        </nav>
<!--        hier worden de 4 categorien weergegeven-->
        <h3 class="text-warning">Categoriën</h3>
        <div class="row gy-4">
            <?php foreach ($categories as $category) : ?>
                <div class="col-sm-4 col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-title mb-3">
                                <?= $category->name; ?>
                            </div>
                            <div>
                                <a href="/category/<?= $category->id ?>">
                                    <img class="product-img img-responsive center-block" src='<?= $category->image ?>' />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <hr>
    </div>
        <?php
        include_once('defaults/footer.php');
        ?>
    </div>

</body>

</html>