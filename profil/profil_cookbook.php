<?php
require_once "./function.php";

$id = $_SESSION["id_user"];
$cookbook = tampilkan("SELECT * FROM cookbook where user_id = '$id'");
// echo "<pre>";
// var_dump($cookbook);
// echo "</pre>";
?>

<div>
    <center>
        <?php
        $i = 0;
        foreach ($cookbook as $cb) {
            // echo "<pre>";
            // var_dump($cb);
            // echo "</pre>";
            ?>
            <a href="index.php?p=user_cookbook&idcb=<?= $cb["cookbook_id"] ?>" class="btn btn-warning">
                <?= $cb["judul"] ?>
            </a>
            <?php
            $i++;
        }
        ?>
    </center>
</div>