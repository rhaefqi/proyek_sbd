<?php
require_once "./function.php";

$id = $_SESSION["id_user"];
$resep = tampilkan("SELECT * FROM resep where user_id = '$id'");
$jumlah = count($resep);
$user = tampilkan("SELECT * from user where user_id = $id")[0];
// echo "<pre>";
// var_dump($jumlah);
// echo "</pre>";
?>


<div class="row">
    <div class="col">
        <p><b>
                <?= $jumlah ?> Resep
            </b></p>
    </div>
</div>

<hr>

<?php
foreach ($resep as $resep) {

    ?>
    <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>" class="text-decoration-none text-dark">
        <div class="row">
            <div class="col-9">
                <div class="row">
                    <div class="col-10">
                        <p>
                            <img alt="profil" class="rounded-circle" <?php if (empty($user["profil_image"])) { ?>
                                    src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $user['profil_image'] ?>"
                                <?php } ?> style="width: 30px; height: 30px;"> &nbsp;
                            <b>
                                <?= $user["username"] ?>
                            </b>
                        </p>
                    </div>
                </div>

                <div>
                    <h3><b>
                            <?= $resep["judul"] ?>
                        </b>
                    </h3>
                    <?php
                    $id = $resep["resep_id"];
                    $bahan = tampilkan("SELECT bahan from bahan_resep where resep_id = $id");
                    // echo '<pre>';
                    // var_dump($bahan);
                    // echo '</pre>';
                    ?>
                    <p>
                        <?php
                        foreach ($bahan as $bahan) {
                            echo $bahan["bahan"];
                            echo " • ";
                        }
                        ?>
                    </p>

                    <p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"
                            class="mise-icon mise-icon-time">
                            <circle cx="8" cy="8" r="6" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="1.3"></circle>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M8 5.333V8l2 1.334"></path>
                        </svg>
                        <?= $resep["lama_memasak"] ?> &nbsp;
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 16 16"
                            class="mise-icon mise-icon-user">
                            <circle cx="8" cy="4.667" r="2.667" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.3"></circle>
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.3"
                                d="M10 9.333H6A2.667 2.667 0 0 0 3.333 12c0 .736.597 1.333 1.334 1.333h6.666c.737 0 1.334-.597 1.334-1.333A2.667 2.667 0 0 0 10 9.333Z">
                            </path>
                        </svg>
                        <?= $resep["porsi"] ?> orang
                    </p>
                </div>

            </div>
            <div class="col-3">
                <img src="gambar/<?= $resep["image"] ?>" alt="" width="90%">
            </div>
        </div>
    </a>
    <hr>
<?php } ?>