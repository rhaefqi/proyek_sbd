<?php
require_once "function.php";
if (isset($_POST["submit_komen"])) {
  komentar_resep($_POST);
}
$id = $_GET["idr"];
// var_dump($_SESSION)

$resep = tampilkan("SELECT resep.*, user.username,user.id_cookpad,user.profil_image FROM resep join user on resep.user_id = user.user_id where resep.resep_id = $id ")[0];
$bahan = tampilkan("SELECT * from bahan_resep where resep_id = $id");
$langkah = tampilkan("SELECT * from langkah_resep where resep_id = $id");
$komentar = tampilkan("SELECT a.*,b.username,b.id_cookpad,b.profil_image from komentar_resep a join user b on a.user_id = b.user_id where a.resep_id = $id");
$cooksnap = tampilkan("SELECT cooksnap.*,user.id_cookpad from cooksnap join user on cooksnap.user_id = user.user_id where cooksnap.resep_id = $id")
  ?>
<!-- Body -->

<div class="container">
  <div class="row mt-3 justify-content-center ">

    <!-- Bagian Kiri -->
    <div class="col-6 me-3">
      <!-- Image -->
      <div class="row mb-3 ">
        <?php
        $img = $resep["image"];
        ?>
        <img style="border-radius: 20px;width: 680px; height: 482px;" src="gambar/<?= $img ?>" alt="telurdadarngawi"
          class="  ">
      </div>
      <!-- Akhir Image -->

      <!-- Nama Makanan Dan Pembuat -->
      <div class="row p-1 border shadow-lg  m-0 mb-3 bg-body rounded">
        <div class=" fs-1  fw-bold">
          <p>
            <?= $resep["judul"] ?>
          </p>
        </div>
        <div class="d-flex mb-3">
          <img style="width: 40px;height: 40px;" class="rounded-circle" <?php if (empty($resep["profil_image"])) { ?>
              src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $resep['profil_image'] ?>" <?php } ?>
            width="100%">
          <span class="d-flex ms-2 mt-1 fw-bold">
            <p>
              <?= $resep["username"] ?>
            </p>
            <p class="fw-normal ms-1">@
              <?= $resep["id_cookpad"] ?>
            </p>
          </span><br>
        </div>
        <div>
          <?= $resep["excerpt"] ?>
        </div>
      </div>
      <!-- Akhir Nama Makanan Dan Pembuat -->

      <!-- Bahan-Bahan -->
      <div class="row border shadow-lg  m-0 mb-3 bg-body rounded ">
        <div class="mt-3 fs-5  fw-semibold">
          <p>Bahan-bahan</p>
        </div>
        <div class="d-flex">
          <svg class="mt-1 me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="none"
            viewBox="0 0 16 16" class="mise-icon mise-icon-time">
            <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
              stroke-width="1.3"></circle>
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
              d="M8 5.333V8l2 1.334"></path>
          </svg>
          <div class="p-0 me-3">
            <p>
              <?= $resep["lama_memasak"] ?>
            </p>
          </div>
          <div class="d-flex">
            <svg class="ms-2 mt-1" xmlns="http://www.w3.org/2000/svg" width="16" height="19" fill="none"
              viewBox="0 0 16 16" class="mise-icon mise-icon-user">
              <circle cx="8" cy="4.667" r="2.667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="1.3"></circle>
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                d="M10 9.333H6A2.667 2.667 0 0 0 3.333 12c0 .736.597 1.333 1.334 1.333h6.666c.737 0 1.334-.597 1.334-1.333A2.667 2.667 0 0 0 10 9.333Z">
              </path>
            </svg>
          </div>
          <div class="ms-2">
            <p>
              <?= $resep["porsi"] ?> orang
            </p>
          </div>
        </div>
        <?php
        foreach ($bahan as $bahan) { ?>

          <div class="d-flex fw-bold">
            <span class="fw-normal ms-1">
              <p>
                ⦿
                <?= $bahan["bahan"] ?>
              </p>
            </span>
          </div>

        <?php } ?>

      </div>
      <!-- Akhir Bahan-Bahan -->

      <!-- Cara Membuat -->
      <div class="row border shadow-lg  m-0 mb-3 bg-body rounded ">
        <div class="mt-3 fs-5  fw-semibold">
          <p>Cara Membuat</p>
        </div>
        <?php
        $i = 1;
        foreach ($langkah as $langkah) { ?>
          <div class="fw-bold">
            <p>Langkah
              <?= $i++ ?>
            </p>
          </div>
          <div class="word-wrap">
            <?php
            $g = $langkah['gambar_langkah'];
            $gambar = "gambar/$g";
            ?>
            <?php if (empty($g) || !file_exists($gambar)) { ?>

            <?php } else { ?>
              <img src="gambar/<?= $langkah["gambar_langkah"] ?>" alt="tes" title="tes"
                style="width: 120px; height: 120px;">
            <?php } ?>

            <p>
              <?= $langkah["langkah"] ?>
            </p>
          </div>
        <?php } ?>
      </div>
      <!-- Akhir Cara Membuat -->

      <!-- Cooksnap -->
      <div class="row border shadow-lg m-0 mb-3 bg-body rounded" id="cooksnap-section">
        <div class="d-flex">
          <svg class="mt-3" xmlns="http://www.w3.org/2000/svg" width="24" height="29" fill="none" viewBox="0 0 24 24"
            class="mr-sm mise-icon mise-icon-cooksnap">
            <path stroke="currentColor" stroke-width="1.5"
              d="M18 21H6a4 4 0 0 1-4-4V8a2 2 0 0 1 2-2h1.93a2 2 0 0 0 1.664-.89l.812-1.22A2 2 0 0 1 10.07 3h3.86a2 2 0 0 1 1.664.89l.812 1.22A2 2 0 0 0 18.07 6H20a2 2 0 0 1 2 2v9a4 4 0 0 1-4 4Z">
            </path>
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="m7.727 13.049 3.892 4.054a.528.528 0 0 0 .762 0l3.892-4.055a2.597 2.597 0 1 0-3.746-3.597L12 10l-.527-.549a2.597 2.597 0 1 0-3.746 3.598Z">
            </path>
          </svg>
          <div class="mt-3 fs-5 ms-3  fw-semibold">
            <?php
            $ck = count($cooksnap);
            ?>
            <p>Cooksnap (
              <?= $ck ?>)
            </p>
          </div>
        </div>
        <div class="d-flex p-3 mb-3 flex-wrap">
          <?php
          if ($ck == 0) { ?>
            <p class="me-3">Apakah kamu sudah membuat resep ini? Bagikan foto hasil kreasimu!</p>
            <?php
          } else {
            foreach ($cooksnap as $cooksnap) {
              $batasan = 10;
              $komentar_cs = mb_substr($cooksnap["komentar"], 0, $batasan, 'UTF-8');
              // var_dump($komentar);
              if (strlen($komentar_cs) == 10) {
                $komen = $komentar_cs . "..";
              } else {
                $komen = $komentar_cs;
              }
              ?>
              <div class="d-flex card mx-1 mb-3" style="width: 10rem;">
                <img src="gambar/<?= $cooksnap["cooksnap_image"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <p class="card-title">
                    @
                    <?= $cooksnap["id_cookpad"] ?>
                  </p>
                  <p class="card-text">
                    <?= $komen ?>
                  </p>
                </div>
              </div>

            <?php }
          }
          ?>


        </div>
        <?php
        if (isset($_POST["cooksnap"])) {
          tambah_cooksnap($_POST);
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="rid" value="<?= $resep["resep_id"] ?>">
          <div class="d-flex justify-content-center mb-3">
            <label for="cooksnap" class="btn btn-secondary btn-md mb-1">Kirim Foto Cooksnap</label> <br>
          </div>
          <div class="d-flex justify-content-center mb-3 ms-5">
            <input type="file" name="gambar" id="cooksnap" class="ms-4">
          </div>
          <div class="d-flex justify-content-center mb-3">
            <div class="comment-box border rounded-pill flex-grow-1 ms-2">
              <div class="comment-input d-flex">
                <textarea class="form-control border-0 flex-grow-1" rows="2" name="cerita"
                  placeholder="Tambahkan cerita cooksnapmu"></textarea>
                <button type="submit" name="cooksnap" class="btn btn-white">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    class="text-cookpad-24 mise-icon mise-icon-send">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="m7 12-4 8 18-8L3 4l4 8Zm0 0h5"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Akhir Cooksnap -->

      <!-- Komentar -->
      <div class="row border shadow-lg m-0 mb-3 bg-body rounded">
        <div class="d-flex mb-2">
          <svg class="mt-3" xmlns="http://www.w3.org/2000/svg" width="24" height="35" fill="none" viewBox="0 0 24 24"
            class="mr-sm mise-icon mise-icon-comment">
            <path stroke="currentColor" stroke-width="1.5"
              d="M16 4H8a4 4 0 0 0-4 4v4.8a4 4 0 0 0 4 4h7.143a4 4 0 0 1 2.829 1.172l1.516 1.516a.3.3 0 0 0 .512-.212V8a4 4 0 0 0-4-4Z">
            </path>
          </svg>
          <div class="mt-3 fs-5 ms-3 fw-semibold">
            <p>Komentar</p>
          </div>
        </div>

        <?php foreach ($komentar as $komentar) { ?>

          <div id="komentar">
            <div class="">
              <img <?php
              $g = $komentar['profil_image'];
              $gambar = "gambar/$g";
              // var_dump($gambar);
              if (empty($g) || !file_exists($gambar)) { ?> src="asset/img/profil.png" <?php } else { ?>
                  src="gambar/<?= $komentar["profil_image"] ?>" <?php } ?> alt="tes" title="tes" class="rounded-circle"
                width="32" height="32">
              <div class="flex flex-col">
                <a href="" class="text-decoration-none">
                  <span class="text-dark">
                    <?= $komentar["username"] ?>
                  </span>
                  <span class="text-dark">@
                    <?= $komentar["id_cookpad"] ?>
                  </span>
                </a>
                <div class="">
                  <?php
                  $waktu = waktu($komentar["tanggal_dibuat"]);
                  ?>
                  <time>
                    <?= $waktu ?>
                  </time>
                  </a>
                  <p>
                    <?= $komentar["komentar"] ?>
                  </p>
                </div>
              </div>
            </div>
            <hr>
          </div>

        <?php } ?>
        <?php
        $uid = $_SESSION["id_user"];
        $user = tampilkan("SELECT * from user where user_id = $uid")[0];
        ?>

        <div class="d-flex mb-3">
          <div class="rounded-circle overflow-hidden" style="width: 40px; height: 40px;">
            <img class="w-100 h-100 rounded-circle" <?php if (empty($user["profil_image"])) { ?>
                src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $user['profil_image'] ?>" <?php } ?>>
          </div>
          <div class="comment-box border rounded-pill flex-grow-1 ms-2">

            <form action="" method="post">
              <div class="comment-input d-flex">
                <input type="hidden" name="resep_id" value="<?= $resep["resep_id"] ?>">
                <textarea class="form-control border-0 flex-grow-1" name="komentar" style="height: 40px;"
                  placeholder="Beri Komentar"></textarea>
                <button class="btn btn-white" type="submit" name="submit_komen">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                    class="text-cookpad-24 mise-icon mise-icon-send">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="m7 12-4 8 18-8L3 4l4 8Zm0 0h5"></path>
                  </svg>
                </button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <!-- Komentar -->

      <!-- Ditulis Oleh -->
      <div class="row border shadow-lg m-0 mb-3 bg-body rounded">
        <div class="mt-3 fs-5 ms-1 fw-semibold">
          <p>Ditulis Oleh</p>
        </div>
        <div class="d-flex mb-3">
          <div class="me-2 mt-2">
            <a href="">
              <img style="width: 96px; height: 96px;" class="rounded-circle" <?php if (empty($resep["profil_image"])) { ?> src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $resep['profil_image'] ?>" <?php } ?>>
            </a>
          </div>
          <div>
            <a class="text-decoration-none text-reset" href="">
              <span class="d-flex ms-2 mt-1 fw-bold">
                <p>
                  <?= $resep["username"] ?>
                <p class="fw-normal ms-1">@
                  <?= $resep["id_cookpad"] ?>
                </p>
                </p>
              </span>
            </a>
            <?php
            $tanggal = date('d F Y', strtotime($resep["tanggalbuat"]));
            ?>
            <div class="ms-2 ">
              <p style="font-size: 10px;">Pada
                <?= $tanggal ?>
              </p>
            </div>
            <div class="ms-2">

            </div>
          </div>
        </div>
      </div>
      <!-- Akhir Ditulis Oleh -->
    </div>

    <!-- Akhir Bagian Kiri -->

    <!-- Bagian Kanan -->
    <div class="col-3 ms-3 border rounded shadow-lg bg-body align-self-start">
      <div class="row mt-3">
        <div class="mb-1">

          <?php
          $status = cek_bookmark($resep["resep_id"]);
          // var_dump($status);
          if (isset($_POST["bookmark"])) {
            bookmark($_POST);
          }
          if ($status == 0) { ?>
            <form action="" method="post">
              <input type="hidden" name="user_id" value="<?= $_SESSION["id_user"] ?>">
              <input type="hidden" name="resep_id" value="<?= $resep["resep_id"] ?>">
              <input type="hidden" name="status" value="1">
              <button type="submit" name="bookmark"
                class="btn btn-white border  text-warning fw-bold border-warning btn-md mb-1" style="width: 100%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"
                  class="mise-icon mise-icon-bookmark-unselected">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                    d="M15.833 18.333V7c0-1.867 0-2.8-.363-3.513a3.333 3.333 0 0 0-1.457-1.457c-.713-.363-1.647-.363-3.513-.363h-1c-1.867 0-2.8 0-3.514.363-.627.32-1.137.83-1.456 1.457C4.166 4.2 4.166 5.133 4.166 7v11.333l4.404-2.796c.518-.329.777-.493 1.056-.558.246-.056.502-.056.748 0 .278.065.537.23 1.055.558l4.404 2.796Z">
                  </path>
                </svg>
                Simpan Resep
              </button>
            </form>

          <?php // var_dump($status);
          } else { ?>
            <form action="" method="post">
              <input type="hidden" name="user_id" value="<?= $_SESSION["id_user"] ?>">
              <input type="hidden" name="resep_id" value="<?= $resep["resep_id"] ?>">
              <input type="hidden" name="status" value="2">
              <button type="submit" name="bookmark"
                class="btn btn-white border  text-warning fw-bold border-warning btn-md mb-1" style="width: 100%;">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 20 20"
                  class="mise-icon mise-icon-bookmark-selected">
                  <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="1.3"
                    d="M15.833 18.333V7c0-1.867 0-2.8-.363-3.513a3.333 3.333 0 0 0-1.457-1.457c-.713-.363-1.646-.363-3.513-.363h-1c-1.867 0-2.8 0-3.513.363-.628.32-1.138.83-1.457 1.457C4.167 4.2 4.167 5.133 4.167 7v11.333l4.404-2.796c.518-.329.777-.493 1.055-.557.246-.057.502-.057.748 0 .278.064.537.228 1.055.557l4.404 2.796Z">
                  </path>
                </svg>
                Tersimpan
              </button>
            </form>
          <?php }
          ?>
        </div>
        <?php
        if (isset($_POST['hapus_resep'])) {

          hapusresep($_POST);
          //insiasi variabel untuk menampung isian id
          // $id = $_POST['resep_id'];
        }
        ?>
        <?php
        if ($_SESSION["id_user"] == $resep["user_id"]) { ?>
          <div class="mb-1">
            <a href="index.php?p=edit_resep&idr=<?= $resep["resep_id"] ?>"
              class="btn btn-white border  text-dark fw-bold border btn-md mb-1" style="width: 100%;">edit resep</a>
          </div>
          <div class="mb-1">
            <form action="" onsubmit="return confirm('anda yakin mau menghapus resep?');" method="post">
              <input type="hidden" name="resep_id" value="<?= $resep["resep_id"] ?>">
              <button name="hapus_resep" class="btn btn-white border  text-dark fw-bold border btn-md mb-1" style="width: 100%;">Hapus
                resep</button>
            </form>
          </div>
        <?php } ?>
        <div class="d-flex mb-1">
          <a href="#cooksnap-section" class="btn btn-white border  text-dark fw-bold border btn-md mb-1"
            style="width: 83%;">Kirim Foto Cooksnap</a>
          <div class="ms-3">
            <a href="" class="btn btn-white border  text-dark fw-bold border btn-md mb-1" style="width: auto;">...</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Bagian Kanan -->
  </div>
</div>

<!-- Body End -->