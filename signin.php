<?php
require_once "function.php";
if (isset($_POST["submit"])) {
    login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
</head>

<body>
    <form method="POST" id="signup-form" class="signup-form">
        <h2>Sign in </h2>
        <input type="email" name="Email" id="Email" placeholder="Email" required /><br>

        <input type="password" name="Password" id="Password" placeholder="Kata Sandi" required /><br>

        <input type="submit" name="submit" id="submit" value="Sign in" />
        <a href="#">back</a>

    </form>
</body>

</html>