<?php
    require_once "./function.php";
    $idcb = $_GET["idcb"];

    $result = tampilkan("SELECT * FROM cookbook WHERE cookbook.cookbook_id = '$idcb' ")[0] ;

    echo "<pre>";
    var_dump($result);
    echo "</pre>";
?>

<div class="container">
    <div class="container-fluid">
        <center class="mb-5">
            <h1><?= $result["judul"] ?></h1>
            <h4><?= $result["excerpt"] ?></h4>
        </center>
        <div class="div">

            resep-resep : <br>
            <center>
                <a href="" class="btn btn-warning">tambah resep</a>
            </center>

        </div>
    </div>
    <br><br>
    <a href="" class="btn btn-primary">kembali</a>
</div>

