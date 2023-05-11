<?php
require_once 'function.php';
if(isset($_POST["kirim"])) {
    cekEmail($_POST);
}
    echo"
    <form method='POST'>
    <input type='text' name='Email' placeholder='Email' required>
    <button type='submit' name='kirim'> 
    Kirim
    </button>
    </form>";
?>