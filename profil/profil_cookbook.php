<?php
require_once "./function.php";

$id = $_SESSION["id_user"];
$cookbook = tampilkan("SELECT * FROM cookbook where user_id = '$id'");
// echo "<pre>";
// var_dump($cookbook);
// echo "</pre>";
?>

<div class="card">
    <div class="card-title ms-3 mt-2">
        <h2>
            <b>Semua Cookbook <?= $_SESSION["username"] ?> </b>
        </h2>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <?php
            $i = 0;
            foreach ($cookbook as $cb) {
                // echo "<pre>";
                // var_dump($cb);
                // echo "</pre>";
                $no = rand(1, 4);
                ?>
                <div class="col">
                    <div class="card">
                        <img class="card-img" src="asset/img/lpcb<?= $no ?>.jpg" alt="..." width="50">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $cb["judul"] ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
        <br>
    </div>

</div>