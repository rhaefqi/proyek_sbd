<?php
require_once "../function.php";
if (isset($_POST["submit"])) {
    tambahcookbook($_POST);
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
</head>

<body>
    <div class="container mt-5">
        <form class="mb-3" method="POST" enctype="multipart/form-data">
            <h1>Buat Cookbook</h1>
            <hr>
            <div class="form-group">
                <label for="nama_cookbook">Nama cookbook</label>
                <input type="text" class="form-control" id="nama_cookbook" name="nama_cookbook"
                    placeholder="Masukan Nama Cookbook">
            </div>
            <div class="form-group mb-2">
                <label for="deskripsi">Deskripsi Cookbook</label>
                <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Tuliskan deskripsi" >
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