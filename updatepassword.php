<?php
require 'function.php';
if (isset($_POST["submit"])) {
    updatepassword($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <label for="PW"></label>
    <input type="password" name="Password" required placeholder="Kata sandi Baru">
    <input type="password" name="Confirm_Password" required placeholder="Konfirmasi kata sandi">
    <input hidden type='text' name='id'>
    <input type="submit" name="submit" id="submit" value="kirim" />
</form>
</body>
</html>