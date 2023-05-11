<?php

if (!isset($_SESSION)) {
    session_start();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'cookpad');

if ($koneksi->connect_error) {
    die("Koneksi gagal " . $koneksi->connect_error);
}


function register($data)
{
    global $koneksi;
    $Name = $data['Name'];
    $Email = $data['Email'];
    $Password = $data['Password'];
    $Confirm_Password = $data['Confirm_Password'];

    $cekEmail = mysqli_query($koneksi, "SELECT email FROM user WHERE email='$Email'");

    if (mysqli_num_rows($cekEmail) > 0) {
        echo "
        <script>
            alert('Email sudah digunakan');
            document.location.href = 'signup.php';
        </script>
    ";
    } elseif (strlen($Password) < 6) {
        echo "
        <script>
            alert('Kata sandi terlalu pendek (minimum 6 karakter)');
            document.location.href = 'signup.php';
        </script>
    ";
    } elseif ($Password != $Confirm_Password) {
        echo "
         <script>
             alert('Konfirmasi kata sandi tidak sesuai dengan Kata sandi');
             document.location.href = 'signup.php';
         </script> ";
    } else {
        mysqli_query($koneksi, "INSERT INTO user (name, email, password) VALUES ('$Name', '$Email', '$Password')");
        echo "
    <script>
        alert('Registrasi Akun Berhasil');
        document.location.href = 'index.php';
    </script>";
    }

}

function login($data)
{
    global $koneksi;
    global $user;
    global $pass;
    global $email;
    $email_login = $data["Email"];
    $pass_login = $data["Password"];

    $sql = "SELECT * FROM user WHERE (email = '{$email_login}') AND password = '{$pass_login}'";
    $query = mysqli_query($koneksi, $sql);

    if (!$query) {
        die("Query gagal" . mysqli_error($koneksi));
    }

    $email = null;

    while ($row = mysqli_fetch_array($query)) {
        $email = $row['email'];
        $pass = $row['password'];
        $user = $row['username'];
        $id_user = $row['user_id'];
    }
    if (($email_login == $email) && $pass_login == $pass) {
        echo
            "<script>
                    alert('Selamat kamu telah login');
                    document.location.href = '#';
            </script>";
        $_SESSION['Email'] = $email;
        $_SESSION['username'] = $user;
        $_SESSION['id_user'] = $id_user;
    } else {
        echo
            "<script>
            alert('User tidak ditemukan');
            </script>";
    }
}

function cekEmail($data) {
    global $koneksi, $Email;
    $Email = $data['Email'];
    $cekEmail = mysqli_query($koneksi, "SELECT email FROM user WHERE email='$Email'");

    if (mysqli_num_rows($cekEmail) == 0) {
        echo "<script>
            alert('Email tidak tersedia');
        </script>";
    } else {
        echo "<script>
            document.location.href = 'updatepassword.php?email=$Email';
        </script>";
    }
}

function updatepassword($data) {
    global $koneksi;

    $Email = $_GET['email'];
    $Password = $data['Password'];
    $Confirm_Password = $data['Confirm_Password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$Email'");
    while($data = mysqli_fetch_assoc($sql)){
        // ...
    }

    if (strlen($Password) < 6) {
        echo "
        <script>
            alert('Kata sandi terlalu pendek (minimum 6 karakter)');
            document.location.href = 'updatepassword.php';
        </script>";
    } elseif ($Password != $Confirm_Password) {
        echo "
        <script>
            alert('Konfirmasi kata sandi tidak sesuai dengan Kata sandi');
            document.location.href = 'updatepassword.php';
        </script>";
    } else {
        $sql = "UPDATE user
        SET
        password = '$Password'
        WHERE email = '$Email'";

        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "
            <script>
                alert('Berhasil Diubah');
                document.location.href = 'signin.php';
            </script>";
        }
    }
}



function tambahresep($data)
{
    echo "<pre>";
    var_dump($data);
    var_dump($_FILES);
    echo "</pre>";
    //  die();
    global $koneksi;
    $username = $_SESSION['username'];
    $user = "SELECT * FROM user WHERE username = '$username' ";
    $hasil = mysqli_query($koneksi, $user);
    while ($isi = mysqli_fetch_array($hasil)) {
        $id = $isi['user_id'];
    }
    $judul = $data['judulResep'];
    $deskripsi = $data['deskripsi'];
    $asal = $data['asal'];
    $porsi = $data['porsi'];
    $lamaMemasak = $data['lamaMemasak'];
    $langkah = $data['langkah'];
    // langkah($data['bahan'], 1, 1);

    // langkah($data['langkah']);
    $gambar = upload();

    if (!$gambar) {
        echo "
        <script>
        alert('resep gagal ditambahkan');
                        document.location.href = 'tambahresep.php';
                    </script>";
    } else {
        $resep = "INSERT INTO resep (user_id, judul, excerpt, porsi, lama_memasak, image, asal_masakan) VALUES ('$id', '$judul', '$deskripsi', '$porsi', '$lamaMemasak', '$gambar', '$asal')";
    }
    if ($koneksi->query($resep) === TRUE) {
        $hasil_post = mysqli_query($koneksi, "SELECT resep_id FROM resep ORDER BY resep_id DESC LIMIT 1");
        while ($isi = mysqli_fetch_array($hasil_post)) {
            $post_id = $isi['resep_id'];
        }

        langkah($langkah, $post_id, 1); //, $data['gambar']

        echo "
                    <script>
                        alert('resep berhasil ditambahkan');
                        document.location.href = 'buatresep.php';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('resep gagal ditambahkan');
                        document.location.href = 'buatresep.php';
                    </script>";
    }
    // print_r($data);

}

