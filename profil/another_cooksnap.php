<?php
    require_once "function.php";

    $uid = $_GET["idu"];
    $cooksnap = tampilkan("SELECT cooksnap.*, resep.resep_id from cooksnap join resep on cooksnap.resep_id = resep.resep_id where cooksnap.user_id = $uid");
    $hitung = count($cooksnap);
?>


<!-- Tampilan resep start -->
<div class="row">
   
</div>
<hr>

<div>
    <!-- <div class="row"> -->
        <?php foreach ($cooksnap as $cooksnap): ?>

            <a href="index.php?p=detail_resep&idr=<?= $cooksnap['resep_id'] ?>" class="text-decoration-none text-dark">
                <!-- <div class="card"> -->
                    <img class="card-img" <?php
                    $g = $cooksnap['cooksnap_image'];
                    $gambar = "gambar/$g";
                    if (file_exists($gambar)) { ?> src="gambar/<?= $cooksnap['cooksnap_image'] ?>" <?php } else {
                        //
                    } ?> alt="..." style="width: 220px">
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
                <!-- </div> -->
            </a>

        <?php endforeach ?>
    <!-- </div> -->
</div>

<br> <br>

<!-- Tampilan resep end-->