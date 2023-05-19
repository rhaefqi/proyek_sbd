<?php
require_once "function.php";
?>

<div>
  <div style="background-color: #f8f6f2;">
    <div class="container">
      <div class="container-fluid">

        <br>

        <center>
          <div>
            <img src="asset/img/cookpad_logo.png" alt="" height="80">
          </div>
        </center>

        <br>

        <!-- Search Bar start -->
        <div>

          <div class="input-group mb-3">
            <span class="input-group-text"><img src="asset/img/cari.png" alt="" height="40" class="img-nav"></span>
            <input type="search" class="form-control" placeholder="Ketik bahan-bahan..." aria-label="Username"
              aria-describedby="basic-addon1">
            <button class="input-group-text btn-cookpad">Cari</button>
          </div>

          <div>
            <p><b>PENCARIAN POPULER HARI INI </b></p>

            <p>
              <b>
                <a href="">rendang daging</a> &nbsp; &nbsp;
                <a href="">kacang bawang</a> &nbsp; &nbsp;
                <a href="">gulai ayam</a> &nbsp; &nbsp;
                <a href="">semur daging</a>
              </b>
            </p>

            <span><button class="btn btn-secondary">katergori</button></span>

          </div>
          <br>

          <center>
            <button class="btn btn-secondary">
              <span><img class="img-nav" src="asset/img/tambah.png" alt="" height="20"></span>Tulis Resep</button>
        </div>
        </center>
        <!-- Search Bar end -->
        <br><br>

        <!-- Caraousel info start -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="asset/img/ban5.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="asset/img/ban4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="asset/img/ban6.jpg" class="d-block w-100" alt="...">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
        <!-- Caraousel info end -->
        <br>

        <!-- inspirasi start -->
        <p>
          <a href="#collapseExample">
            Inspirasi
          </a> &nbsp; &nbsp;
          <a href="#collapseExample">
            Mengikuti
          </a>
        </p>
        <div>
          <div class="card card-body">
            Halaman untuk menampilkan inspirasi dan mengikuti
          </div>
        </div>
        <!-- inspirasi end -->
        <br><br>

        <!-- Masak Apa Saja Start -->
        <div>
          <h4><b>Apa isi kulkasmu?</b></h4>

          <div class="card container opac-cookpad">
            <br>
            <p>Kombinasikan beberapa bahan untuk mendapatkan ide baru. <a href="#">Hanya di aplikasi Cookpad</a></p>
          </div>
          <br>

          <div>
            <button type="button" class="btn btn-cookpad">Bayam</button>
            <button type="button" class="btn bg-dark-subtle">Tepung Terigu</button>
            <button type="button" class="btn bg-dark-subtle">Labu Siam</button>
            <button type="button" class="btn bg-dark-subtle">Buncis</button>
            <button type="button" class="btn bg-dark-subtle">Jagung</button>
          </div>

          <br>

          <div>
            <ul class="nav nav-underline">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Semua</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">Olahan 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Olahan 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Olahan 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Olahan 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Olahan 5</a>
              </li>
            </ul>
          </div>

          <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>

          <center>
            <button class="btn btn-secondary"><span><img class="img-nav" src="asset/img/cari.png" alt=""
                  height="15"></span>Temukan Ide Lainnya</button>
          </center>

          <br>
        </div>
        <!-- Masak Apa Saja End -->
        <br><br>
        <!-- Rekomendasi Cookbook Starts -->
        <div>
          <h3>Lihat Cookbook</h3>
          <p>Jelajahi ide-ide masak baru bersama</p>

          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $cookbook = tampilkan("SELECT * FROM cookbook limit 4");
            // echo "<pre>";
            // var_dump($cookbook);
            // echo "</pre>";
            foreach ($cookbook as $cb) {
              ?>
              <div class="col">
                <div class="card" style="width: 12rem;">
                  <a href="index.php?p=cookbook&idcb=<?= $cb["cookbook_id"] ?>">
                    <img src="asset/img/lpcb1.jpg" class="card-img-top" alt="...">
                  </a>
                </div>
              </div>
            <?php } ?>

            <!-- <div class="col">
              <div class="card" style="width: 12rem;">
                <img src="asset/img/lpcb2.jpg" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 12rem;">
                <img src="asset/img/lpcb3.jpg" class="card-img-top" alt="...">
              </div>
            </div>
            <div class="col">
              <div class="card" style="width: 12rem;">
                <img src="asset/img/lpcb4.jpg" class="card-img-top" alt="...">
              </div>
            </div> -->
          </div>
          <br>


          <!-- <center> -->
          <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-secondary">Lihat Semua Cookbook</button>
          </div>
          <!-- </center> -->

        </div>

        <br><br>
        <!-- Ingin makan apa start -->
        <div>
          <h4><b>Ingin makan apa</b></h4>
          <p>Belum yakin? Yuk lihat idenya disini</p>

          <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/donat.jpeg" class="card-img-top" alt="...">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Donat</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/bekal.jpeg" class="card-img-top" alt="...">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Bekal</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/ayam.jpeg" class="card-img-top" alt="...">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Ayam</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/kue.jpeg" class="card-img-top" alt="...">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Kue</b></h5>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <br>


          <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-secondary">Pilihin dong!</button>
          </div>

        </div>
        <!-- Ingin makan apa end -->
        <br><br>

        <!-- Alat masak start -->
        <div>
          <h4><b>Alat masakmu</b></h4>
          <div>
            <button type="button" class="btn btn-cookpad">Teflon</button>
            <button type="button" class="btn bg-dark-subtle">Magic Com</button>
            <button type="button" class="btn bg-dark-subtle">Presto</button>
            <button type="button" class="btn bg-dark-subtle">Oven</button>
            <button type="button" class="btn bg-dark-subtle">Dandang</button>
          </div>

          <div>
            <ul class="nav nav-underline">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Semua</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#">Makanan 1</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Makanan 2</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Makanan 3</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Makanan 4</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Makanan 5</a>
              </li>
            </ul>
          </div>

          <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>

          <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-secondary"><span><img src="asset/img/cari.png" alt="" height="20"></span> Temukan
              ide
              lain</button>
          </div>

          <br>
        </div>
        <!-- Alat masak end -->

        <!-- Olahan Kentang start -->
        <div>
          <h4><b>Tips</b></h4>
          <p>Cocok jadi makanan pendamping hari raya</p>

          <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>

          <div class="d-grid gap-2 col-3 mx-auto">
            <button class="btn btn-secondary"><span><img src="asset/img/cari.png" alt="" height="20"></span> Temukan
              Tips lainnya</button>
          </div>

          <br>
        </div>
        <!-- Olahan kentang end -->


        <br><br>

        <!-- Bahan apa start -->
        <div>
          <h4><b>Bahan Pilihan Untuk mu</b></h4>

          <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col">
              <div class="card">
                <a href="?p=bahan_pilihan"><img src="asset/img/santan.jpg" class="card-img-top" alt="..." height="150">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Santan</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/madu.jpg" class="card-img-top" alt="..." height="150">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Madu</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/kunyit.jpg" class="card-img-top" alt="..." height="150">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Kunyit</b></h5>
                  </div>
                </a>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <a href=""><img src="asset/img/kurma.jpg" class="card-img-top" alt="..." height="150">
                  <div class="img-caption">
                    <h5 class="text-white"><b>Kurma</b></h5>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <br>

        </div>
        <!-- Bahan apa end -->
        <br><br>

        <!-- Resep terbaru start -->
        <div>
          <h4><b>Resep Terbaru</b></h4>

          <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
              <div class="col">
                <div>
                  <p>user_name_account</p>
                </div>
                <div class="card">

                  <img class="card-img" src="asset/img/logo.png" alt="...">
                  <div class="card-img-overlay">
                    <p class="card-text"><small>Last updated 3 mins ago</small></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Nama Makanan</h5>
                    <p class="card-text">Reaksi</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <br>

          <br>
        </div>
        <!-- Resep terbaru end -->

      </div>
    </div>
  </div>
</div>