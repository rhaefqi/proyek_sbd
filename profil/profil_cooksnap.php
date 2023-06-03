<?php
    require_once "function.php";

    $uid = $_SESSION["id_user"];
    $cooksnap = tampilkan("SELECT cooksnap.*, resep.resep_id from cooksnap join resep on cooksnap.resep_id = resep.resep_id where cooksnap.user_id = $uid");
    $hitung = count($cooksnap);
?>

<div>
    <p>
        <b>jumlah (<?= $hitung ?>)</b>
    </p>
    <hr>
    <div class="row row-cols-1 row-cols-md-4 g-4">

        <?php foreach ($cooksnap as $cooksnap): ?>

            <a href="index.php?p=detail_resep&idr=<?= $cooksnap['resep_id'] ?>" class="text-decoration-none">
                <div class="card">
                    <img class="card-img" <?php
                    $g = $cooksnap['cooksnap_image'];
                    $gambar = "gambar/$g";
                    if (file_exists($gambar)) { ?> src="gambar/<?= $cooksnap['cooksnap_image'] ?>" <?php } else {
                        //
                    } ?> alt="...">
                    <div class="card-img-overlay">
                        <p class="card-text"><small>
                            <?php
                                $waktu = waktu($cooksnap['tanggal_dibuat']);
                            ?>
                                <?= $waktu ?>
                            </small></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $cooksnap['komentar'] ?>
                        </h5>
                        
                    </div>
                </div>
            </a>

        <?php endforeach ?>
    </div>
</div>