<?php
require_once "./function.php";
$idt = $_GET["idt"];

$result = tampilkan("SELECT tips.*, user.username FROM tips join user on tips.user_id = user.user_id where tips.tips_id = '$idt'")[0];
$langkah = tampilkan("SELECT * FROM langkah_tips where tips_id = $idt");

// echo "<pre>";
// var_dump($result);
// var_dump($langkah);
// echo "</pre>";
// die();
?>

<div class="container">
    <div class="container-fluid">
        pemilik tips :
        <?= $result["username"] ?>
        <center>
            <h1>
                <?= $result["judul"] ?>
            </h1>
        </center>
        <div class="div">
            langkah- langkah : <br></br>

            <table>
                <?php
                $i = 1;
                foreach ($langkah as $langkah) {
                    $nomor = $i . ". ";
                    ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $langkah['langkah'] ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <img src="gambar/<?= $langkah['gambar_langkah'] ?>" alt="" width="300">
                        </td>
                    </tr>
                    <?php $i++;
                } ?>
            </table> <br>

        </div>
    </div>
    <a href="" class="btn btn-primary">kembali</a>
</div>