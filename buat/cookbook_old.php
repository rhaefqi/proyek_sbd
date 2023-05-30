<?php
    require_once "./function.php";
    $idcb = $_GET["idcb"];

    $result = tampilkan("SELECT cookbook.cookbook_id, cookbook.judul, cookbook.excerpt, user.username FROM cookbook LEFT JOIN user on cookbook.user_id=user.user_id WHERE cookbook.cookbook_id = '$idcb' ")[0] ;
    $resep = tampilkan("SELECT * FROM resep WHERE resep_id IN(SELECT resep_id FROM resep_cookbook WHERE cookbook_id = '$idcb') ");
    echo "<pre>";
    var_dump($resep);
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
            <?php
            foreach ($resep as $resep) { ?>
                <?= $resep["judul"] ?><br>
            <?php }
            ?>
        </div>
        <br>
    </div>
    <a href="" class="btn btn-primary">kembali</a>
</div>

