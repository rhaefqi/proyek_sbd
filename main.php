<?php
if (@$_GET) {
    switch ($_GET['p']) {
        case "buat":
            include "page/buat.php";
        break;
        case "cookbook":
            include "page/cookbook.php";
        break;
        case "user_cookbook":
            include "profil/cookbook_user.php";
        break;
        case "profil":
            include "profil/profil.php";
        break;
        case "buat_resep":
            include "page/buatresep.php";
        break;
        case "aktivitas":
            include "aktivitas.php";
        break;
        case "cari":
            include "cari.php";
        break;
        case "edit":
            include "profil/editprofil.php";
        break;
        case "bahan_pilihan":
            include "bahanpilihan.php";
        break;
    }
} elseif (empty($_SESSION["id_user"])) {
    include "beranda.php";
} else {
    include "home.php";
}
?>