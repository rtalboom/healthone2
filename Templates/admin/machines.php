<!DOCTYPE html>
<html>
<?php
include_once('../Templates\defaults\head.php');
?>

<body>
    <div class="container" style="background-color:#fbf2d1">
        <?php
        include_once('../Templates/defaults/header.php');
        include_once('../Templates/defaults/adminNav.php');
        include_once('../Templates/defaults/pictures.php');
        global $products;
        ?>
        <h3 class="text-warning">Machine Control Center</h3>
        <div class="row gy-4" style="width: 95%; margin: auto;" >
        <?=$message?>
        <div class="container rounded col-auto" style="width: 49%">
            <h4 class="text-center">Machine toevoegen</h4>
            <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label class="text-warning">Machine Naam</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Enter Name">
                    <small>Voer hier de machine naam in.</small>
                </div>
                <div class="form-group">
                    <label class="text-warning">Machine Beschrijving</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter Description">
                    <small>Voer beschrijving die u bij deze Machine wilt tonen in.</small>
                </div>
                <div class="form-group">
                    <label class="text-warning">Machine Categorie</label>
                    <input type="number" class="form-control" name="categoryid" placeholder="Enter Category">
                    <small>Type hier de categorie nummer in.</small>
                    <?php
                    for ($total = 0; $total > $categories; $total++) {
                    echo "<option value=$total>" . $total . "</option>";
                    }
                ?>
                </div>
                <div class="form-group">
                    <label class="text-warning">Machine Afbeelding</label><br>
                    <input type="file" name="machineimageupload"><br>
                    <small>Upload de afbeelding die u bij deze product wilt laten tonen.</small>
                </div><br>
                <button type="submit" name="addmachinebutton" class="btn btn-success" >Submit</button>
            </form>
            <br>
        </div>

        <div class="container rounded col-auto" style="width: 49%">
            <h4 class="text-center">Categorie toevoegen</h4>
            <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                    <label class="text-warning">Categorie Naam</label>
                    <input type="text" class="form-control" name="categoryName" placeholder="Enter Name">
                    <small>Voer hier de titel van de product in.</small>
                </div>
                <div class="form-group">
                    <label class="text-warning">Categorie Beschrijving</label>
                    <input type="text" class="form-control" name="categoryDescription" placeholder="Enter Description">
                    <small>Voer beschrijving die u bij deze Categorie wilt tonen in.</small>
                </div>
                <div class="form-group">
                    <label class="text-warning">Categorie Afbeelding</label><br>
                    <input type="file" name="categoryimageupload"><br>
                    <small>Upload de afbeelding die u bij deze product wilt laten tonen.</small>
                </div><br>
                <button type="submit" name="addcategorybutton" class="btn btn-success" >Submit</button>
            </form>
        </div>

            
            <?php foreach ($products as $product) : ?>
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-auto" style="width: 20rem">
                        <img src="<?=$product->image;?>" class="img-fluid" alt="product_image">
                    </div>
                    <div class="col">
                        <div class="card-block px-2">
                            <h4 class="card-title"><?=$product->name;?></h4>
                            <p class="card-text"><?=$product->description;?></p>
                            <form method="post">  
                                <input type="hidden" name="productId" value="<?=$product->id;?>">
                                <a href="../admin/edit/?productId=<?= $product->id; ?>" name="edit" class="m-1 pb-2 btn btn-warning">Edit</a>
                                <button type="submit" name="delete" class="m-1 pb-2 btn btn-danger">Delete</a>
                             </form>
                        </div>
                    </div>
                </div>
                <div class="card-footer w-100 text-muted">
                    <?=$product->category;?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <hr>
        <?php
        include_once('../Templates/defaults/footer.php');
        ?>
    </div>
</body>

</html>