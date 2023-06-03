<?php
  require_once "function.php";

  if (isset($_POST["edit_cookbook"])) {
    editcookbook($_POST);
  }
  $idcb = $_GET["idcb"];
  $cookbook = tampilkan("SELECT * from cookbook where cookbook_id = $idcb")[0];
?>
<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container">
    <br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8 card">
        <div class="card-body">
          <br>
          <div class="text-center">
            <img src="asset/img/buat.svg" alt="" width="30%">
            <br><br>
            <h4><b>Tulis Catatan Masakmu</b></h4>
            <p>Bantu pengguna lain mendapatkan ide memasak</p>
            <br><br>
          </div>

          <form action="" method="post">
            <input type="hidden" name="idcb" value="<?= $cookbook["cookbook_id"] ?>">
            <!-- publik or privat -->
            <!-- nama cookbook -->
            <label for="namacookbook" style="font-size: 20px; font-weight: bold;">Nama Cookbook</label>
            <input id="namacookbook" class="form-control" type="text" placeholder="Inspirasi Bekal Anak" name="nama_cookbook" value="<?= $cookbook["judul"] ?>">
            <br>

            <!-- deskripsi cookbook -->
            <label for="desccookbook" style="font-size: 20px; font-weight: bold;">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="desccookbook" rows="10" 
              placeholder="Apa isi cookbook ini? "><?= $cookbook["excerpt"] ?></textarea>
            <br>

            <div class="d-flex justify-content-center">
              <button type="submit" name="edit_cookbook" class="btn btn-cookpad text-center"
                style="width: 200px;"><b>edit Cookbook!</b></button>
            </div>
          </form>
          <br>
        </div>

      </div>

      <div class="col-2"></div>

    </div>
  </div>
  <br><br>
</div>

<!-- Body End -->