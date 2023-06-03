<?php
require_once "function.php";
// $data = $_POST["keyword"];
// var_dump($data);
$hasil = cari($_POST);
$_SESSION["hasil_cari"] = $hasil;
header("Location: index.php?p=hasil_cari");
?>