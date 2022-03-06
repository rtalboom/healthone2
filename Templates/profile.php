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
        <h2 class="text-warning">Welkom <?= $_SESSION['user']->name;?>!</h2>
        <div class="container rounded">
        <form  method="post" enctype="multipart/form-data">
<!--            profiel van de gebruiker-->
            <h5 class="text-warning">Profiel</h5>
            <div class="form-group">
                <img src="<?= $_SESSION['user']->image;?>" class="img-fluid rounded float-left" style= "height:50px" alt="Responsive image">
                <input type="file" name="profilepictureupload"><br>
                <small class="text-warning">Hier kunt u uw profielafbeelding wijzigen.</small>
            </div>
            <br>
<!--            profielfoto veranderen ^-->

<!--            naam en email veranderen-->
            <div class="form-group">
                <label class="text">Wijzig Naam:</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name" value="<?= $_SESSION['user']->name;?>">
                <small class="text-danger">Voer uw volledige naam in.</small>
            </div>
            <div class="form-group">
                <label class="text">Wijzig E-Mail address:</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?= $_SESSION['user']->email;?>">
                <small class="text-danger">Voer nieuwe e-mail in.</small>
            </div>
            <button type="submit" name="changeprofilebutton" class="btn btn-warning text-light" >Opslaan</button>
        </form>
            <hr>
<!--            wachtwoord veranderen-->
        <form  method="post">
            <h5 class="text-warning">Beveiliging</h5>
            <div class="form-group">
                <label class="text">Oud Wachtwoord:</label>
                <input type="password" class="form-control" name="oldpassword" placeholder="Wachtwoord">
                <small class="text-danger">Voer uw oude wachtwoord in.</small>
            </div>
            <div class="form-group">
                <label class="text">Nieuw Wachtwoord:</label>
                <input type="password" class="form-control" name="newpassword" placeholder="Wachtwoord">
                <small class="text-danger">* Maak een sterk wachtwoord van tenmiste 8 tekens.</small>
            </div>
            <button type="submit" name="changepasswordbutton" class="btn btn-warning text-light" >Opslaan</button><br><br>
        </form>
    </div>
    <hr>
<!--            de reviews die de gebruiker heeft geschreven-->
    <h2 class="text-warning">Uw reviews</h2>
        <?php
        $reviews = getUserReviews($_SESSION['user']->id);
        foreach ($reviews as $review) : ?>
            <div class="card-group">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $review->name; ?></a></h5>
                        <p class="card-text"><?= $review->review; ?></p>
                        <a><?php for ($x = 0; $review->stars > $x; $x++) {
                                echo "⭐";
                            }
                            ?></a>
                    </div>
                <div class="card-footer">
                    <small class="text-muted">Schreef U op <?= $review->postdate; ?></small>
                </div>
                </div>
            <br>
            </div>
        <?php endforeach; ?>
        <hr>
    </div>
        <?php
        include_once('defaults/footer.php');
        ?>
    </div>
</body>

</html>