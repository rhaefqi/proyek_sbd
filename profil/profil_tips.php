<?php
require_once "function.php";
$uid = $_SESSION["id_user"];
$tips = tampilkan("SELECT tips.*,langkah_tips.* from tips join langkah_tips on tips.tips_id = langkah_tips.tips_id where tips.user_id = $uid group by tips.tips_id");
$jumlah = count($tips);
?>
<div>
    <p>
        <b>jumlah (
            <?= $jumlah ?>)
        </b>
    </p>

    <div class="row row-cols-1 row-cols-md-4 g-4">

        <?php foreach ($tips as $tips): ?>

            <a href="index.php?p=detail_tips&idt=<?= $tips['tips_id'] ?>" class="text-decoration-none">
                <div class="card">
                    <img class="card-img" <?php
                    $g = $tips['gambar_langkah'];
                    $gambar = "gambar/$g";
                    if (file_exists($gambar)) { ?> src="gambar/<?= $tips['gambar_langkah'] ?>" <?php } else {
                        //
                    } ?> alt="...">
                    <div class="card-img-overlay">
                        <p class="card-text"><small>
                            <?php
                                $waktu = waktu($tips['tanggalbuat']);
                            ?>
                                <?= $waktu ?>
                            </small></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $tips['judul'] ?>
                        </h5>
                        
                    </div>
                </div>
            </a>

        <?php endforeach ?>

    </div>

</div>