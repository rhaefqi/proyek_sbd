<?php
require_once "function.php";

$id = $_GET["idu"];
$user = tampilkan("SELECT * from user where user_id = $id")[0];


// var_dump($user);

?>

<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container">

    <div class="row">
      <div class="col-2"></div>

      <div class="col-8">
        <!-- Edit Erofile Start -->
        <div class="card">
          <!-- style="width: 700px; margin-top: 20px;" -->

          <!-- nama, id_user, lokasi -->
          <!-- nama, id_user, lokasi -->
          <!-- nama, id_user, lokasi -->
          <div class="row">

            <div class="col-3 d-flex align-items-center">
              <div class="p-3">
                <a href="#">
                  <img style="width: 170px; height: 170px;" class="rounded-circle" <?php if (empty($user["profil_image"])) { ?> src="asset/img/profil.png" <?php } else { ?>
                      src="gambar/<?= $user['profil_image'] ?>" <?php } ?>>
                  <!-- <img alt="Dinira Wijaya" class="rounded-circle" src="gambar/" style="width: 180px; height: 180px;"> -->
                </a>
              </div>
            </div>


            <div class="col-7 ps-0">
              <div class="p-3 d-inline">
                <br>
                <a class="btn btn-sm" href="#">
                  <h1>
                    <?= $user["username"] ?>
                  </h1>
                </a>
                <div>
                  <p>
                    <a class="btn btn-sm" href="#">
                      <span>@
                        <?= $user["id_cookpad"] ?>
                      </span>
                    </a>
                  </p>
                  <a class="btn btn-sm" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"
                      class="mise-icon mise-icon-pin">
                      <circle cx="8" cy="6.667" r="2" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="1.3"></circle>
                      <path fill="currentColor"
                        d="m8 14.667-.362.54a.65.65 0 0 0 .724 0L8 14.667Zm4.017-7.506c0 1.959-1.05 3.687-2.172 4.966A13.526 13.526 0 0 1 7.815 14l-.136.098-.033.023-.007.005-.001.001.362.54.362.54v-.001h.002l.004-.003.013-.01a12.854 12.854 0 0 0 .762-.583c.457-.377 1.067-.929 1.679-1.626 1.21-1.379 2.495-3.404 2.495-5.823h-1.3ZM8 14.667l.362-.54-.008-.006-.033-.023a11.542 11.542 0 0 1-.636-.49c-.418-.345-.975-.849-1.53-1.481-1.123-1.28-2.172-3.007-2.172-4.966h-1.3c0 2.419 1.285 4.444 2.495 5.823a14.828 14.828 0 0 0 2.236 2.063 8.352 8.352 0 0 0 .205.147l.013.008.004.003.001.001.363-.54ZM3.983 7.16c0-1.566.527-2.682 1.264-3.407A3.915 3.915 0 0 1 8 2.65c1.01 0 2.008.372 2.753 1.104.737.725 1.264 1.841 1.264 3.407h1.3c0-1.875-.64-3.34-1.653-4.334A5.215 5.215 0 0 0 8 1.35a5.215 5.215 0 0 0-3.664 1.477c-1.013.995-1.653 2.458-1.653 4.334h1.3Z">
                      </path>
                    </svg>
                    <?= $user["asal"] ?>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="card-body">
            <!-- deskripsi profil -->
            <!-- deskripsi profil -->
            <p>
              <?= $user["deskripsi"] ?>
            </p>

            <!-- followed and followers -->
            <?php
            $follow = hitung("SELECT * from follow where pengikut = $id");
            $follower = hitung("SELECT * from follow where diikuti = $id");
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

            <!-- follow button -->

            <?php
            if (isset($_POST["follow"])) {
              follow($_POST);
            }
            $fid = $_SESSION["id_user"];
            $sts = hitung("SELECT * from follow where pengikut = $fid and diikuti = $id")
              ?>
            <?php if ($_SESSION["id_user"] == $user["user_id"]): ?>
            <?php else: ?>
              <div>
                <?php
                if ($sts == 0) { ?>
                  <form action="" method="post">
                    <input type="hidden" name="pengikut" value="<?= $_SESSION["id_user"] ?>">
                    <input type="hidden" name="diikuti" value="<?= $user["user_id"] ?>">
                    <input type="hidden" name="status" value="1">
                    <button type="submit" name="follow" class="btn btn-secondary" style="width: 100%;">Ikuti</button>
                  </form>
                <?php } else { ?>
                  <form action="" method="post">
                    <input type="hidden" name="pengikut" value="<?= $_SESSION["id_user"] ?>">
                    <input type="hidden" name="diikuti" value="<?= $user["user_id"] ?>">
                    <input type="hidden" name="status" value="2">
                    <button type="submit" name="follow" class="btn btn-outline-secondary" style="width: 100%;">Stop
                      Ikuti</button>
                  </form>
                <?php } ?>
              </div>
            <?php endif ?>
          </div>

        </div>
        <!-- Edit Profile End -->
        <br>

        <?php
        if (@$_GET['a']) {
          switch ($_GET['a']) {
            case "resep":
              include "another_resep.php";
              break;
            case "cooksnap":
              include "another_cooksnap.php";
              break;
          }
        } else {
          include "another_main.php";
        }
        ?>

      </div>

    </div>

    <div class="col-2"></div>
  </div>

  <!-- div end container -->

  <!-- Body End -->