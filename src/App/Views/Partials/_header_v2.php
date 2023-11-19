<!DOCTYPE html>
<html data-bs-theme="dark" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title) ?> - <?= e($subTitle ?? '') ?> </title>

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-expand-md sticky-top bg-dark bg-opacity-75 py-1" data-bs-theme="dark">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/">
                <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                    <i class="fa-solid fa-infinity"></i>
                </span><span>CodeWhizPalace</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-5"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-5">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link active" href="#">Apps</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Docs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <div class="btn-group focus-ring d-flex d-sm-flex d-md-inline-flex flex-column flex-md-row" role="group">
                    <?php if (isset($_SESSION['account'])) { ?>
                        <a class="btn btn-outline-primary border rounded-0 ms-md-2" role="button" href="/app">App</a>
                        <a class="btn btn-primary ms-md-2" role="button" href="/app/signout">Déconnexion</a>
                    <?php } else { ?>
                        <a class="btn btn-outline-primary border rounded-0 ms-md-2" role="button" href="/signin">S'identifier</a>
                        <a class="btn btn-primary ms-md-2" role="button" href="/signup">S'inscrire</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>