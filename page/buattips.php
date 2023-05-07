<?php
    require_once "../function.php";
    if (isset($_POST["submit"])) {
        tambahtips($_POST);
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
    <script src="../asset/js/jquery.min.js"></script>
    <script>
        function copyForm() {
            $("#form-asli")
                .clone()
                .appendTo($("#form-dinamis"))
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <form class="mb-3" method="POST" enctype="multipart/form-data" >
            <h1>Buat Tips</h1>
            <hr>
            <div class="form-group">
                <label for="judul_tips">Judul</label>
                <input type="text" class="form-control" id="judul_tips" name="judul_tips" placeholder="Masukan judul">
            </div>
            <div id="form-asli">
                <fieldset class="border rounded mt-2 mb-2">
                    <legend class="mb-1 mt-0 h5">Langkah-langkah</legend>
                    <div class="form-group">
                        <label for="gambar_langkah">gambar langkah</label>
                        <input type="file" class="form-control" id="gambar_langkah" placeholder="Bagikan gambarmu"
                            name="gambar_langkah[]">
                    </div>
                    <div class="form-group">
                        <label for="langkah">Langkah-langkah</label>
                        <input type="text" class="form-control" id="langkah" name="langkah[]">
                    </div>
                </fieldset>
            </div>
            <div id="form-dinamis">

            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a href="buat.php" class="btn btn-warning">kembali</a>
        </form>
        <button type="button" class="btn btn-primary" onclick="copyForm()">tambah Langkah</button>
    </div>


    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery.js"></script>
</body>

</html>