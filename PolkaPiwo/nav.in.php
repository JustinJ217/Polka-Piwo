<?php
include_once __DIR__ . '/config.php';
?>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?=$PAGE_ROOT?>main.php"><img src="<?=$PAGE_ROOT?>src/img/PolkaPiwo.png" width="120" height="60">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>

            <ul class="navbar-nav ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>#"></a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>main.php">Startseite</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>ueberuns.php">Über uns</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>shop.php">Shop</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>kontakt.php">Kontakt</a></li>
                <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="<?=$PAGE_ROOT?>login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>


