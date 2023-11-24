<!DOCTYPE html>
<html data-bs-theme="dark" lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= "{$title} - App - {$subTitle}" ?></title>

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <?php if (isset($_SESSION['setting']['theme'])) { ?>
        <link rel="stylesheet" href="/assets/css/bs-theme-<?= $_SESSION['setting']['theme'] ?>.css">
    <?php }  ?>
    <link rel=" stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/<?= strtolower($subTitle) ?>.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-dark navbar-dark py-3">
        <div class="container-fluid">
            <button class="navbar-toggler" data-bs-toggle="offcanvas" type="button" data-bs-target="#offcanvas-menu" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="/">CodeWhizPalace</a>

            <!-- Dropdown User  -->
            <a id="navbarDropdownMenuLink" class="d-flex align-items-center nav-link me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <!-- <i class="fa-regular fa-user"></i> -->
                <!-- <img class="rounded-circle d-none" src height="22" alt="Avatar" /> -->
                <img class="rounded-circle" alt="avatar" width="32" height="32" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" style="object-fit: cover;" />
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <span class="dropdown-item disabled"><?= $_SESSION['profile']['pseudo'] != null ? 'Welcome ' . $_SESSION['profile']['pseudo'] : 'Welcome User' ?></span>
                </li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item" href="/app/profile">My profile</a></li>
                <li><a class="dropdown-item" href="/app/setting">Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/app/signout">Logout</a></li>
            </ul>

        </div>
    </nav>

    <!-- Sidebar -->
    <div id="offcanvas-menu" class="offcanvas offcanvas-start bg-body visible" tabindex="-1" data-bs-keyboard="false">
        <div class="offcanvas-header">
            <a class="link-body-emphasis d-flex align-items-center me-md-auto mb-3 mb-md-0 text-decoration-none" href="/">
                <span class="fs-4">Home</span>
            </a>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between pt-0">
            <div>
                <hr class="mt-0">
                <ul class="nav nav-pills flex-column mb-auto">
                    <?php

                    use App\Config\Tabs;

                    foreach ($mTabs as $key => $mTab) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?= $subTitle == $mTab ? 'active link-light' : 'link-body-emphasis' ?>" href="/app/<?= strtolower($mTab) ?>">
                                <div class="row">
                                    <div class="col-2 d-flex justify-content-center align-items-center"><i class="<?= Tabs::ICON_TAB[$key] ?>"></i></div>
                                    <div class="col-10"><?= $mTab ?></div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>