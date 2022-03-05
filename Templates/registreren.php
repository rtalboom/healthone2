<!DOCTYPE html>
<html>
<?php
include_once('defaults/head.php');
?>

<body>
    <div class="container" style="background-color:#fbf2d1">
        <?php
        include_once('defaults/header.php');
        include_once('defaults/menu.php');
        include_once('defaults/pictures.php');
        ?>
    <div style="width: 95%; margin: auto;">
        <h4 class="text-warning text-center">Registreren Sportcenter HealthOne</h4>
        <div class="container rounded">
        <form  method="post">
            <div class="form-group">
                <label class="text">Naam:</label>
                <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter name">
                <small class="text-warning">Voer uw volledige naam in.</small>
            </div>
            <div class="form-group">
                <label class="text">E-Mail address:</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small class="text-warning">Voer uw persoonlijke e-mail in.</small>
            </div>
            <div class="form-group">
                <label class="text">Wachtwoord:</label>
                <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
                <small class="text-warning">Maak een sterk wachtwoord van tenmiste 8 tekens.</small>
            </div>
            <button type="submit" name="verzenden" class="btn btn-warning text-light" >Submit</button>
        </form>
        <hr>
        </div>
    </div>
        <?php
        include_once('defaults/footer.php');
        ?>
    </div>
</body>

</html>