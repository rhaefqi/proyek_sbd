<?php
require_once "function.php";
if (isset($_POST["edit_resep"])) {
    editresep($_POST);
}

$idr = $_GET["idr"];
// var_dump($_SESSION)
$resep = tampilkan("SELECT * from resep where resep_id = $idr")[0];
$langkah = tampilkan("SELECT * from langkah_resep where resep_id = $idr");
$bahan = tampilkan("SELECT * from bahan_resep where resep_id = $idr");
// var_dump($_SESSION)
?>

<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
    <div class="row">
        <div class="col"></div>
        <div class="col-8">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idr" value="<?= $resep["resep_id"] ?>">
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
                    <img src="gambar/<?= $resep['image'] ?>" alt="" style="width: 70%;" class="mb-2">
                    <input type="file" name="gambar" id="gambar" class="ms-5">
                    <input type="hidden" name="gambar_utama_lama" value="<?= $resep["image"] ?>">
                    <br><br>
                </div>
                <!-- Tulis Catatan end -->

                <!-- Judul Start -->
                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <input type="text" class="form-control" name="judulResep" id="judulResep"
                                placeholder="Judul : Sup Ayam Favorit Keluarga" value="<?= $resep["judul"] ?>"
                                style="font-size: 30px; font-weight: bold;">
                        </div>
                        <div class="card-body">
                            <textarea class="form-control" rows="5" name="deskripsi" id="deskripsi"
                                style="font-size: 15px;"
                                placeholder="cerita dibalik masakan ini. Apa atau siapa yang menginspirasimu? APa yang membuatnya istimewa? bagaimana caramu menikmatinya?"><?= $resep["excerpt"] ?></textarea>
                            <input type="text" class="form-control" name="asal" id="asal"
                                value="<?= $resep["asal_masakan"] ?>" placeholder="Masukkan daerah asal resep">
                        </div>
                        <div class="card-body">
                            <div class="row row-cols-2 g-2">
                                <div class="col">Porsi</div>
                                <div class="col">
                                    <input type="number" class="form-control" name="porsi" id="porsi"
                                        value="<?= $resep["porsi"] ?>" placeholder="2 orang">
                                </div>
                                <div class="col">Lama Memasak</div>
                                <div class="col">
                                    <input type="text" class="form-control" name="lamaMemasak" id="lamaMemasak"
                                        value="<?= $resep["lama_memasak"] ?>" placeholder="1 Jam 30 Menit">
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
                            <?php foreach ($bahan as $bahan): ?>
                                <div id="bahanmasakan" class="bahanadd">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-1"><img class="drag-handle" src="asset/img/drag.png" alt=""
                                                width="50%"></div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="bahan[]" id="bahan "
                                                value="<?= $bahan["bahan"] ?>" placeholder="1/2 ekor ayam">
                                        </div>
                                        <div class="col-1">
                                            <img src="asset/img/more.png" alt="" width="50%">
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <?php endforeach ?>
                            <!-- Bahan2 -->

                            <!-- Bahan 3 -->


                            <div id="bahan-new" class="bahanadd">

                            </div>
                            <!-- Button -->

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
                            <?php foreach ($langkah as $langkah): ?>
                                <div id="langkah-old" class="langkahadd">
                                    <div class="row g-2 row-cols-3 d-flex justify-content-center">
                                        <div class="col-1" id="nomorlangkah">
                                            <span class=" text-black" style="font-size: 24px;">
                                                ◉
                                            </span>
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control  " name="langkah[]" id="langkah"
                                                value="<?= $langkah["langkah"] ?>" placeholder="Masukan Langkah">
                                        </div>
                                        <div class="col-1">
                                            <img src="asset/img/more.png" alt="" width="50%">
                                        </div>
                                        <div class="col-1"></div>
                                        <div class="col-10 ">
                                            <!-- <div id="imageContainer"> -->
                                            <p class="image_upload">
                                                <input type="hidden" name="gambar_lama[]"
                                                    value="<?= $langkah['gambar_langkah'] ?>">
                                                <img src="gambar/<?= $langkah['gambar_langkah'] ?>" alt=""
                                                    style="width: 70%;" class="mb-2">
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
                            <?php endforeach ?>


                            <!-- button -->
                            <!-- button -->

                        </div>

                    </div>
                    <br>
                    <!-- Label start -->
                    <!-- Label end -->
                    <br>
                    <center>
                        <a href="index.php?p=buat" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-cookpad" type="submit" name="edit_resep">edit</button>
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