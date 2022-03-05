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
        <h2 class="text-warning">Onze contact gegevens:</h2>
        <p class="text-black">
            Telefoon nummer : 0152578924 <br>
            Adres : zuidhoornseweg 6a, 2635DJ Den Hoorn <br>
            E-Mail : info@healthone.com
        </p>
        <hr>
        <h4 class="text-warning">Contact opnemen</h4>
        <div class="container rounded">
            <form method="post">
                <div class="form-group">
                    <label class="text" for="email">E-Mail address:</label>
                    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Hier invoeren">
                </div>
                <br>
                <div class="form-group">
                    <label class="text" for="message">Bericht:</label>
                    <input type="text" class="form-control" name="message" placeholder="Hier invoeren">
                </div>
                <br>
                <button type="submit" name="verzenden" class="btn btn-warning text-light">Submit</button>
                <br><br>
            </form>
        </div>
        <hr>
        <br>
    </div>
            <?php
            include_once('defaults/footer.php');
            ?>
    </div>

</body>

</html>