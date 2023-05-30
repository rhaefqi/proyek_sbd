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
                  <img alt="Dinira Wijaya" class="rounded-circle" src="asset/img/bekal.jpeg" width="100%">
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