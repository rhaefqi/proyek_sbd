<?php
if (@$_GET) {
    switch ($_GET['p']) {
        case "buat":
            include "page/buat.php";
            break;
    }
} elseif (empty($_SESSION["id_user"])) {
    include "beranda.php";
} else {
    include "home.php";
}
?>