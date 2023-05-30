<?php
require_once "function.php";
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

          <div class="input-group mb-3">
            <span class="input-group-text"><img src="asset/img/cari.png" alt="" height="40" class="img-nav"></span>
            <input type="search" class="form-control" placeholder="Ketik bahan-bahan..." aria-label="Username"
              aria-describedby="basic-addon1">
            <button class="input-group-text btn-cookpad">Cari</button>
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
          // foreach($bahan as $bahan){
          // echo '<pre>';
          // var_dump($bahan);
          // echo '</pre>';
          // }
          
          ?>

          <div class="d-flex ">
            <form method="post" action="#hasil-bahan">
              <input type="hidden" value="ayam" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">ayam</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="sapi" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">sapi</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="ikan" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">ikan</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="kambing" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">kambing</button>
            </form>
            &nbsp;
            <form method="post">
              <input type="hidden" value="tahu" name="keyword">
              <button type="submit" name="caribahan" class="btn btn-cookpad">tahu</button>
            </form>
          </div>

          <br>


          <div>
            <ul class="nav nav-underline">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Olahan bayam</a>
              </li>
            </ul>
          </div>

          <div>
            <div class="row row-cols-1 row-cols-md-4 g-4">

              <?php foreach ($bahan as $bahan): ?>
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

          <!-- </center> -->

        </div>

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
            <div class="col" >
              <div class="card">
                <a href=""><img src="asset/img/kue.jpeg" class="card-img-top" alt="...">
                  <div class="img-caption" id="hasil-alat">
                    <h5 class="text-white"><b>Kue</b></h5>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <br>


          <div class="d-grid gap-2 col-3 mx-auto" >
            <button class="btn btn-secondary">Pilihin dong!</button>
          </div>

        </div>
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
              <?php foreach($alat as $alat): ?>
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
          $tips = tampilkan("SELECT user.username, tips.tips_id, langkah_tips.gambar_langkah, tips.tanggalbuat, tips.judul FROM tips LEFT JOIN user ON tips.user_id = user.user_id JOIN langkah_tips ON tips.tips_id = langkah_tips.tips_id WHERE NOT gambar_langkah = 'default_gambar.jpg' GROUP BY tips.tips_id limit 5");
          // $gambar = tampilkan("SELECT gambar_langkah, tips.judul FROM langkah_tips JOIN tips ON langkah_tips.tips_id = tips.tips_id WHERE NOT gambar_langkah = 'default_gambar.jpg' GROUP BY tips.tips_id");
          // $tips1 = array_merge($tips, $gambar);
          // $gambar = tampilkan("SELECT gambar_langah FROM langkah_tips")
          // echo "<pre>";
          // var_dump($tips);
          // echo "</pre>";
          // die();
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
                // var_dump($tips['langkah'])
                ?>
                <div class="col">
                  <div>
                    <p>
                      <?= $tips['username'] ?>
                    </p>
                  </div>
                  <a href="index.php?p=tips&idt=<?= $tips['tips_id'] ?>" class="text-decoration-none">
                    <div class="card">
                      <img class="card-img" <?php
                      $g = $tips['gambar_langkah'];
                      $gambar = "gambar/$g";
                      if (file_exists($gambar)) { ?> src="gambar/<?= $tips['gambar_langkah'] ?>" <?php } else {
                        //
                      } ?>
                        alt="...">
                      <div class="card-img-overlay">
                        <p class="card-text"><small>
                            <?= $tips['tanggalbuat'] ?>
                          </small></p>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $tips['judul'] ?>
                        </h5>
                        <p class="card-text">Reaksi</p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php
              }

              ?>
            </div>
          </div>

          <br>
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
            <div class="row row-cols-1 row-cols-md-4 g-4">

              <?php
              $resep = tampilkan("SELECT resep.*, user.username,user.user_id FROM resep join user ON resep.user_id = user.user_id order by resep.resep_id desc limit 4");
              // echo "<pre>";
              // var_dump($resep);
              // echo "</pre>";
              
              foreach ($resep as $resep) {
                ?>
                <div class="col">
                  <a href="index.php?p=detail_profil&idu=<?= $resep["user_id"] ?>" class="text-decoration-none text-dark">
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

                      <img class="card-img" src="gambar/<?= $resep["image"] ?>" alt="...">
                      <div class="card-img-overlay">

                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $resep["judul"] ?>
                        </h5>
                        <p class="card-text">Reaksi</p>
                      </div>
                    </div>
                  </a>
                </div>
                <?php
              }
              ?>

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