<?php
// var_dump($_SESSION);
$uid = $_SESSION["id_user"];

$user = tampilkan("SELECT * from user where user_id = $uid")[0];
// var_dump($gambar);
// $g = $user['profil_image'];
// $gambar_p = "gambar/$g";
?>
<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container" style="width: 60%;">
    <div class="container-fluid">

      <br><br>

      <!-- Edit Erofile Start -->
      <div class="card">

        <div class="row">

          <div class="col-2">
            <div class="p-3">
              <a href="#">


                <img alt="profil" class="rounded-circle" <?php if (empty($user["profil_image"])) { ?>
                    src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $user['profil_image'] ?>" <?php } ?>
                  style="width: 90px; height: 90px;">
              </a>
            </div>
          </div>


          <div class="col-8 ps-0">
            <div class="p-3 d-inline">
              <br>
              <a href="" class="text-decoration-none text-black">
                <h1 class="font-semibold">
                  <?= $user["username"] ?>
                </h1>
              </a>
              <div>
                <p>
                  <a href="" class="text-decoration-none text-black">
                    <span>@
                      <?= $user["id_cookpad"] ?>
                    </span>
                  </a>
                </p>
              </div>
              <div class="mb-1">
                <?= $user["deskripsi"] ?>
              </div>
              <?php
              $follow = hitung("SELECT * from follow where pengikut = $uid");
              $follower = hitung("SELECT * from follow where diikuti = $uid");
              ?>
              <div class="row">
                <div class="col-3">
                  <p><b>
                      <?= $follow ?>
                    </b> Mengikuti</p>
                </div>
                <div class="col-3">
                  <p><b>
                      <?= $follower ?>
                    </b> Pengikut</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-2">
            <p class="p-3">
              <a href="index.php?p=edit"><img width="20%" src="asset/img/sunting.png" alt=""></a> &nbsp;
              <a href=""><img width="20%" src="asset/img/chart.png" alt=""></a> &nbsp;
              <a href=""><img width="20%" src="asset/img/pengaturan.png" alt=""></a>
            </p>
          </div>

        </div>



      </div>
      <!-- Edit Profile End -->
      <br>

      <!-- Link starts -->
      <div>
        <div class="card overflow-scroll">
          <br>
          <p class="container">
            <a href="index.php?p=profil" class="btn btn-white text-black"><b>Tersimpan</b></a>
            <a href="index.php?p=profil&m=resep" class="btn btn-white text-black" name="resep"><b>Resep Saya</b></a>
            <a href="index.php?p=profil&m=cooksnap" class="btn btn-white text-black" name="cooksnap"><b>Cooksnap</b></a>
            <a href="index.php?p=profil&m=tips" class="btn btn-white text-black" name="tips"><b>Tips</b></a>
            <a class="btn btn-white text-black" href="index.php?p=profil&m=cookbook">
              <b>Cookbook</b>
            </a>
          </p>
        </div>
      </div>
      <!-- Link end -->

      <!-- Data yang ditampilkan dari link start -->
      <br>
      <?php
      if (@$_GET['m']) {
        switch ($_GET['m']) {
          case "cookbook":
            include "profil_cookbook.php";
            break;
          case "resep":
            include "profil_resep.php";
            break;
          case "cooksnap":
            include "profil_cooksnap.php";
            break;
          case "tips":
            include "profil_tips.php";
            break;
        }
      } else {
        include "profil_simpan.php";
      }
      ?>

      <!-- Data yang ditampilkan dari link end -->


      <!-- Batas resep starts -->

      <!-- Batas resep end -->
      <br><br>

    </div>
  </div>
</div>

<!-- Body End -->