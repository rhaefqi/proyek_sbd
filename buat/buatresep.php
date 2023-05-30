<?php
    require_once "function.php";
    if (isset($_POST["submit"])) {
        tambahresep($_POST);
    }
    // var_dump($_SESSION)
?>

  <!-- Body Starts -->

  <div style="background-color: #f8f6f2;">
    <div class="row">
      <div class="col"></div>
      <div class="col-8">
        <form method="POST" enctype="multipart/form-data">
          <!-- Tulis Catatan starts -->
          <div class="text-center">
            <br>
            <br>
            <div id="gambar-resep-container" class="center">
              <center>
                <label for="gambar" id="gambar">
                  <img src="asset/img/buat.svg">
                </label>
                <br>
              </center>
            </div>
            <br><br>
            <h4><b>Tambahkan Foto Resep</b></h4>
            <p>Tunjukkan foto hasil akhir masakanmu</p>
            <input type="file" name="gambar" id="gambar" class="ms-5">
            <br><br>
          </div>
          <!-- Tulis Catatan end -->

          <!-- Judul Start -->
          <div class="container">
            <div class="card">
              <div class="card-body">
                <input type="text" class="form-control" name="judulResep" id="judulResep" placeholder="Judul : Sup Ayam Favorit Keluarga"
                  style="font-size: 30px; font-weight: bold;">
              </div>
              <div class="card-body">
                <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi" style="font-size: 15px;"
                  placeholder="cerita dibalik masakan ini. Apa atau siapa yang menginspirasimu? APa yang membuatnya istimewa? bagaimana caramu menikmatinya?"></textarea>
                <input type="text" class="form-control" name="asal" id="asal" placeholder="Masukkan daerah asal resep">
              </div>
              <div class="card-body">
                <div class="row row-cols-2 g-2">
                  <div class="col">Porsi</div>
                  <div class="col">
                    <input type="number" class="form-control" name="porsi" id="porsi" placeholder="2 orang">
                  </div>
                  <div class="col">Lama Memasak</div>
                  <div class="col">
                    <input type="text" class="form-control" name="lamaMemasak" id="lamaMemasak" placeholder="1 Jam 30 Menit">
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- Judul End -->
          <br>
          <!-- Bahan start -->
          <div class="container">
            <div class="card">
              <div class="card-body">
                <h2><b>Bahan - Bahan</b></h2>
                <br>
                <!-- Bahan 1 -->
                <div id="bahanmasakan" class="bahanadd">
                  <div class="row d-flex justify-content-center">
                    <div class="col-1"><img class="drag-handle" src="asset/img/drag.png" alt="" width="50%"></div>
                    <div class="col-10">
                      <input type="text" class="form-control" name="bahan[]" id="bahan" placeholder="1/2 ekor ayam">
                    </div>
                    <div class="col-1">
                      <img src="asset/img/more.png" alt="" width="50%">
                    </div>
                  </div>
                  <br>
                </div>
                <!-- Bahan2 -->
                <div id="bahanmasakan" class="bahanadd">
                  <div class="row d-flex justify-content-center">
                    <div class="col-1"><img class="drag-handle" src="asset/img/drag.png" alt="" width="50%"></div>
                    <div class="col-10">
                      <input type="text" class="form-control" name="bahan[]" id="bahan" placeholder="2 Siung Bawang Putih">
                    </div>
                    <div class="col-1">
                      <img src="asset/img/more.png" alt="" width="50%">
                    </div>
                  </div>
                  <br>
                </div>
                <!-- Bahan 3 -->
                <div id="bahanmasakanlast" class="bahanadd">
                  <div class="row d-flex justify-content-center">
                    <div class="col-1"><img class="drag-handle" src="asset/img/drag.png" alt="" width="50%"></div>
                    <div class="col-10">
                      <input type="text" class="form-control" name="bahan[]" id="bahan" placeholder=". . .">
                    </div>
                    <div class="col-1">
                      <img src="asset/img/more.png" alt="" width="50%">
                    </div>
                  </div>
                  <br>
                </div>

                <div id="bahan-new" class="bahanadd">

                </div>
                <!-- Button -->
                <div class="d-flex justify-content-center">
                  <button type="button" class="btn btn-light" onclick="copyBahan()"> + Bahan</button>
                </div>

              </div>
            </div>
          </div>
          <!-- Bahan End -->
          <br>
          <!-- Langkah start -->
          <div class="container">
            <div class="card">
              <div class="card-body">
                <h2><b>Langkah</b></h2>
                <br>
                <!-- Langkah 1 -->
                <div id="langkah-old" class="langkahadd">
                  <div class="row g-2 row-cols-3 d-flex justify-content-center">
                    <div class="col-1" id="nomorlangkah">
                      <span class=" text-black" style="font-size: 24px;">
                        ◉
                      </span>
                    </div>
                    <div class="col-10">
                      <input type="text" class="form-control  " name="langkah[]" id="langkah" placeholder="Masukan Langkah">
                    </div>
                    <div class="col-1">
                      <img src="asset/img/more.png" alt="" width="50%">
                    </div>
                    <div class="col-1"></div>
                    <div class="col-10 ">
                      <!-- <div id="imageContainer"> -->
                      <p class="image_upload">
                        <input type="file" name="gambar_langkah[]" id="gambar_langkah">
                      </p>
                      <!-- <img id="uploadedImage" src="asset/img/img.png" alt="" width="200px"> -->
                      <!-- </div> -->
                    </div>
                    <div class="col-1"></div>
                  </div>
                  <br>
                  <br>
                </div>

                <div id="langkah-new">

                </div>

                <!-- button -->
                <!-- button -->
                <div class="d-flex justify-content-center">
                  <!-- <button type="" class="btn btn-light" onclick="tambahLangkah()"> + Langkah</button> -->
                  <button type="button" class="btn btn-light" onclick="copyLangkah()"> + Langkah</button>

                </div>
              </div>

            </div>
            <br>
            <!-- Label start -->
            <div class="card">
              <div class="card-body">
                <h2><b>Tambahkan Label</b></h2>
                <br>
                <div class="btn-sm" role="" aria-label="Basic checkbox toggle button group">
                  <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck1">Sarapan</label>

                  <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck2">Makan Siang</label>

                  <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck3">Makan Malam</label>

                  <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck4">Cemilan</label>

                  <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck5">Hidangan Utama</label>

                  <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                  <label class="btn btn-light btn-sm" for="btncheck6">Hidangan Penutup</label>
                </div>
              </div>
            </div>
            <!-- Label end -->
            <br>
            <center>
              <a href="index.php?p=buat" class="btn btn-secondary">Kembali</a>
              <button class="btn btn-cookpad" type="submit" name="submit">Terbitkan</button>
            </center>

          </div>
          <!-- Langkah End -->
          <br>

        </form>
      </div>
      <div class="col"></div>
    </div>
    <br><br>
  </div>

  <!-- Body End -->
  <script>
    function copyBahan() {
      $("#bahanmasakanlast")
        .clone()
        .appendTo($("#bahan-new"))
    }
    function copyLangkah() {
      $("#langkah-old")
        .clone()
        // console.log("#langkah-old")
        .appendTo($("#langkah-new"))
    }

  </script>
