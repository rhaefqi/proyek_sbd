<?php
require_once "function.php";

if (isset($_POST["cari"])) {
  // die;
  $hasil = cari($_POST);
  $_SESSION["hasil_cari"] = $hasil;
  header("Location: index.php?p=hasil_cari");

  // echo "<pre>";
  // var_dump($hasil);
  // echo "</pre>";
}
?>

<div>
  <div style="background-color: #f8f6f2;">
    <div class="container">
      <div class="container-fluid">

        <br>
        <div id="search_section"></div>
        <center>
          <div>
            <img src="asset/img/cookpad_logo.png" alt="" height="80">
          </div>
        </center>

        <br>

        <!-- Search Bar start -->
        <div>

          <form action="" method="post">
            <div class="input-group mb-3">
              <span class="input-group-text"><img src="asset/img/cari.png" alt="" height="40" class="img-nav"></span>
              <input type="text" name="keyword" class="form-control" placeholder="Ketik bahan-bahan..."
                aria-label="Username" aria-describedby="basic-addon1">
              <button type="submit" name="cari" class="input-group-text btn-cookpad">Cari</button>
            </div>
          </form>

          <br>

          <center>
            <a href="index.php?p=buat" class="btn btn-secondary">
              <span><img class="img-nav" src="asset/img/tambah.png" alt="" height="20"></span>Tulis Resep</a>
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
          <div class="carousel-inner" id="hasil-bahan">
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
        <!-- inspirasi end -->
        <br><br>

        <!-- Masak Apa Saja Start -->
        <div>
          <h4><b>Apa isi kulkasmu?</b></h4>

          <br>

          <?php
          if (isset($_POST["caribahan"])) {
            $bahan = caribahan($_POST);
          } else {
            $bahan = caribahan('ayam');
          }

          ?>

          <div class="d-flex ">
            <form method="post" action="#hasil-bahan">
              <input type="hidden" value="ayam" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">ayam</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="susu" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">susu</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="margarin" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">margarin</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="telur" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">telur</button>
            </form>
          </div>

          <br>


          <div>
            <ul class="nav nav-underline">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Olahan
                  <?= $bahan[0]["keyword"] ?>
                </a>
              </li>
            </ul>
          </div>

          <div>
            <div class="row row-cols-1 row-cols-md-4 g-4">

              <?php foreach ($bahan as $bahan): ?>
                <div class="col">
                  <div>
                    <p>
                      <?= $bahan["username"] ?>
                    </p>
                  </div>
                  <div class="card">
                    <a href="index.php?p=detail_resep&idr=<?= $bahan["resep_id"] ?>"
                      class="text-decoration-none text-dark">
                      <img class="card-img" style="width: 300px;height: 200px;" src="gambar/<?= $bahan["image"] ?>"
                        alt="...">
                      <div class="card-img-overlay">
                        <p class="card-text"><small>
                            <?php
                            $waktu = waktu($bahan["tanggalbuat"]);
                            ?>
                            <?= $waktu ?>
                          </small></p>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $bahan["judul"] ?>
                        </h5>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
          </div>

          <br>

          <br>
        </div>
        <!-- Masak Apa Saja End -->
        <br><br>
        <!-- Rekomendasi Cookbook Starts -->
        <div class="mb-5">
          <h3>Lihat Cookbook</h3>
          <p>Jelajahi ide-ide masak baru bersama</p>

          <div class="row row-cols-1 row-cols-md-6 g-4">
            <?php
            $cookbook = tampilkan("SELECT cookbook.*, user.id_cookpad FROM cookbook join user on cookbook.user_id = user.user_id order by cookbook.cookbook_id desc limit 6");
            // echo "<pre>";
            // var_dump($cookbook);
            // echo "</pre>";
            foreach ($cookbook as $cb) {
              $no = rand(1, 4);
              ?>
              <div class="col">
                <div class="card" style="width: 12rem;">
                  <a href="index.php?p=cookbook&idcb=<?= $cb["cookbook_id"] ?>">
                    <img src="asset/img/lpcb<?= $no ?>.jpg" class="card-img-top" alt="...">
                  </a>
                  <div class="card-body">
                    <p>
                      <?= $cb["judul"] ?> <br>
                      @
                      <?= $cb["id_cookpad"] ?>
                    </p>
                  </div>
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

          <!-- </center> -->

        </div>

        <!-- Ingin makan apa start -->
        <!-- Caraousel info start -->

        <!-- Ingin makan apa start -->
        <h4><b>Ingin makan apa</b></h4>
        <p>Belum yakin? Yuk lihat idenya disini</p>
        <br>

        <div id="carouselExampleIndicators2" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators2" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">

              <script>
                function submitForm(event, formClass) {
                  event.preventDefault(); // Mencegah tindakan default klik tautan

                  var form = document.getElementsByClassName(formClass)[0];
                  form.submit();
                }
              </script>

              <div class="row row-cols-1 row-cols-md-4 g-4">

                <div class="col">
                  <form action="random.php" method="post" class="myForm">
                    <input type="hidden" value="donat" name="keyword">
                    <div class="card">
                      <a href="" onclick="submitForm(event, 'myForm')"><img src="asset/img/donat.jpeg"
                          class="card-img-top" alt="..." height="200px">
                        <div class="img-caption">
                          <h5 class="text-white"><b>Donat</b></h5>
                        </div>
                      </a>
                    </div>
                  </form>
                </div>

                <div class="col">
                  <form action="random.php" method="post" class="myForm1">
                    <input type="hidden" value="kopi" name="keyword">
                    <div class="card">
                      <a href="" onclick="submitForm(event, 'myForm1')"><img src="asset/img/kopi.jpg"
                          class="card-img-top" alt="...">
                        <div class="img-caption">
                          <h5 class="text-white"><b>Kopi</b></h5>
                        </div>
                      </a>
                    </div>
                  </form>
                </div>

                <div class="col">
                  <form action="random.php" method="post" class="myForm2">
                    <input type="hidden" value="cokelat" name="keyword">
                    <div class="card">
                      <a href="" onclick="submitForm(event, 'myForm2')"><img src="asset/img/cokelat.jpg"
                          class="card-img-top" alt="...">
                        <div class="img-caption">
                          <h5 class="text-white"><b>olahan cokelat</b></h5>
                        </div>
                      </a>
                    </div>
                  </form>
                </div>

                <div class="col">
                  <form action="random.php" method="post" class="myForm3">
                    <input type="hidden" value="ayam" name="keyword">
                    <div class="card">
                      <a href="" onclick="submitForm(event, 'myForm3')"><img src="asset/img/ayam.jpg"
                          class="card-img-top" alt="..." height="200px">
                        <div class="img-caption">
                          <h5 class="text-white"><b>olahan ayam</b></h5>
                        </div>
                      </a>
                    </div>
                  </form>
                </div>
                
              </div>

            </div>
            

          </div>
          <br>

       >

          <!-- Ingin makan apa end -->
          <!-- Caraousel info end -->
          <!-- Ingin makan apa end -->
          <br><br>

          <?php
          if (isset($_POST["carialat"])) {
            $alat = carialat($_POST);
          } else {
            $alat = carialat('teflon');
          }

          ?>

          <!-- Alat masak start -->
          <div>
            <h4><b>Alat masakmu</b></h4>
            <div class="d-flex">
              <form method="post" action="#hasil-alat">
                <input type="hidden" value="teflon" name="keyword">
                <button type="submit" name="carialat" class="btn btn-cookpad">Teflon</button>
              </form>
              &nbsp;
              <form method="post">
                <input type="hidden" value="magic" name="keyword">
                <button type="submit" name="carialat" class="btn btn-cookpad">Magic com</button>
              </form>
              &nbsp;
              <form method="post">
                <input type="hidden" value="presto" name="keyword">
                <button type="submit" name="carialat" class="btn btn-cookpad">Presto</button>
              </form>
              &nbsp;
              <form method="post">
                <input type="hidden" value="oven" name="keyword">
                <button type="submit" name="carialat" class="btn btn-cookpad">Oven</button>
              </form>
              &nbsp;
              <form method="post">
                <input type="hidden" value="dandang" name="keyword">
                <button type="submit" name="carialat" class="btn btn-cookpad">Dandang</button>
              </form>
            </div>

            <div>
              <ul class="nav nav-underline">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Semua</a>
                </li>
              </ul>
            </div>

            <div>
              <div class="row row-cols-1 row-cols-md-4 g-4">
                <?php foreach ($alat as $alat): ?>
                  <div class="col">
                    <div>
                      <p>
                        <?= $alat["username"] ?>
                      </p>
                    </div>
                    <div class="card">
                      <a href="index.php?p=detail_resep&idr=<?= $alat["resep_id"] ?>"
                        class="text-decoration-none text-dark">
                        <img class="card-img" style="width: 300px; height: 250px" src="gambar/<?= $alat["image"] ?>"
                          alt="...">
                        <div class="card-img-overlay">
                          <?php
                          $waktu = waktu($alat["tanggalbuat"])
                            ?>
                          <p class="card-text"><small>
                              <?= $waktu ?>
                            </small></p>
                        </div>
                        <div class="card-body">
                          <h5 class="card-title">
                            <?= $alat["judul"] ?>
                          </h5>
                        </div>
                      </a>
                    </div>
                  </div>
                <?php endforeach ?>


              </div>
            </div>

            <br>

            <br>
          </div>
          <!-- Alat masak end -->

          <!-- Olahan Kentang start -->
          <div>
            <?php
            $tips = tampilkan("SELECT user.username, tips.tips_id, langkah_tips.gambar_langkah, langkah_tips.langkah, tips.tanggalbuat, tips.judul FROM tips LEFT JOIN user ON tips.user_id = user.user_id JOIN langkah_tips ON tips.tips_id = langkah_tips.tips_id WHERE NOT gambar_langkah = 'default_gambar.jpg' GROUP BY tips.tips_id order by tips.tips_id desc limit 5");

            ?>
            <h4><b>Tips</b></h4>
            <p>Tips buat dapur kamu</p>

            <div>
              <div class="row row-cols-1 row-cols-md-5 g-4">
                <?php
                foreach ($tips as $tips) {
                  // if (isset($tips['gambar_langkah'])) {
                  //   break;
                  // } else {
                  // var_dump($tips["gambar_langkah"])
                  ?>
                  <div class="col">
                    <div>
                      <p>
                        <?= $tips['username'] ?>
                      </p>
                    </div>
                    <a href="index.php?p=detail_tips&idt=<?= $tips['tips_id'] ?>" class="text-decoration-none">
                      <div class="card">
                        <?php if ($tips["gambar_langkah"] === 'default_gambar.jpg') { ?>
                          <p>
                            <?= $tips["langkah"] ?>
                          </p>
                        <?php } else { ?>
                          <img alt="profil" src="gambar/<?= $tips['gambar_langkah'] ?>"
                            style="width: 235px; height: 150px;">
                        <?php } ?>
                        <div class="card-img-overlay">
                          <p class="card-text"><small>
                              <?= $tips['tanggalbuat'] ?>
                            </small></p>
                        </div>
                        <div class="card-body">
                          <h6 class="card-title">
                            <?= $tips['judul'] ?>
                          </h6>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php } ?>
              </div>
            </div>

            <br>
            <br>
          </div>
          <!-- Olahan kentang end -->


          <br><br>

          <!-- Bahan apa start -->
          <?php
          $bahanp = tampilkan("SELECT * from bahan_pilihan limit 4")
            ?>
          <div>
            <h4><b>Bahan Pilihan Untuk mu</b></h4>

            <div class="row row-cols-1 row-cols-md-4 g-4">

              <?php foreach ($bahanp as $bahanp): ?>
                <div class="col">
                  <div class="card">
                    <a href="?p=bahan_pilihan&idbp=<?= $bahanp["bp_id"] ?>"><img src="asset/img/santan.jpg"
                        class="card-img-top" alt="..." height="150">
                      <div class="img-caption">
                        <h5 class="text-white"><b>Santan</b></h5>
                      </div>
                    </a>
                  </div>
                </div>
              <?php endforeach ?>

            </div>
            <br>

          </div>
          <!-- Bahan apa end -->
          <br><br>

          <!-- Resep terbaru start -->
          <div>
            <h4><b>Resep Terbaru</b></h4>

            <div>
              <div class="row row-cols-1 row-cols-md-4 g-4">

                <?php
                $resep = tampilkan("SELECT resep.*, user.username,user.user_id FROM resep join user ON resep.user_id = user.user_id order by resep.resep_id desc limit 4");
                // echo "<pre>";
                // var_dump($resep);
                // echo "</pre>";
                
                foreach ($resep as $resep) {
                  ?>
                  <div class="col">
                    <a href="index.php?p=detail_profil&idu=<?= $resep["user_id"] ?>"
                      class="text-decoration-none text-dark">
                      <div class="d-flex">
                        <img style="width: 35px;height: 35px;" class="rounded-circle mx-1" src="asset/img/profil.png"
                          alt="">
                        <p class="">
                          <?= $resep["username"] ?> <br>
                          <small>
                            <?php
                            $waktu = waktu($resep["tanggalbuat"]);
                            ?>
                            <?= $waktu ?>
                          </small>
                        </p>
                      </div>
                    </a>
                    <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>" class="text-decoration-none">
                      <div class="card">

                        <img class="card-img" style="width: 300px;height: 200px;" src="gambar/<?= $resep["image"] ?>"
                          alt="...">
                        <div class="card-img-overlay">

                        </div>
                        <div class="card-body">
                          <h5 class="card-title">
                            <?= $resep["judul"] ?>
                          </h5>
                        </div>
                      </div>
                    </a>
                  </div>
                <?php } ?>

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