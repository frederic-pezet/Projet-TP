<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/projetTP.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/83afadab1c.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<header>
    <img src="assets/img/foot.jpg " alt="photofoot">
</header>
<nav class="navbar sticky-top  navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">FOOTLIF'</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="usersList.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tournament.php">Tournoi</a>
                </li>
                <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="team.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Equipes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="teamComposition.php">Composition de l'équipe</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <?php if (!isset($_SESSION['username'])) {

                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Connexion</a>
                    </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-3" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light me-3" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="signin.php">Inscription</a>
                </li>

            </ul>
        <?php } else { ?>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="controllers/logoutController.php">Déconnexion</a>
                </li>

            </ul>
        <?php } ?>
        </div>
    </div>
    </div>
</nav>

<body>