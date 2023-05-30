<?php
$id = $_GET["idu"];
$resep = tampilkan("SELECT resep.*,user.username from resep join user on resep.user_id = user.user_id where resep.user_id = $id");
?>

<!-- Tampilan resep start -->
<div class="row">
    <div class="col-4">
        <p><b>Jumlah Resep</b></p>
    </div>
    <div class="col-2"></div>
    <div class="col-6">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Cari Resep" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>
</div>

<hr>

<?php foreach ($resep as $resep): ?>

    <div style="width: 100%;">
        <div class="row g-0">
            <div class="col-md-8">
                <div>
                    <p><small class="text-muted"><img src="asset/img/profil.png" alt="" width="5%">&nbsp;
                            @<?= $resep["username"] ?></small></p>
                    <br>
                    <h4><?= $resep["judul"] ?></h4>
                    <p>Bahan Masakan
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nobis ipsum hic repellat a quidem
                        deserunt est consequuntur dicta, nesciunt minus, tempore architecto incidunt itaque doloremque! At
                        repudiandae architecto corrupti?
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="asset/img/ayam.jpeg" class="img-fluid rounded-start" alt="...">
            </div>
        </div>
    </div>

    <hr>

<?php endforeach ?>
<!-- Tampilan resep end -->