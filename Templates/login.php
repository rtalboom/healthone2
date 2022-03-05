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
        <div style="width: 95%; margin: auto; ">
            <h4 class="text-warning">Healthone Member Portaal</h4>
            <?=$message?>
            <div class="container rounded">
                <form  method="post">
                    <div class="form-group">
                        <label class="text">E-mail address:</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <small class="text-warning">Voer de e-mail in waarmee u gerigstreerd heeft.</small>
                    </div>
                    <div class="form-group">
                        <label class="text">Wachtwoord:</label>
                        <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
                        <small class="text-warning">Voer de wachtwoord in waarmee u gerigstreerd heeft.</small>
                    </div>
                    <br>
                    <button type="submit" name="login" class="btn btn-warning text-light" >Submit</button>
                    <br><br>
                </form>
            </div>
        </div>
        <hr>
        <?php
        include_once('defaults/footer.php');
        ?>
    </div>
</body>

</html>