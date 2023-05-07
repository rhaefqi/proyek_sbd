<?php
    require_once("function.php");
if (isset($_POST["btnregister"])) {
    register($_POST);
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
    <form method="POST">
        <h2>Sign up </h2>

        <input type="text" name="Name" id="Name" placeholder="Nama pengguna (dapat dilihat oleh pengguna)"
            required /><br>

        <input type="email" name="Email" id="Email" placeholder="Email" required /><br>

        <input type="password" name="Password" id="Password" placeholder="Kata Sandi" required /><br>

        <input type="password" name="Confirm_Password" id="Confirm_Password" placeholder="Konfirmasi Kata Sandi"
            required /><br>

        <input type="checkbox" name="agree-term" id="agree-term" required />
        <label for="agree-term"><span><span></span></span>Saya ingin menerima email berisi rekomendasi resep dan
            komunikasi lain dari Cookpad</label><br>


        <button type="submit" name="btnregister">Buat Akun</button>
        <a href="index.php">Back</a>
    </form>
</body>

</html>