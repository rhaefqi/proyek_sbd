<?php
require_once "./function.php";
$idt = $_GET["idt"];

$result = tampilkan("SELECT tips.*, user.username, user.deskripsi, user.id_cookpad, user.user_id FROM tips join user on tips.user_id = user.user_id where tips.tips_id = '$idt'")[0];
$langkah = tampilkan("SELECT * FROM langkah_tips where tips_id = $idt");

$id = $result["user_id"];

// echo "<pre>";
// var_dump($result);
// var_dump($langkah);
// echo "</pre>";
// die();

if(isset($_POST["hapus_tips"])){
    hapustips($_POST);
}
?>

<!-- Body -->
<div class="container-fluid">

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <br>
            <div class="card shadow">
                <!-- tips tips start -->
                <div class="card-body">
                    <!-- PENGULANGAN TIPS -->
                    <!-- PENGULANGAN TIPS -->
                    <h1>
                        <?= $result["judul"] ?>
                        <?php
                        if ($_SESSION["id_user"] == $result["user_id"]) { ?>
                            <a href="index.php?p=edit_tips&idt=<?= $result["tips_id"] ?>">
                                <img src="asset/img/sunting.png" alt="" width="3%">
                            </a>
                            <form action="" onsubmit="return confirm('anda yakin mau menghapus tips?');" method="post">
                                <input type="hidden" name="tips_id" value="<?= $result["tips_id"] ?>">
                                <button name="hapus_tips" class="btn btn-white border  text-dark fw-bold border btn-md mb-1"
                                    style="width: 100%;">Hapus tips</button>
                            </form>
                        <?php } else {
                        } ?>

                    </h1>

                    <?php
                    // $i = 1;
                    foreach ($langkah as $langkah):
                        ?>
                        <br>
                        <p>
                            <?= $langkah["langkah"] ?>
                        </p>
                        <img src="gambar/<?= $langkah['gambar_langkah'] ?>" alt="" style="width: 100%;">
                        <hr>
                    <?php endforeach ?>
                </div>
                <!-- tips tips end -->
                <hr>
                <!-- profile start -->
                <div class="card-body text-center">
                    <img src="asset/img/profil.png" alt="" width="10%">
                    <p>Diterbitkan Oleh</p>
                    <p><b>@
                            <?= $result["id_cookpad"] ?>
                        </b></p>
                    <p>
                        <?php
                        $waktu = waktu($result["tanggalbuat"])
                            ?>
                        <?= $waktu ?>
                    </p>
                    <p>
                        <?= $result["deskripsi"] ?>
                    </p>


                    <?php
                    if (isset($_POST["follow"])) {
                        follow($_POST);
                    }
                    $fid = $_SESSION["id_user"];
                    $sts = hitung("SELECT * from follow where pengikut = $fid and diikuti = $id")
                        ?>

                    <div>
                        <?php
                        if ($sts == 0) { ?>
                            <form action="" method="post">
                                <input type="hidden" name="pengikut" value="<?= $_SESSION["id_user"] ?>">
                                <input type="hidden" name="diikuti" value="<?= $id ?>">
                                <input type="hidden" name="status" value="1">
                                <button type="submit" name="follow" class="btn btn-secondary" style="width: 100%;">Ikuti
                                    Sekarang</button>
                            </form>
                        <?php } else { ?>
                            <form action="" method="post">
                                <input type="hidden" name="pengikut" value="<?= $_SESSION["id_user"] ?>">
                                <input type="hidden" name="diikuti" value="<?= $id ?>">
                                <input type="hidden" name="status" value="2">
                                <button type="submit" name="follow" class="btn btn-outline-secondary"
                                    style="width: 100%;">berhenti ikuti</button>
                            </form>
                        <?php } ?>
                    </div>


                </div>
                <!-- profile end -->

                <hr>
                <!-- komentas start -->
                <div class="card-body">
                    <?php
                    $kmn = hitung("SELECT * from komentar_tips where tips_id = $idt");
                    $komen = tampilkan("SELECT a.*, b.username, b.id_cookpad, b.profil_image from komentar_tips a join user b on a.user_id = b.user_id where a.tips_id = $idt");
                    ?>

                    <h3> <img src="asset/img/aktivitas.png" alt="" width="5%">Komentar (
                        <?= $kmn ?>)
                    </h3>
                    <br>
                    <?php foreach ($komen as $komen): ?>
                        <div class="row">
                            <div id="komentar">
                                <div class="">
                                    <img <?php
                                    $g = $komen['profil_image'];
                                    $gambar = "gambar/$g";
                                    // var_dump($gambar);
                                    if (empty($g) || !file_exists($gambar)) { ?> src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $komen["profil_image"] ?>" <?php } ?> alt="tes" title="tes"
                                        class="rounded-circle" width="32" height="32">
                                    <div class="flex flex-col">
                                        <a href="" class="text-decoration-none">
                                            <span class="text-dark">
                                                <?= $komen["username"] ?>
                                            </span>
                                            <span class="text-dark">@
                                                <?= $komen["id_cookpad"] ?>
                                            </span>
                                        </a>
                                        <div class="">
                                            <?php
                                            $waktu = waktu($komen["tanggal_dibuat"]);
                                            ?>
                                            <time>
                                                <?= $waktu ?>
                                            </time>
                                            </a>
                                            <p>
                                                <?= $komen["komentar"] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    <?php endforeach ?>

                    <?php
                    if (isset($_POST["komentar_tips"])) {
                        komentar_tips($_POST);
                    }
                    ?>

                    <div class="row">
                        <div class="col-1">
                            <img src="asset/img/profil.png" alt="" width="100%">
                        </div>
                        <div class="col-11">
                            <form action="" method="post">
                                <input type="hidden" name="tips_id" value="<?= $idt ?>">
                                <div class="input-group mb-3 w-100">
                                    <input type="textarea" class="form-control" placeholder="Komentar"
                                        style="border-radius: 15px;" name="komentar">
                                    <button class="btn btn-outline-secondary" type="submit" name="komentar_tips"
                                        style="border-radius: 15px;">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- komentas end -->

            </div>
            <br>
        </div>
        <div class="col-3"></div>
    </div>


</div>


<!-- Body End -->