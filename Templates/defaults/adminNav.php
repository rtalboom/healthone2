<nav class="navbar navbar-expand-lg navbar-light bg-light rounded" style="background-color:#fdfaec">
    <div class="container-fluid">
        <a class="navbar-brand" href="../admin/machines">
            Admin Panel
        </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


        <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../admin\machines">Sportapparaten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="../admin\users">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin\messages">Berichten</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <img src="<?=$_SESSION['user']->image; ?>" class="img-fluid rounded float-left" style= "height:50px" alt="Responsive image">
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item">
                    <a class="nav-link" href="/profile">Profiel</a>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item">
                    <a class="nav-link" href="../logout">Uitloggen</a>
                </li>
            </ul>
        </div>
    </div>
</nav>