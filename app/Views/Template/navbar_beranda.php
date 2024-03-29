<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/navbar.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<?php
 ?>

<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
            <div class="container-fluid" style="background-color: rgba(255, 72, 0, 75);"> 
                <img src ="<?= base_url(); ?>/image/logo.png">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/beranda" class="active">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/unggah">Unggah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="/profile/<?= session('user_id') ?>">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="/">Logout</a>
                        </li>
                    </ul>
                    <form action="/search" method="post" class="d-flex" role="search">
                        <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <?= $this->renderSection('content');?>
</body>

</html>