<?php
// session_start();
if (isset($_SESSION["hasil_cari"])) {
  $hasil = $_SESSION["hasil_cari"];
  // echo"<pre>";
  // var_dump($hasil["keyword"]);
  // echo"</pre>";
  // if ($_SERVER["HTTP_REFERER"] && strpos($_SERVER["HTTP_REFERER"], "index.php?p=hasil_cari") === false) {
  unset($_SESSION["hasil_cari"]);
  // }
} else {
  header("Location: index.php");
}

?>
<!-- Body -->

<div class="container">
  <div class="mt-3 ms-3"></div>
  <div class="row justify-content-center">
    <!-- Tambah Bahan Dan Filter -->
    <!-- <div class="col-4 border me-3 shadow-lg p-3 mb-5 bg-body rounded align-self-start">
      <div class="row">
        <p class="fw-bold mt-3">Tambah Bahan</p>

        <span class="mb-3">
          <form action="" method="post">
            <div aria-label="Basic checkbox toggle button group">
              <input type="checkbox" class="btn-check" name="kentang" onchange="this.form.submit()" id="btncheck1" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck1">kentang</label>

              <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck2">Bahan 2</label>

              <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck3">Bahan 3</label>

              <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck4">Bahan 4</label>
              <br><br>
              <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck5">Bahan 5</label>

              <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck6">Bahan 6</label>

              <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off">
              <label class="btn btn-outline-secondary" for="btncheck7">Bahan 7</label>
            </div>
          </form>
        </span>

      </div>
    </div> -->
    <!-- Akhir Tambah Bahan dan Filter -->

    <!-- Hasil Pencarian -->
    <div class="col-6 ">
      <p>
        Resep
        <?= $hasil["keyword"] ?>
      </p>
      <hr>


      <?php
      $resep = $hasil["resep"];
      // $tips = $hasil["tips"];
      $cookbook = $hasil["cookbook"];
      $user = $hasil["user"]; ?>

      <?php foreach ($resep as $resep): ?>
        <div class="row">
          <div class="card border shadow-lg  mb-2 bg-body rounded">
            <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>" class="text-decoration-none text-black">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div>
                      <p class="fw-bold mt-3">
                        <?= $resep["judul"] ?>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <p class="card-text">Bahan - Bahan</p>
                      <span class="text-sm">
                        <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="none"
                          viewBox="0 0 16 16" class="mise-icon mise-icon-time">
                          <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="1.3"></circle>
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                            d="M8 5.333V8l2 1.334"></path>
                        </svg>
                        <?= $resep["lama_memasak"] ?>
                      </span> &nbsp;
                      <span class="text-sm">
                        <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="19" fill="none"
                          viewBox="0 0 16 16" class="mise-icon mise-icon-user">
                          <circle cx="8" cy="4.667" r="2.667" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="1.3"></circle>
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                            d="M10 9.333H6A2.667 2.667 0 0 0 3.333 12c0 .736.597 1.333 1.334 1.333h6.666c.737 0 1.334-.597 1.334-1.333A2.667 2.667 0 0 0 10 9.333Z">
                          </path>
                        </svg>
                        <?= $resep["porsi"] ?> Orang
                      </span>
                    </div>
                  </div>
                  <div class="row border-top ">
                    <p class="fw-bold mt-3">
                      <?= $resep["username"] ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <img src="gambar/<?= $resep["image"] ?>" width="100%" class="card-img-top" alt="Gambar">
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach ?>
      <div class="mt-3">
        <p>
          Cookbook terkait
        </p>
      </div>
      <hr>

      <div class="row">
        <?php foreach ($cookbook as $cookbook):
          ?>
          <div class="col-md-3">
            <div class="card" style="width: 10rem;">
              <a href="index.php?p=cookbook&idcb=<?= $cookbook["cookbook_id"] ?>">
                <img src="asset/img/lpcb1.jpg" class="card-img" alt="...">
              </a>
              <div class="card-body">
                <p class="card-title">
                  <?= $cookbook["judul"] ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

      <div class="mt-5">
        <p>
          User dengan nama
          <?= $hasil["keyword"] ?>
        </p>
      </div>
      <hr>
      <?php foreach ($user as $user): ?>

        <div class="row">
          <div class="card border shadow-lg  mb-2 bg-body rounded">
            <a href="index.php?p=detail_profil&idu=<?= $user["user_id"] ?>" class="text-decoration-none text-black">
              <div class="row">
                <div class="col-md-8">
                  <div class="row">
                    <div>
                      <p class="fw-bold mt-3">
                        <?= $user["username"] ?>
                        @
                        <?= $user["id_cookpad"] ?>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="card-body">
                      <p class="card-text">
                        <?= $user["deskripsi"] ?>
                      </p>
                    </div>
                  </div>
                  <div class="row">
                    <p class="fw-bold mt-3">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"
                        class="mise-icon mise-icon-pin">
                        <circle cx="8" cy="6.667" r="2" stroke="currentColor" stroke-linecap="round"
                          stroke-linejoin="round" stroke-width="1.3"></circle>
                        <path fill="currentColor"
                          d="m8 14.667-.362.54a.65.65 0 0 0 .724 0L8 14.667Zm4.017-7.506c0 1.959-1.05 3.687-2.172 4.966A13.526 13.526 0 0 1 7.815 14l-.136.098-.033.023-.007.005-.001.001.362.54.362.54v-.001h.002l.004-.003.013-.01a12.854 12.854 0 0 0 .762-.583c.457-.377 1.067-.929 1.679-1.626 1.21-1.379 2.495-3.404 2.495-5.823h-1.3ZM8 14.667l.362-.54-.008-.006-.033-.023a11.542 11.542 0 0 1-.636-.49c-.418-.345-.975-.849-1.53-1.481-1.123-1.28-2.172-3.007-2.172-4.966h-1.3c0 2.419 1.285 4.444 2.495 5.823a14.828 14.828 0 0 0 2.236 2.063 8.352 8.352 0 0 0 .205.147l.013.008.004.003.001.001.363-.54ZM3.983 7.16c0-1.566.527-2.682 1.264-3.407A3.915 3.915 0 0 1 8 2.65c1.01 0 2.008.372 2.753 1.104.737.725 1.264 1.841 1.264 3.407h1.3c0-1.875-.64-3.34-1.653-4.334A5.215 5.215 0 0 0 8 1.35a5.215 5.215 0 0 0-3.664 1.477c-1.013.995-1.653 2.458-1.653 4.334h1.3Z">
                        </path>
                      </svg>
                      <?= $user["asal"] ?>
                    </p>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- <img src="asset/img/profil.png ?>" width="100%" class="rounded-circle" alt="Gambar"> -->
                  <img alt="profil" class="rounded-circle" <?php if (empty($user["profil_image"])) { ?>
                      src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $user['profil_image'] ?>" <?php } ?>
                    width="160px" height="160px">
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php endforeach ?>



    </div>
  </div>
</div>
</div>

<!-- Akhir Hasil Pencarian -->