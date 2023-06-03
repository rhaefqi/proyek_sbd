<?php
if (@$_GET) {
    switch ($_GET['p']) {
        case "profil":
            include "profil/profil.php";
        break;
        case "buat":
            include "buat/buat.php";
        break;
        case "cookbook":
            include "page/cookbook.php";
        break;
        case "user_cookbook":
            include "profil/cookbook_user.php";
        break;
        case "buat_resep":
            include "buat/buatresep.php";
        break;
        case "buat_tips":
            include "buat/buattips.php";
        break;
        case "buat_cookbook":
            include "buat/buatcookbook.php";
        break;
        case "edit_cookbook":
            include "buat/editcookbook.php";
        break;
        case "edit_tips":
            include "buat/edittips.php";
        break;
        case "edit_resep":
            include "buat/editresep.php";
        break;
        case "aktivitas":
            include "aktivitas_user.php";
        break;
        case "edit":
            include "profil/editprofil.php";
        break;
        case "bahan_pilihan":
            include "bahanpilihan.php";
        break;
        case "tips":
            include "buat/detail_tips.php";
        break;
        case "detail_resep":
            include "page/detail_resep.php";
        break;
        case "detail_tips":
            include "page/detail_tips.php";
        break;
        case "detail_profil":
            include "profil/anotherprofil.php";
        break;
        case "hasil_cari":
            include "hasil_cari.php";
        break;
    }
} elseif (empty($_SESSION["id_user"])) {
    include "beranda.php";
} else {
    include "home.php";
}
?>