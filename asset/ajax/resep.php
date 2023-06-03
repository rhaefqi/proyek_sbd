<?php
require_once "../../function.php";

$keyword = $_GET["keyword"];

$query = "SELECT resep.*, user.username, bahan_resep.*, langkah_resep.* from resep join user on resep.user_id = user.user_id join bahan_resep on resep.resep_id = bahan_resep.resep_id join langkah_resep on langkah_resep.resep_id = resep.resep_id
where resep.judul LIKE '%$keyword%' 
OR resep.excerpt LIKE '%$keyword%'
OR resep.asal_masakan LIKE '%$keyword%'
OR langkah_resep.langkah LIKE '%$keyword%'
OR bahan_resep.bahan LIKE '%$keyword%' group by resep.resep_id";

$hasil = tampilkan($query);


?>


<?php foreach ($hasil as $hasil): ?>
    <div class="card mb-3" style="max-width: 700px;" id="card-main">
        <div class="row no-gutters">
            <div class="col-lg-4 col-md-12" id="item-img">
                <img src="gambar/<?= $hasil["image"] ?>" class="card-img" style="width: 150px;height: 140px;">
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $hasil["judul"] ?>
                    </h5>
                    <p class="card-text">
                        <?= $hasil["username"] ?>
                    </p>
                    <div class="d-flex  justify-content-end ">
                        <form action="" method="post">
                            <input type="hidden" name="resep_id" value="<?= $hasil["resep_id"] ?>">
                            <button type="submit" name="resep_cookbook" class="btn btn-secondary">Add</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endforeach ?>

<!-- isi modal -->