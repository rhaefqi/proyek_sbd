<?php
if (empty($_SESSION["id_user"])) { ?>
    <nav class="navbar bg-body-tertiary fixed-top sticky-top shadow">
        <div class="container">
            <img src="asset/img/cookpad_logo.png" alt="" height="40">

            <div class="input-group-append">
                <form style="width: 700px;" class="container-fluid">
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
                            <a class="nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Daftar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Masuk</a>
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
                        <?php var_dump($_SESSION["id_user"]) ?>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><img class="img-nav" src="asset/img/beranda.png" alt=""
                                height="20">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#search_section"><img class="img-nav" src="asset/img/cari.png"
                                alt="" height="20">Cari</a>
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
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><img class="img-nav" src="asset/img/logout.png" alt=""
                                height="20">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>


<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">MASUK DENGAN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-primary w-100"><img src="asset/img/facebook.png" width="5%"
                            alt=""> Masuk dengan Facebook</button>
                </div>
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-light w-100"><img src="asset/img/google.png" width="4%" alt="">
                        Masuk dengan Google</button>
                </div>
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-dark w-100"><img src="asset/img/apple.png" width="5%" alt="">
                        Masuk dengan Apple</button>
                </div>
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-light w-100 shadow" data-bs-target="#exampleModalToggle3"
                        data-bs-toggle="modal">Daftar</button>
                </div>
                <small>
                    <p class="text-center">-atau-</p>
                </small>
                <div style="margin-bottom: 10px;">
                    <button type="button" class="btn btn-cookpad w-100" data-bs-target="#exampleModalToggle2"
                        data-bs-toggle="modal">Login</button>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


<?php
require_once "function.php";
if (isset($_POST["submit"])) {
    login($_POST);
}
?>

<!-- MODAL LOGIN-->
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn" style="width: 10%;" data-bs-dismiss="modal" data-bs-toggle="modal"
                    data-bs-target="#exampleModalToggle"><img src="asset/img/before.png" width="90%" alt=""></button>
                <h5 class="modal-title" id="exampleModalToggleLabel2">MASUK</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><b>Masuk</b></h3>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">@</span>
                        <input type="email" name="Email" class="form-control" placeholder="email" aria-label="email"
                            aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon2">*</span>
                        <input type="password" name="Password" class="form-control" placeholder="Password"
                            aria-label="Password" aria-describedby="basic-addon2">
                    </div>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-cookpad">Masuk</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#">Lupa Kata Sandi?</a>
            </div>
        </div>
    </div>
</div>

<?php
require_once("function.php");
if (isset($_POST["btnregister"])) {
    register($_POST);
}
?>
<!-- MODAL DAFTAR -->
<div class="modal fade" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button class="btn" style="width: 10%;" data-bs-dismiss="modal" data-bs-toggle="modal"
                    data-bs-target="#exampleModalToggle"><img src="asset/img/before.png" width="90%" alt=""></button>
                <h5 class="modal-title" id="exampleModalToggleLabel3">DAFTAR</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3 class="text-center"><b>Daftar</b></h3>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="Name" class="form-control" placeholder="Nama Pengguna (Dapat Dilihat Publik)"
                            aria-label="name" aria-describedby="basic-addon3" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="Email" class="form-control" placeholder="Email" aria-label="Email"
                            aria-describedby="basic-addon3" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="Password" class="form-control" placeholder="Kata Sandi" aria-label="Kata Sandi"
                            aria-describedby="basic-addon4" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="Confirm_Password" class="form-control" placeholder="Konfirmasi Kata Sandi"
                            aria-label="Konfirmasi Kata Sandi" aria-describedby="basic-addon5" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="emailCheckbox">
                        <label class="form-check-label" for="emailCheckbox">
                            <small>Saya ingin menerima email berisi rekomendasi resep dan komunikasi lain dari
                                Cookpad</small>
                        </label>
                    </div>
                    <!-- Tambahkan tombol untuk melakukan pendaftaran -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-cookpad" name="btnregister">Daftar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    document.getElementById('registerButton').addEventListener('click', function (event) {
        var emailCheckbox = document.getElementById('emailCheckbox');
        if (!emailCheckbox.checked) {
            event.preventDefault(); // Mencegah aksi default tombol daftar
            alert('Anda harus menyetujui untuk menerima email dari Cookpad.');
        }
    });
</script>