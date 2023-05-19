<?php
    require_once "./function.php";
    $idcb = $_GET["idcb"];

    $result = tampilkan("SELECT cookbook.cookbook_id, cookbook.judul, cookbook.excerpt, user.username FROM cookbook LEFT JOIN user on cookbook.user_id=user.user_id WHERE cookbook.cookbook_id = '$idcb' ")[0] ;

    echo "<pre>";
    var_dump($result);
    echo "</pre>";
?>

<div class="container">
    <div class="container-fluid">
        pemilik :
        <?= $result["username"] ?>
        <center>
            <h1><?= $result["judul"] ?></h1>
            <h4><?= $result["excerpt"] ?></h4>
        </center>
        <div class="div">
            resep-resep : <br>

        </div>
    </div>
    <a href="" class="btn btn-primary">kembali</a>
</div>