function tambahtips($data)
{
    global $koneksi;

    $judul_tips = $data['judul_tips'];
    $langkah = $data['langkah'];
    $user_id = $_SESSION['id_user'];

    $tips = "INSERT INTO tips (judul, user_id) VALUES('$judul_tips', '$user_id')";

    if ($koneksi->query($tips) === TRUE) {
        $hasil_post = mysqli_query($koneksi, "SELECT tips_id FROM tips ORDER BY tips_id DESC LIMIT 1");
        while ($isi = mysqli_fetch_array($hasil_post)) {
            $post_id = $isi['tips_id'];
        }

        langkah($langkah, $post_id, 2); //, $data['gambar']

        echo "
                    <script>
                        alert('tips berhasil ditambahkan');
                        document.location.href = 'buattips.php';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('tips gagal ditambahkan');
                        document.location.href = 'buattips.php';
                    </script>";
    }
}

function tambahcookbook($data)
{

    global $koneksi;
    $nama_cookbook = $data['nama_cookbook'];
    $excerpt = $data['deskripsi'];
    $user_id = $_SESSION['id_user'];

    $cookbook = "INSERT INTO cookbook (judul, excerpt, user_id) VALUES ('$nama_cookbook', '$excerpt', $user_id)";

    if ($koneksi->query($cookbook) === TRUE) {
        echo "
                    <script>
                        alert('cookbook berhasil ditambahkan');
                        document.location.href = 'buatcookbook.php';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('cookbook gagal ditambahkan');
                        document.location.href = 'buatcookbook.php';
                    </script>";
    }
}

function langkah($data, $postid, $jenis)
{
    global $koneksi;

    $jlh_langkah = count($data);
    $post_id = $postid;
    $jenis_post = $jenis;
    // var_dump($data);
    // die();

    if ($jenis_post == 1) {
        for ($i = 0; $i <= $jlh_langkah - 1; $i++) {
            // $gambar_langkah = $gambar[$i];
            $langkah = $data[$i];
            $gambar_langkah = upload2($i);
            if ($gambar_langkah == 'default_gambar.jpg') {
                mysqli_query($koneksi, "insert into langkah(langkah, post_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
            } else {
                mysqli_query($koneksi, "insert into langkah(langkah, post_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
            }

            // if ($gambar == NULL) {
            // }else{
            //     mysqli_query($koneksi, "insert into langkah(langkah, jenis_post, post_id) values('$langkah', '$jenis_post', '$post_id')");
            // }
        }
    } else {
        for ($i = 0; $i <= $jlh_langkah - 1; $i++) {
            // $gambar_langkah = $gambar[$i];
            $langkah = $data[$i];
            $gambar_langkah = upload2($i);
            if ($gambar_langkah == 'default_gambar.jpg') {
                mysqli_query($koneksi, "insert into langkah_tips(langkah, tips_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
            } else {
                mysqli_query($koneksi, "insert into langkah_tips(langkah, tips_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
            }

            // if ($gambar == NULL) {
            // }else{
            //     mysqli_query($koneksi, "insert into langkah(langkah, jenis_post, post_id) values('$langkah', '$jenis_post', '$post_id')");
            // }
        }
    }

}
// $koneksi->close();

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];
    $ekstensiok = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namafile);
    $ekstensi = strtolower(end($ekstensi));

    if ($error === 4) {
        echo "
                <script>
                    alert('pilih gambar terlebih dahulu!');
                </script>";
        return false;
    }

    if (!in_array($ekstensi, $ekstensiok)) {
        echo "
                <script>
                    alert('yang anda upload bukan gambar!');
                </script>";
        return false;
    }

    if ($ukuranfile > 100000000) {
        echo "
                <script>
                    alert('ukuran gambar melebihi!');
                </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensi;

    move_uploaded_file($tmpname, 'gambar/' . $namafilebaru);
    return $namafilebaru;
}

function upload2($i)
{
    echo "<pre>";
    var_dump($_FILES['gambar_langkah']);
    echo "</pre>";
    // die();
    $namafile = $_FILES['gambar_langkah']['name'][$i];
    $ukuranfile = $_FILES['gambar_langkah']['size'][$i];
    $error = $_FILES['gambar_langkah']['error'][$i];
    $tmpname = $_FILES['gambar_langkah']['tmp_name'][$i];
    $ekstensiok = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namafile);
    $ekstensi = strtolower(end($ekstensi));

    if ($error === 4) {
        return 'default_gambar.jpg';
    }

    if (!in_array($ekstensi, $ekstensiok)) {
        echo "
                <script>
                    alert('yang anda upload bukan gambar!');
                </script>";
        return false;
    }

    if ($ukuranfile > 100000000) {
        echo "
                <script>
                    alert('ukuran gambar melebihi!');
                </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensi;

    move_uploaded_file($tmpname, 'gambar/' . $namafilebaru);
    return $namafilebaru;
}

?>
