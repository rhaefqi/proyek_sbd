<?php
require_once "function.php";
if (isset($_POST["buat_tips"])) {
  tambahtips($_POST);
}
// var_dump($_SESSION)
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
            <div class="card-body">
              <input class="form-control" type="text" name="judul_tips"
                placeholder="Judul : Cara memotong bawang bombay" style="font-size: 25px; font-weight: bold;">
              <br>

              <div class="tipsadd" id="form-asli">
                <textarea class="form-control" name="langkah[]" id="langkah" rows="4"
                  placeholder="Mis : Untuk memotong bawang bombay, mulailah dengan membelah bawang jadi dua dari arah atas ke bawah..."></textarea>
                <br>
                <div id="imageContainer">
                  <input type="file" name="gambar_langkah[]" id="gambar_langkah">
                  <!-- <img id="uploadedImage" src="../asset/img/img2.png" alt="" width="100%"> -->
                </div>
                <hr>

                <br>
              </div>

              <div id="form-dinamis">

              </div>


              <div>
                <button class="btn btn-light" type="button" onclick="copyForm()"> + Langkah</button>
              </div>
              <br>

            </div>
            <div class="col-2"></div>
            <center class="mt-4 mb-3">
              <a href="index.php?p=buat" class="btn btn-secondary">Kembali</a>
              <button type="submit" name="buat_tips" class="btn btn-cookpad">Terbitkan</button>
            </center>
          </form>
        </div>

      </div>
      <br><br>
    </div>

    <!-- Body End -->

    <script>
      function copyForm() {
        $("#form-asli")
          .clone()
          .appendTo($("#form-dinamis"))
      }
    </script>
