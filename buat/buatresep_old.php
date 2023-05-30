<?php
    require_once "../function.php";
    if (isset($_POST["submit"])) {
        tambahresep($_POST);
    }
    var_dump($_SESSION)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../asset/css/tambahan.css">
    <link rel="stylesheet" href="../asset/icon/css/font-awesome.min.css" />
    <!-- <script src="../asset/js/jquery.min.js"></script> -->
    <script>
        function copyBahan() {
            $("#form-bahan")
                .clone()
                .appendTo($("#form-bahan-dinamis"))
        }
        function copyLangkah() {
            $("#form-langkah")
                .clone()
                .appendTo($("#form-langkah-dinamis"))
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <form method="POST" enctype="multipart/form-data">
            <h1>Buat resep</h1>
            <hr>
            <div class="form-group">
                <label for="gambarResep">Bagikan gambar masakanmu</label>
                <input type="file" class="form-control" name="gambar" id="gambar" placeholder="Bagikan gambarmu">
            </div>
            <div class="form-group">
                <label for="resep">Judul</label>
                <input type="text" class="form-control" id="judulResep" name="judulResep" placeholder="Masukan Judul">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi"
                    placeholder="Cerita dibalik masakan ini. atau siapa yang menginspirasi mu?">
            </div>
            <div class="form-group">
                <label for="asal">Asal masakan</label>
                <input type="text" class="form-control" id="asal" name="asal" placeholder="Asal masakanmu">
            </div>
            <div class="form-group">
                <label for="porsi">Porsi</label>
                <input type="number" class="form-control" id="porsi" name="porsi"
                    placeholder="Masakan ini untuk berapa orang?">
            </div>
            <div class="form-group">
                <label for="lamaMemasak">Lama Memasak</label>
                <input type="text" class="form-control" id="lamaMemasak" name="lamaMemasak"
                    placeholder="1 jam 30 menit">
            </div>

            <div class="form-group mb-2" id="form-bahan">
                <label for="bahan">Bahan-bahan</label>
                <input type="text" class="form-control" name="bahan[]" id="bahan" placeholder="Masukan Bahan">
            </div>

            <div id="form-bahan-dinamis" class="mb-2">

            </div>

            <button type="button" class="btn btn-primary" onclick="copyBahan()">tambah Bahan</button>

            <div class="form-group mb-2" id="form-langkah">
                <div class="form-group mb-2">
                    <label for="langkah">Langkah-langkah</label>
                    <input type="text" class="form-control" id="langkah" name="langkah[]" placeholder="Masukan Langkah">
                </div>
                <div class="form-group mb-2">
                    <label for="gambar_langkah">Gambar</label>
                    
                    <input type="file" class="form-control" id="gambar_langkah" name="gambar_langkah[]"
                        placeholder="Masukan gambar">
                </div>
            </div>


            <div id="form-langkah-dinamis" class="mb-2">

            </div>

            <button type="button" class="btn btn-primary" onclick="copyLangkah()">tambah Langkah</button>

            <div class="container mb-3 mt-3 d-flex">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="label1">
                    <label for="label1" class="form-check-label">Ayam</label> &nbsp;
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="label2">
                    <label for="label2" class="form-check-label">Sapi</label> &nbsp;
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="label3">
                    <label for="label3" class="form-check-label">Udang</label> &nbsp;
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="label4">
                    <label for="label4" class="form-check-label">Kambing</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            <a href="buat.php" class="btn btn-warning">kembali</a>
        </form>
    </div>

    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery.js"></script>
</body>

</html>