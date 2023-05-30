<?php
if (empty($_SESSION["id_user"])) { ?>
    <nav class="navbar bg-body-tertiary fixed-top sticky-top shadow">
        <div class="container">
            <img src="asset/img/cookpad_logo.png" alt="" height="40">

            <div class="input-group-append">
                <form style="width: 700px;" class="container-fluid">
                    <div class="input-group">
                        <input type="search" class="form-control" placeholder="Ketik Bahan - Bahan ...">
                    </div>
                </form>
            </div>

            <button class="btn btn-cookpad" type="button">
                Dapatkan App
            </button>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Side Navbar Bro -->
            <div class="offcanvas offcanvas-end" id="offcanvasNavbar">

                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>

                <div class="offcanvas-body">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Cari</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Bagikan Ide Masak</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Premium</a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Masuk</a>
                        </li>
                    </ul>

                </div>
                <img src="asset/img/sidenavbar.svg" alt="">
                <footer style="background-color: #E25727;">
                    <br>
                    <p class="text-center text-white"><b>Dapatkan aplikasinya, gratis!</b></p>
                    <div class="row text-center">
                        <div class="col">
                            <img src="asset/img/appstore.svg" alt="">
                        </div>
                        <div class="col">
                            <img src="asset/img/playstore.svg" alt="">
                        </div>
                    </div>
                    <br>
                </footer>

            </div>
        </div>
        </div>
    </nav>
<?php } else { ?>
    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="asset/img/cookpad_logo.png" alt="" height="40"></a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <?php var_dump($_SESSION) ?>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img class="img-nav" src="asset/img/beranda.png" alt=""
                                height="20">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#search_section"><img class="img-nav" src="asset/img/cari.png" alt=""
                                height="20">Cari</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=buat"><img class="img-nav" src="asset/img/tambah.png" alt=""
                                height="20">Buat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=aktivitas"><img class="img-nav" src="asset/img/aktivitas.png"
                                alt="" height="20">Aktivitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?p=profil"><img class="img-nav" src="asset/img/profil.png" alt=""
                                height="20">Profil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>