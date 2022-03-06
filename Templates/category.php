<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
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
                <li class="breadcrumb-item"><a class="text-black" href="/category/<?= $categoryId ?>"><?= $category ?></a></li>
            </ol>
        </nav>
<!--        hier worden alle sport apparaten weergegeven -->
        <h3 class="text-warning">Apparaten</h3>
        <div class="row gy-4" style="width: 95%; margin: auto;">
            <?php global $products; ?>
            <?php global $category_id; ?>
            <?php foreach ($products as $product) : ?>
                <div class="col-sm-6 col-md-6">
                    <div class="card" style="width: 35rem; height: 35rem">
                        <div class="card-body text-center">
                            <div class="card-title mb-3">
                                <?= $product->name; ?>
                            </div>
                            <div>
                                <a href="/machine/<?= $product->id ?>">
                                    <img class="product-img img-responsive center-block" src='<?= $product->image ?>' />
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