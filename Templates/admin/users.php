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
        global $users;
        ?>

        <h3 class="text-warning">User Control Center</h3>
        <div class="row gy-4" style="width: 95%; margin: auto;">
            <?php foreach ($users as $user) : ?>
            <div class="card">
                <div class="row no-gutters">
                    <div class="col-auto" style="width: 10rem"><br>
                        <img src="<?=$user->image;?>" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col"><br>
                        <div class="card-block px-2">
                            <h4 class="card-title"><?=$user->name;?></h4>
                            <p class="card-text"><?=$user->email;?></p>
                            <form method="post">  
                                <input type="hidden" name="userId" value="<?=$user->id;?>">
                                <a href="../profile" name="edit" class="btn btn-warning">Edit</a>
                                <button type="submit" name="delete" class="btn btn-danger">Delete</a>
                             </form>
                        </div>
                    </div>
                </div>
                <br>
                <div class="card-footer w-100 text-muted">
                    <?=$user->id;?>
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