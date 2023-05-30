<?php

if (!isset($_SESSION)) {
    session_start();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'cookpad');

if ($koneksi->connect_error) {
    die("Koneksi gagal " . $koneksi->connect_error);
}

function tampilkan($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);
    $kosong = [];
    while ($isi = mysqli_fetch_assoc($hasil)) {
        $kosong[] = $isi;
    }
    return $kosong;
}

function hitung($query)
{
    global $koneksi;
    $hasil = mysqli_query($koneksi, $query);
    $jumlah = mysqli_num_rows($hasil);

    return $jumlah;
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
    // $tes = mysqli_fetch_assoc($query);
    // echo"<pre>";
    // var_dump($tes);
    // echo"</pre>";
    // // die;

    if (!$query) {
        die("Query gagal" . mysqli_error($koneksi));
    }

    $email = null;

    while ($row = mysqli_fetch_array($query)) {
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";
        // die;
        $email = $row['email'];
        $pass = $row['password'];
        $user = $row['username'];
        $id_user = $row['user_id'];
    }
    if (($email_login == $email) && $pass_login == $pass) {
        echo
            "<script>
                    alert('Selamat kamu telah login');
                    document.location.href = '/proyek_sbd';
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

function cekEmail($data)
{
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

function updatepassword($data)
{
    global $koneksi;

    $Email = $_GET['email'];
    $Password = $data['Password'];
    $Confirm_Password = $data['Confirm_Password'];

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$Email'");
    while ($data = mysqli_fetch_assoc($sql)) {
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
    // var_dump($_FILES);
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
    $bahan = $data['bahan'];
    // langkah($data['bahan'], 1, 1);
    // bahanresep($bahan, 1);

    // langkah($data['langkah']);
    $gambar = upload();

    if (!$gambar) {
        echo "
        <script>
        alert('resep gagal ditambahkan');
                        document.location.href = 'buatresep.php';
                    </script>";
    } else {
        $resep = "INSERT INTO resep (judul, excerpt, porsi, lama_memasak, image, asal_masakan, user_id) VALUES ('$judul', '$deskripsi', '$porsi', '$lamaMemasak', '$gambar', '$asal', '$id')";
    }
    if ($koneksi->query($resep) === TRUE) {
        $hasil_post = mysqli_query($koneksi, "SELECT resep_id FROM resep ORDER BY resep_id DESC LIMIT 1");
        while ($isi = mysqli_fetch_array($hasil_post)) {
            $post_id = $isi['resep_id'];
        }

        langkah($langkah, $post_id, 1); //, $data['gambar']
        bahanresep($bahan, $post_id);
        echo "
                    <script>
                        alert('resep berhasil ditambahkan');
                        document.location.href = 'index.php?p=buat_resep';
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

function bahanresep($data, $id)
{
    global $koneksi;

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();

    $jlh_bahan = count($data);

    for ($i = 0; $i <= $jlh_bahan - 1; $i++) {
        $bahan = $data[$i];
        mysqli_query($koneksi, "INSERT into bahan_resep(resep_id, bahan) values ($id, '$bahan')");
    }

}

function tambahtips($data)
{
    global $koneksi;
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";

    $judul_tips = $data['judul_tips'];
    $langkah = $data['langkah'];
    $user_id = $_SESSION['id_user'];
    // die();

    // $gambar = upload();

    $tips = "INSERT INTO tips (judul, user_id) VALUES('$judul_tips', '$user_id')";

    if ($koneksi->query($tips) === TRUE) {
        $hasil_post = mysqli_query($koneksi, "SELECT tips_id FROM tips ORDER BY tips_id DESC LIMIT 1");
        while ($isi = mysqli_fetch_array($hasil_post)) {
            $post_id = $isi['tips_id'];
        }
        var_dump($post_id);
        // die();

        langkah($langkah, $post_id, 2); //, $data['gambar']

        echo "
                    <script>
                        alert('tips berhasil ditambahkan');
                        document.location.href = 'index.php?p=buat_tips';
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
                mysqli_query($koneksi, "insert into langkah_resep(langkah, resep_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
            } else {
                mysqli_query($koneksi, "insert into langkah_resep(langkah, resep_id, gambar_langkah) values ('$langkah', '$post_id', '$gambar_langkah')");
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
    var_dump($_FILES);
    echo "</pre>";
    // die();
    $namafile = $_FILES['gambar_langkah']['name'][$i];
    $ukuranfile = $_FILES['gambar_langkah']['size'][$i];
    $error = $_FILES['gambar_langkah']['error'][$i];
    $tmpname = $_FILES['gambar_langkah']['tmp_name'][$i];
    $ekstensiok = ['jpg', 'jpeg', 'png'];
    $ekstensi = explode('.', $namafile);
    $ekstensi = strtolower(end($ekstensi));

    // die();
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

function cookbook_cari()
{

    global $koneksi;
    $term = $_GET["term"];

    $query = "SELECT * FROM resep WHERE judul LIKE '%$term%'";
    $result = $koneksi->query($query);

    // Ubah hasil query menjadi array
    $items = [];
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    var_dump($items);
    die();

    header('Content-Type: application/json');
    echo json_encode($items);
}

function komentar_resep($data)
{
    global $koneksi;

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();
    $id = $_SESSION["id_user"];
    $komentar = $data["komentar"];
    $resep_id = $data["resep_id"];
    $komen = "INSERT into komentar_resep(user_id, komentar, resep_id) values($id, '$komentar', $resep_id)";

    if ($koneksi->query($komen) === TRUE) {
        echo "
                    <script>
                        alert('komentar berhasil ditambahkan');
                        document.location.href = '';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('komentar gagal ditambahkan');
                        document.location.href = '';
                    </script>";
    }


}

function waktu($waktu)
{
    date_default_timezone_set('Asia/Jakarta');
    $timestamp_unix = strtotime($waktu);
    $current_time_unix = time();
    // $format_waktu = date("d M Y H:i:s", $current_time_unix);

    $diff_seconds = $current_time_unix - $timestamp_unix;


    if ($diff_seconds < 60) {
        $format = "baru saja";
    } elseif ($diff_seconds < 3600) {
        $diff_minutes = floor($diff_seconds / 60);
        $format = $diff_minutes . " menit yang lalu";
    } elseif ($diff_seconds < 86400) {
        $diff_hours = floor($diff_seconds / 3600);
        $format = $diff_hours . " jam yang lalu";
    } else {
        $format = date("d M Y", $timestamp_unix);
    }

    return $format;
}

function cek_bookmark($id)
{
    global $koneksi;
    $uid = $_SESSION["id_user"];
    $bookmark = mysqli_query($koneksi, "SELECT * from bookmark where user_id = $uid AND resep_id = $id");
    $status = mysqli_num_rows($bookmark);

    // var_dump($status);
    // die();
    return $status;
}

function bookmark($data)
{

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();
    global $koneksi;

    $uid = $data["user_id"];
    $rid = $data["resep_id"];
    $sts = $data["status"];

    if ($sts == 1) {
        mysqli_query($koneksi, "INSERT into bookmark(resep_id, user_id) values($rid, $uid)");
        echo "
        <script>
            document.location.href = '';
        </script>";
    } else {
        mysqli_query($koneksi, "DELETE from bookmark where resep_id = $rid AND user_id = $uid");
        echo "
        <script>
            document.location.href = '';
        </script>";
    }
}

function tambah_cooksnap($data)
{

    global $koneksi;
    $uid = $_SESSION["id_user"];
    $rid = $data["rid"];
    $cerita = $data["cerita"];
    $gambar = upload();

    $query = mysqli_query($koneksi, "INSERT into cooksnap(user_id, resep_id, komentar, cooksnap_image) values ($uid, $rid, '$cerita', '$gambar')");

    if ($query === TRUE) {
        echo "
                    <script>
                        alert('cooksnap berhasil ditambahkan');
                        document.location.href = '';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('cooksnap gagal ditambahkan');
                        document.location.href = '';
                    </script>";
    }
}

function follow($data)
{
    global $koneksi;

    $pengikut = $data["pengikut"];
    $diikuti = $data["diikuti"];
    $sts = $data["status"];

    if ($sts == 1) {
        mysqli_query($koneksi, "INSERT into follow(pengikut, diikuti) values($pengikut, $diikuti)");
        echo "
        <script>
            document.location.href = '';
        </script>";
    } else {
        $sql = "SELECT follow_id from follow order by follow_id desc";
        $hasil = mysqli_query($koneksi, $sql);
        // $kosong = [];
        while ($isi = mysqli_fetch_assoc($hasil)) {
            $idf = $isi["follow_id"];
        }
        // var_dump($idf);
        mysqli_query($koneksi, "DELETE from follow where pengikut = $pengikut AND diikuti = $diikuti");
        mysqli_query($koneksi, "ALTER TABLE follow AUTO_INCREMENT = $idf ");
        echo "
        <script>
            document.location.href = '';
        </script>";
    }

}

function caribahan($data)
{
    global $koneksi;

    if($data == 'ayam'){
        $keyword = $data;
    }else{
        $keyword = $data["keyword"];
    }
    $hasil = tampilkan("SELECT resep.*, user.username, bahan_resep.* from resep join user on resep.user_id = user.user_id join bahan_resep on resep.resep_id = bahan_resep.resep_id
    where resep.judul LIKE '%$keyword%' 
    OR resep.excerpt LIKE '%$keyword%'
    OR bahan_resep.bahan LIKE '%$keyword%' group by resep.resep_id");
    // echo '<pre>';
    // var_dump($sql);
    // echo '</pre>';
    // die;
    return $hasil;
}
function carialat($data)
{
    global $koneksi;

    if($data == 'teflon'){
        $keyword = $data;
    }else{
        $keyword = $data["keyword"];
    }
    $hasil = tampilkan("SELECT resep.*, user.username, langkah_resep.* from resep join user on resep.user_id = user.user_id join langkah_resep on resep.resep_id = langkah_resep.resep_id
    where resep.judul LIKE '%$keyword%' 
    OR resep.excerpt LIKE '%$keyword%'
    OR langkah_resep.langkah LIKE '%$keyword%' group by resep.resep_id");
    // echo '<pre>';
    // var_dump($sql);
    // echo '</pre>';
    // die;
    return $hasil;
}



?>