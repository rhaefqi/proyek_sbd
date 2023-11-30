<?php
$id = $_GET["idu"];
$resep = tampilkan("SELECT resep.*,user.username from resep join user on resep.user_id = user.user_id where resep.user_id = $id");
?>

<!-- Tampilan resep start -->
<div class="row">

</div>

<hr>

<?php foreach ($resep as $resep): ?>

    <div style="width: 100%;">
        <a href="index.php?p=detail_resep&idr=<?=$resep["resep_id"] ?>" class="text-decoration-none text-dark">
        <div class="row g-0">
            <div class="col-md-8">
                    <div>
                        <p><small class="text-muted"><img src="asset/img/profil.png" alt="" width="5%">&nbsp;
                                @
                                <?= $resep["username"] ?>
                            </small></p>
                        <br>
                        <h4>
                            <?= $resep["judul"] ?>
                        </h4>
                        <p>Bahan Masakan
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nobis ipsum hic repellat a quidem
                            deserunt est consequuntur dicta, nesciunt minus, tempore architecto incidunt itaque doloremque!
                            At
                            repudiandae architecto corrupti?
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="gambar/<?= $resep["image"] ?>" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </div>
    </a>

    <hr>

<?php endforeach ?>
<!-- Tampilan resep end -->