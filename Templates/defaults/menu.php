<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" style="background-color: #fdfaec">
    <div class="container-fluid" >
        <a class="navbar-brand" href="/home">
            Sportcenter
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="myNavbar" >
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/categories">Sportapparaten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="/registreren">Registreren</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
            </ul>
            <?php
            if (!$_SESSION["isLoggedIn"]){
                echo '
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Inloggen</a>
                    </li>
                </ul>';
            } else {
                echo '
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <img src="'; echo $_SESSION['user']->image; echo'" class="img-fluid rounded float-left" style= "height:50px" alt="Responsive image">
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="../profile">Profiel</a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Uitloggen</a>
                    </li>
                </ul>';
            }
            ?>
            
        </div>
    </div>
</nav>