<?php
logout();
$_SESSION["isLoggedIn"] = false;
?>

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
        <h3 class="text-warning">U bent nu uitgelogd.</h3>
        <a class="text-black" href="/home">
            Klik hier om terug te gaan naar de home pagina.
        </a>
        <hr>

        <?php
        include_once('defaults/footer.php');
        ?>
    </div>
</body>

</html>