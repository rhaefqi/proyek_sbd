<?php
$uid = $_SESSION["id_user"];
$user = tampilkan("SELECT * from user where user_id = $uid")[0];

if(isset($_POST["edit_profil"])){
  editprofil($_POST);
}
?>
<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="container" style="width: 60%;">
      <div class="container-fluid">

        <!-- Edit Photo Start -->
        <div class="card" style="border-radius: 1px;">

          <div class="row">

            <div class="col-4 d-flex align-items-center">
              <div class="p-3">
                <img alt="profil" class="rounded-circle" <?php if (empty($user["profil_image"])) { ?>
                    src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $user['profil_image'] ?>" <?php } ?>
                    style="width: 180px; height: 180px;">
              </div>
            </div>
            <div class="mb-2 mx-2">
              <input type="file" name="gambar">
            </div>

            <div class="col-6 ps-0">
            </div>

            <div class="col-2">
            </div>

          </div>
        </div>
        <br>
        <!-- Edit Photo End -->

        <!-- form edit nama start-->

        <label class="form-label" for="nama">
          <h5>Nama</h5>
        </label>
        <input id="nama" name="username" type="text" value="<?= $user["username"] ?>" class="form-control-plaintext">
        <hr>

        <label class="form-label" for="id_cookpad">
          <h5>id cookpad</h5>
        </label>
        <div class="row">
          <div class="col-10">
            <input id="id_cookpad" name="id_cookpad" type="text" value="<?= $user["id_cookpad"] ?>"
              class="form-control-plaintext">
          </div>
        </div>
        <hr>

        <label class="form-label" for="email">
          <h5>Email</h5>
        </label>
        <input id="email" name="email" type="text" value="<?= $user["email"] ?>" class="form-control-plaintext">
        <hr>

        <label class="form-label" for="lokasi">
          <h5>Lokasi</h5>
        </label>
        <input id="lokasi" name="asal" type="text" value="<?= $user["asal"] ?>" class="form-control-plaintext">
        <hr>

        <label class="form-label" for="AboutYou">
          <h5>Tentang Kamu dan Masakanmu</h5>
        </label>
        <input id="AboutYou" name="deskripsi" type="text" value="<?= $user["deskripsi"] ?>" class="form-control-plaintext">
        <hr>
        <br><br>

        <div class="d-flex justify-content-center">
          <button type="submit" name="edit_profil" class="btn btn-secondary" style="width: 45%;">Perbarui</button>
          &nbsp; &nbsp;
          <a href="index.php?p=profil" class="btn btn-light border" style="width: 45%;">Batal</a>
        </div>

        <!-- form edit nama end -->

      </div>
      <br>
  </form>
</div>

<!-- Body End -->