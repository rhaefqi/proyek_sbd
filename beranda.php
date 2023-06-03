<!-- Isi Start -->
<div style="background-color: #ebebeb;">
  <br>
  <div class="container">
    <div class="row">
      <!-- Konten Utama Start -->
      <div class="col-sm-8">

        <!-- Caraousel Start -->
        <div id="carouselExampleSlidesOnly" class="carousel slide card" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="asset/img/lpmasakan1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
              <img src="asset/img/lpmasakan2.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
              <img src="asset/img/lpmasakan3.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
              <img src="asset/img/lpmasakan4.jpg" class="d-block w-100" alt="...">
            </div>

            <div class="carousel-item">
              <img src="asset/img/lpmasakan5.png" class="d-block w-100" alt="...">
            </div>
          </div>
        </div>
        <!-- Caraosel End -->

        <br>

        <!-- Masak Apa Saja Start -->
        <div class="card container">
          <h3>Lihat Resep</h3>

          <div>
            <div class="row row-cols-1 row-cols-md-3 g-4">

              <?php
              $resep = tampilkan("SELECT resep.*, user.username,user.user_id FROM resep join user ON resep.user_id = user.user_id order by resep.resep_id desc limit 3");
              // echo "<pre>";
              // var_dump($resep);
              // echo "</pre>";
              
              foreach ($resep as $resep) {
                ?>
                <div class="col">
                  <!-- <a href="index.php?p=detail_profil&idu=<?= $resep["user_id"] ?>" class="text-decoration-none text-dark"> -->
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
                  <!-- </a> -->
                  <!-- <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>" class="text-decoration-none"> -->
                    <div class="card">

                      <img class="card-img" style="width: 260px;height: 200px;" src="gambar/<?= $resep["image"] ?>"
                        alt="...">
                      <div class="card-img-overlay">

                      </div>
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $resep["judul"] ?>
                        </h5>
                      </div>
                    </div>
                  <!-- </a> -->
                </div>
              <?php } ?>

            </div>
          </div>


          <br>
        </div>
        <!-- Masak Apa Saja End -->
        <br>
        <!-- Rekomendasi Cookbook Starts -->
        <div>
          <h3>Lihat Cookbook</h3>
          <p>Jelajahi ide-ide masak baru bersama</p>

          <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $cookbook = tampilkan("SELECT cookbook.*, user.id_cookpad FROM cookbook join user on cookbook.user_id = user.user_id order by cookbook.cookbook_id desc limit 4");
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
          </div>
          <br>

        </div>

        <!-- Rekomendasi Cookbook Starts -->

        <br>

        <!--Komentar Start  -->
        <div class="card bg-cookpad">
          <div class="text-center">
            <h3>Masak Bareng Lebih Seru</h3>
            <p>dapatkan tips</p>
          </div>

          <?php $tips = tampilkan("SELECT user.username, tips.tips_id, langkah_tips.gambar_langkah, langkah_tips.langkah, tips.tanggalbuat, tips.judul FROM tips LEFT JOIN user ON tips.user_id = user.user_id JOIN langkah_tips ON tips.tips_id = langkah_tips.tips_id WHERE NOT gambar_langkah = 'default_gambar.jpg' GROUP BY tips.tips_id order by tips.tips_id desc limit 3"); ?>

          <div class="container d-flex">
            <!-- <div class="card d-flex"> -->

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
                <!-- <a href="index.php?p=detail_tips&idt=<?= $tips['tips_id'] ?>" class="text-decoration-none"> -->
                <div class="card" style="width: 235px;">
                  <?php if ($tips["gambar_langkah"] === 'default_gambar.jpg') { ?>
                    <p>
                      <?= $tips["langkah"] ?>
                    </p>
                  <?php } else { ?>
                    <img alt="profil" src="gambar/<?= $tips['gambar_langkah'] ?>" style="width: 235px; height: 150px;">
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
                <!-- </a> -->
              </div>
            <?php } ?>

            <!-- <div>
                <div class="card-body">
                  <small class="card-title"><b>user_name_account</b> membagikan resep</small>
                  <form action="">
                    <textarea class="form-control" name="" id="" rows="2"></textarea>
                  </form>
                </div>
              </div>
              <hr>
              <div>
                <div class="card-body">
                  <small class="card-title"><b>user_name_account</b> membagikan Cooksnap</small>
                  <p>"Komentar Cooksnap"</p>
                </div>
              </div>
              <hr>
              <div>
                <div class="card-body">
                  <small class="card-title"><b>user_name_account</b> membagikan tips</small>
                  <form class="form" action="">
                    <textarea class="form-control" name="" id="" rows="2"></textarea>
                  </form>
                </div>
              </div>
              <hr>
              <div>
                <div class="card-body">
                  <small class="card-title"><b>user_name_account</b> membagikan komentar</small>
                  <p>"Isi Komentar"</p>
                </div>
              </div> -->

            <!-- </div> -->
          </div>
          <br>
        </div>
        <!-- Komentar End -->

        <br>

        <!-- Rekomendasi Resep Start -->

        <!-- <div class="card container">
          <h3>Resep untuk semua orang</h3>
          <p>Jelajahi resep yang cocok dengan tiap kebutuhan</p>

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

        </div> -->

        <!-- rekomendasi resep end -->

      </div>
      <!-- Konten Utama End -->

      <!-- B A T A S  Y A N G D I B A T A S I -->

      <!-- Konten Sidebar Start -->
      <div class="col-sm-4">
        <div class="card bg-dark-subtle">
          <br>
          <h4 class="text-center">Coba gratis Aplikasi Kami!</h4>
          <br>
          <div class="row text-center">
            <div class="col">
              <img src="asset/img/appstore.svg" alt="">
            </div>
            <div class="col">
              <img src="asset/img/playstore.svg" alt="">
            </div>
          </div>
          <div class="text-center">
            <br>
            <img src="asset/img/cobagratisapk_iklan.png" alt="" style="width: 80%;">
          </div>
          <br>
        </div>

      </div>

      <!-- Konten Sidebar End -->
    </div>
  </div>
  <br><br>
</div>
<!-- Isi End -->