<?php
require_once "./function.php";

$id = $_SESSION["id_user"];
$cookbook = tampilkan("SELECT * FROM cookbook where user_id = '$id'");
$user = tampilkan("SELECT * from user where user_id = $id")[0];
// echo "<pre>";
// var_dump($cookbook);
// echo "</pre>";
?>

<div class="card">
    <div class="card-title ms-3 mt-2">
        <h2>
            <b>Semua Cookbook
                <?= $user["username"] ?>
            </b>
        </h2>
    </div>
    <div class="card-body">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <?php
            $i = 0;
            foreach ($cookbook as $cb) {
                // echo "<pre>";
                // var_dump($cb);
                // echo "</pre>";
                $no = rand(1, 4);
                ?>
                <div class="col">
                    <a href="index.php?p=cookbook&idcb=<?= $cb["cookbook_id"] ?>" class="text-decoration-none text-dark">
                        <div class="card">
                            <img class="card-img" src="asset/img/lpcb<?= $no ?>.jpg" alt="..." width="50">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $cb["judul"] ?>
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                $i++;
            }
            ?>
        </div>
        <br>
    </div>

</div>