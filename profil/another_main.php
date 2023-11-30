<!-- Resep user start-->
<?php
$id = $_GET["idu"];
$resep = tampilkan("SELECT * from resep where user_id = $id limit 3");
?>
<div class="card">
    <div class="card-body">

        <div class="row row-cols-1 row-cols-md-3 g-4">


            <?php foreach ($resep as $resep) {
                $waktu = waktu($resep["tanggalbuat"]);
                ?>
                <div class="col">
                    <div class="card">
                        <img class="card-img" src="gambar/<?= $resep["image"] ?>" alt="...">
                        <div class="card-img-overlay">
                            <p class="card-text"><small>
                                    <?= $waktu ?>
                                </small></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $resep["judul"] ?>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
        <br>
        <!-- button -->
        <!-- button -->
        <div>
            <a href="index.php?p=detail_profil&idu=<?= $id ?>&a=resep" class="btn btn-light border" style="width: 100%;">Lihat Semua Resep</a>
        </div>
    </div>

</div>
<!-- Resep user end-->

<!-- Cooksnap user start-->
<div class="card">
    <div class="card-body">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <?php
                        $cooksnapcek = tampilkan("SELECT * from cooksnap where user_id = $id");
                        $cooksnap = tampilkan("SELECT * from cooksnap where user_id = $id limit 2");
                        $count = count($cooksnapcek);
                        // var_dump($cooksnap);
                        foreach ($cooksnap as $cooksnap) {
                            ?>
                            <div class="col">
                                <div class="card">
                                    <div class="row">
                                        <div class="col-4 d-flex align-items-center">
                                            <img class="card-img" src="gambar/<?= $cooksnap["cooksnap_image"] ?>" alt="..." width="100%">
                                        </div>
                                        <div class="col-8">
                                            <p class="text-sm">
                                                <?= $cooksnap["komentar"] ?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>


                <?php
                if ($count > 2):
                    $cooksnap1 = tampilkan("SELECT * from cooksnap where user_id = $id limit 2, 2"); ?>
                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <?php foreach ($cooksnap1 as $cooksnap1): ?>
                                <div class="col">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center">
                                                <img class="card-img" src="asset/img/logo.png" alt="..." width="100%">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-sm">
                                                    <?= $cooksnap1["komentar"] ?>
                                                </p>
                                                <p><a href="#" class="btn btn-sm">berikan komentar</a></p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5>Nama Makanan 3</h5>
                                            <p>user_name</p>
                                            <p class="text-sm">Reaksi</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>

                <?php
                if ($count > 4):
                    $cooksnap2 = tampilkan("SELECT * from cooksnap where user_id = $id limit 4, 2"); ?>
                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-md-2 g-4">
                            <?php foreach ($cooksnap2 as $cooksnap2): ?>
                                <div class="col">
                                    <div class="card">
                                        <div class="row">
                                            <div class="col-4 d-flex align-items-center">
                                                <img class="card-img" src="asset/img/logo.png" alt="..." width="100%">
                                            </div>
                                            <div class="col-8">
                                                <p class="text-sm">
                                                    <?= $cooksnap2["komentar"] ?>
                                                </p>
                                                <p><a href="#" class="btn btn-sm"><?= $cooksnap2["komentar"] ?></a></p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                <?php endif ?>

            </div>

            <button class="carousel-control-prev" style="width: 50px;" type="button"
                data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" style="width: 50px;" type="button"
                data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <br>
        <div>
            <a href="index.php?p=detail_profil&idu=<?= $id ?>&a=cooksnap" class="btn btn-light border" style="width: 100%;">Lihat Semua
                Cooksnap</a>
        </div>
    </div>
</div>

<!-- Cooksnap user end-->