<?php
require_once "function.php";
if (isset($_POST["edit_tips"])) {
  edittips($_POST);
}
$idt = $_GET["idt"];
// var_dump($_SESSION)
$tips = tampilkan("SELECT * from tips where tips_id = $idt")[0];
$langkah = tampilkan("SELECT * from langkah_tips where tips_id = $idt")
  ?>
<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container">
    <br>
    <div class="row">
      <div class="col-2">

      </div>
      <div class="col-8 card">

        <form action="" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="idt" value="<?= $idt ?>">
          <div class="card-body">
            <input class="form-control" type="text" name="judul_tips" value="<?= $tips["judul"] ?>"
              placeholder="Judul : Cara memotong bawang bombay" style="font-size: 25px; font-weight: bold;">
            <br>
            <?php foreach ($langkah as $langkah): ?>

              <div class="tipsadd" id="form">
                <textarea class="form-control" name="langkah[]" id="langkah" rows="4"
                  placeholder="Mis : Untuk memotong bawang bombay, mulailah dengan membelah bawang jadi dua dari arah atas ke bawah..."><?= $langkah["langkah"] ?></textarea>
                <br>
                <div id="imageContainer">
                  <input type="hidden" name="gambar_lama[]" value="<?= $langkah['gambar_langkah'] ?>">
                  <img src="gambar/<?= $langkah['gambar_langkah'] ?>" alt="" style="width: 70%;" class="mb-2">
                  <input type="file" name="gambar_langkah[]" id="gambar_langkah">
                  <!-- <img id="uploadedImage" src="../asset/img/img2.png" alt="" width="100%"> -->
                </div>
                <hr>

                <br>
              </div>
            <?php endforeach ?>

            <div id="form-dinamis">

            </div>

            <br>

          </div>
          <div class="col-2"></div>
          <center class="mt-4 mb-3">
            <!-- <a href="index.php?p=buat" class="btn btn-secondary">Kembali</a> -->
            <button type="submit" name="edit_tips" class="btn btn-cookpad">Edit</button>
          </center>
        </form>
      </div>

    </div>
    <br><br>
  </div>

  <!-- Body End -->

  <script>
    function copyForm() {
      // $("#form-asli")

      //   .clone()
      //   .appendTo($("#form-dinamis"))
      const formAsli = document.querySelector("#form-asli");
      const formDinamis = document.querySelector("#form-dinamis");

      const copy = formAsli.cloneNode(true);
      copy.classList.remove("d-none");

      formDinamis.appendChild(copy);
    }
  </script>