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
        mysqli_query($koneksi, "INSERT INTO user (username, email, password) VALUES ('$Name', '$Email', '$Password')");
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

    $adminsql = "SELECT * FROM admin WHERE (email = '{$email_login}') AND password = '{$pass_login}'";
    $adminquery = mysqli_query($koneksi, $adminsql);


    if (!$query) {
        die("Query gagal" . mysqli_error($koneksi));
    }

    $email = null;

    //user
    while ($row = mysqli_fetch_array($query)) {
        // echo "<pre>";
        // var_dump($row);
        // echo "</pre>";
        // die;
        $email = $row['email'];
        $pass = $row['password'];
        $user = $row['username'];
        $id_user = $row['user_id'];
        $id_cookpad = $row['id_cookpad'];
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
        $_SESSION['id_cookpad'] = $id_cookpad;
    }

    // admin
    while ($row = mysqli_fetch_array($adminquery)) {
        $email = $row['email'];
        $name = $row['name'];
        $pass = $row['password'];
        $admin_id = $row['admin_id'];
    }
    if (($email_login == $email) && $pass_login == $pass) {
        echo
            "<script>
                        alert('Selamat kamu telah login sebagai admin');
                        document.location.href = 'admin.php';
                </script>";
        $_SESSION['name'] = $name;
        $_SESSION['admin_id'] = $admin_id;
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

function update($data)
{
    global $koneksi;
    $user_id = $data["user_id"];
    $username = $data["Username"];
    $name = $data["Name"];
    $email = $data["Email"];
    $password = $data["Password"];
    $asal = $data["Asal"];
    $deskripsi = $data["Deskripsi"];
    $profil_image = $data["Profil_Image"];

    $sql = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id = '$user_id'");
    $oldData = mysqli_fetch_assoc($sql);

    $dataChanged = false; // Flag untuk menandakan apakah ada perubahan data

    // Memeriksa apakah ada perubahan data
    if ($oldData['username'] !== $username || $oldData['name'] !== $name || $oldData['email'] !== $email || $oldData['password'] !== $password || $oldData['asal'] !== $asal || $oldData['deskripsi'] !== $deskripsi || $oldData['profil_image'] !== $profil_image) {
        $dataChanged = true;
    }

    if ($dataChanged) {
        $sql = "UPDATE user
        SET 
        username = '$username',
        name = '$name',
        email = '$email',
        password = '$password',
        asal = '$asal',
        deskripsi = '$deskripsi',
        profil_image = '$profil_image'
        WHERE user_id = '$user_id'";

        $query = mysqli_query($koneksi, $sql);
        if ($query) {
            echo "
            <script>
                alert('Berhasil Diubah');
                document.location.href = 'tables.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal diubah');
                document.location.href = 'tables.php';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Tidak ada data yang diperbarui');
            document.location.href = 'tables.php';
        </script>";
    }
}

function delete($data)
{
    global $koneksi;
    $user_id = $data["user_id"];

    // Menghapus entri terkait dalam tabel cookbook
    $deleteCookbookSql = "DELETE FROM cookbook WHERE user_id = '$user_id'";
    $deleteCookbookQuery = mysqli_query($koneksi, $deleteCookbookSql);

    // Menghapus entri terkait dalam tabel langkah_resep
    $deleteLangkahResepSql = "DELETE FROM langkah_resep WHERE resep_id IN (SELECT resep_id FROM resep WHERE user_id = '$user_id')";
    $deleteLangkahResepQuery = mysqli_query($koneksi, $deleteLangkahResepSql);

    // Menghapus entri terkait dalam tabel resep
    $deleteResepSql = "DELETE FROM resep WHERE user_id = '$user_id'";
    $deleteResepQuery = mysqli_query($koneksi, $deleteResepSql);

    // Menghapus entri terkait dalam tabel langkah_tips
    $deleteLangkahTipsSql = "DELETE FROM langkah_tips WHERE tips_id IN (SELECT tips_id FROM tips WHERE user_id = '$user_id')";
    $deleteLangkahTipsQuery = mysqli_query($koneksi, $deleteLangkahTipsSql);

    // Menghapus entri terkait dalam tabel tips
    $deleteTipsSql = "DELETE FROM tips WHERE user_id = '$user_id'";
    $deleteTipsQuery = mysqli_query($koneksi, $deleteTipsSql);

    // Menghapus pengguna dari tabel user
    $deleteUserSql = "DELETE FROM user WHERE user_id = '$user_id'";
    $deleteUserQuery = mysqli_query($koneksi, $deleteUserSql);

    if ($deleteCookbookQuery && $deleteLangkahResepQuery && $deleteResepQuery && $deleteLangkahTipsQuery && $deleteTipsQuery && $deleteUserQuery) {
        echo "
        <script>
            alert('Berhasil Dihapus');
            document.location.href = 'tables.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Gagal dihapus');
            document.location.href = 'tables.php';
        </script>";
    }
}

function tambahBahanPilihan($data)
{
    global $koneksi;
    $deskripsi = $data['deskripsi'];
    $bahan = $data['bahan'];
    $bp_image = upload();

    if ($deskripsi && $bp_image) {
        $query = "INSERT INTO bahan_pilihan (deskripsi, bp_image, bahan) VALUES ('$deskripsi', '$bp_image', '$bahan')";
        if ($koneksi->query($query) === TRUE) {
            echo "
            <script>
                alert('Berhasil ditambah');
                document.location.href = '';
            </script>";
        } else {
            echo "
            <script>
                alert('Gagal ditambah');
                document.location.href = '';
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Gagal ditambah: Deskripsi atau kirim gambar belum diisi');
            document.location.href = '';
        </script>";
    }
}

function aktivitas($data)
{
    global $koneksi;
    $pesan = $data['pesan'];
    $name = $_SESSION['name'];
    $admin_id = $_SESSION['admin_id'];

    if ($pesan) {
        $query = "INSERT INTO aktivitas (pesan,name, admin_id) VALUES ('$pesan','$name', '$admin_id')";
        if ($koneksi->query($query) === TRUE) {
            echo "
            <script>
            alert('Berhasil dikirim');
        document.location.href = '';
        </script>";
        } else {
            echo "
        <script>
            alert('Gagal ditambah');
            document.location.href = '';
        </script>";
        }

    } else {
        echo "
        <script>
            alert('Gagal ditambah: tidak ada data aktivasi yang dikirimkan');
            document.location.href = '';
        </script>";
    }
}


function tambahresep($data)
{
    echo "<pre>";
    // var_dump($data);
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

function editresep($data)
{
    // echo"<pre>";
    // var_dump($data);
    // echo"</pre>";
    // die;

    global $koneksi;
    $id_user = $_SESSION['id_user'];
    $judul = $data['judulResep'];
    $deskripsi = $data['deskripsi'];
    $asal = $data['asal'];
    $porsi = $data['porsi'];
    $lamaMemasak = $data['lamaMemasak'];
    $langkah = $data['langkah'];
    $bahan = $data['bahan'];
    $idr = $data['idr'];
    $gambar_lama = $data["gambar_lama"];
    $gambar_utama_lama = $data["gambar_utama_lama"];
    // langkah($data['bahan'], 1, 1);
    // bahanresep($bahan, 1);

    // langkah($data['langkah']);
    // $cekgambar = tampilkan("SELECT image from resep where resep_id = $idr")[0]["image"];
    if ($_FILES['gambar']['error'] === 4) {
        // var_dump($gambar_lama);
        // die;
        $gambar = $gambar_utama_lama;
    } else {
        $gambar = upload();
    }
    // $gambar = upload();

    if (!$gambar) {
        echo "
        <script>
        alert('resep gagal ditambahkan');
            document.location.href = '';
        </script>";
    } else {
        $resep = "UPDATE resep set judul = '$judul', excerpt = '$deskripsi', lama_memasak = '$lamaMemasak', asal_masakan = '$asal', porsi = '$porsi', image = '$gambar' where resep_id  = $idr ";
    }
    if ($koneksi->query($resep) === TRUE) {

        editlangkah_r($langkah, $idr, $gambar_lama); //, $data['gambar']
        editbahan_r($bahan, $idr);
        echo "
                    <script>
                        alert('resep berhasil diedit');
                        document.location.href = 'index.php?p=edit_resep&idr=$idr';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('resep gagal diedit');
                        document.location.href = 'buatresep.php';
                    </script>";
    }
}

function editlangkah_r($data, $idr, $gambar_lama)
{

    global $koneksi;

    $jlh_langkah = count($data);
    // $post_id = $idr;
    // $jenis_post = $jenis;
    $id = tampilkan("SELECT langkah_resep_id from langkah_resep where resep_id = $idr ");
    // echo "<pre>";
    // var_dump($data);
    // var_dump($gambar_lama);
    // var_dump($_FILES);
    // echo "</pre>";
    // die;
    // $gambarlama = 1;

    for ($i = 0; $i <= $jlh_langkah - 1; $i++) {
        // $gambar_langkah = $gambar[$i];
        $langkah = $data[$i];
        $idr = $id[$i]["langkah_resep_id"];

        if ($_FILES['gambar_langkah']['error'][$i] === 4) {
            // var_dump($gambar_lama);
            // die;
            $gambar_langkah = $gambar_lama[$i];
        } else {
            $gambar_langkah = upload2($i);

        }
        // $gambar = upload();

        if ($gambar_langkah == 'default_gambar.jpg') {
            mysqli_query($koneksi, "UPDATE langkah_resep set langkah = '$langkah', gambar_langkah = '$gambar_langkah' where langkah_resep_id = $idr ");
        } else {
            mysqli_query($koneksi, "UPDATE langkah_resep set langkah = '$langkah', gambar_langkah = '$gambar_langkah' where langkah_resep_id = $idr ");
        }
    }
}

function editbahan_r($data, $idr)
{
    global $koneksi;

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();
    $id = tampilkan("SELECT br_id from bahan_resep where resep_id = $idr ");

    $jlh_bahan = count($data);
    for ($i = 0; $i <= $jlh_bahan - 1; $i++) {
        $bahan = $data[$i];
        $idbr = $id[$i]["br_id"];
        mysqli_query($koneksi, "UPDATE bahan_resep set bahan = '$bahan' where br_id = $idbr ");
    }

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
        // var_dump($post_id);
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
function edittips($data)
{
    global $koneksi;
    // echo "<pre>";
    // var_dump($data);
    // echo "</pre>";

    $judul_tips = $data['judul_tips'];
    $langkah = $data['langkah'];
    $gambar_lama = $data["gambar_lama"];
    $idt = $data['idt'];
    $user_id = $_SESSION['id_user'];
    // die();

    // $gambar = upload();

    $tips = "UPDATE tips set judul = '$judul_tips' where tips_id = $idt";

    if ($koneksi->query($tips) === TRUE) {
        // $hasil_post = mysqli_query($koneksi, "SELECT tips_id FROM tips where tips_id = $idt");
        // while ($isi = mysqli_fetch_array($hasil_post)) {
        // $post_id = $isi['tips_id'];
        // }
        // var_dump($post_id);
        // die();

        editlangkah_t($langkah, $idt, $gambar_lama); //, $data['gambar']

        echo "
                    <script>
                        alert('tips berhasil edit');
                        document.location.href = '';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('tips gagal edit');
                        document.location.href = 'buattips.php';
                    </script>";
    }
}

function editlangkah_t($data, $postid, $gambar_lama)
{
    global $koneksi;

    $jlh_langkah = count($data);
    $post_id = $postid;
    // $jenis_post = $jenis;
    $id = tampilkan("SELECT langkah_tips_id from langkah_tips where tips_id = $post_id ");
    // echo "<pre>";
    // var_dump($data);
    // var_dump($gambar_lama);
    // var_dump($_FILES);
    // echo "</pre>";
    // die;
    // $gambarlama = 1;

    for ($i = 0; $i <= $jlh_langkah - 1; $i++) {
        // $gambar_langkah = $gambar[$i];
        $langkah = $data[$i];
        $idl = $id[$i]["langkah_tips_id"];

        if ($_FILES['gambar_langkah']['error'][$i] === 4) {
            // var_dump($gambar_lama);
            // die;
            $gambar_langkah = $gambar_lama[$i];
        } else {
            $gambar_langkah = upload2($i);

        }
        // $gambar = upload();

        if ($gambar_langkah == 'default_gambar.jpg') {
            mysqli_query($koneksi, "UPDATE langkah_tips set langkah = '$langkah', gambar_langkah = '$gambar_langkah' where langkah_tips_id = $idl ");
        } else {
            mysqli_query($koneksi, "UPDATE langkah_tips set langkah = '$langkah', gambar_langkah = '$gambar_langkah' where langkah_tips_id = $idl ");
        }
    }

}

function tambahcookbook($data)
{

    global $koneksi;
    $nama_cookbook = $data['nama_cookbook'];
    $excerpt = $data['deskripsi'];
    $user_id = $_SESSION['id_user'];

    $cookbook = "INSERT INTO cookbook (judul, excerpt, user_id) VALUES ('$nama_cookbook', '$excerpt', $user_id)";

    // var_dump($cek); die;

    if ($koneksi->query($cookbook) === TRUE) {
        $tes = tampilkan("SELECT cookbook_id from cookbook order by cookbook_id desc")[0];
        $cek = $tes["cookbook_id"];
        echo "
                    <script>
                        alert('cookbook berhasil ditambahkan');
                        document.location.href = 'index.php?p=cookbook&idcb=$cek';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('cookbook gagal ditambahkan');
                        document.location.href = '';
                    </script>";
    }
}
function editcookbook($data)
{

    global $koneksi;
    $nama_cookbook = $data['nama_cookbook'];
    $excerpt = $data['deskripsi'];
    $idcb = $data['idcb'];

    $cookbook = "UPDATE cookbook set judul = '$nama_cookbook', excerpt = '$excerpt' where cookbook_id = $idcb";
    // $tes = tampilkan("SELECT cookbook_id from cookbook order by cookbook_id desc")[0];
    // $cek = $tes["cookbook_id"];
    // var_dump($cek); die;

    if ($koneksi->query($cookbook) === TRUE) {
        echo "
                    <script>
                        alert('cookbook berhasil diedit');
                        document.location.href = 'index.php?p=cookbook&idcb=$idcb';
                    </script>";
    } else {
        echo "
                    <script>
                        alert('cookbook gagal diedit');
                        document.location.href = '';
                    </script>";
    }
}


function langkah($data, $postid, $jenis)
{
    global $koneksi;

    $jlh_langkah = count($data);
    $post_id = $postid;
    $jenis_post = $jenis;

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
    // var_dump($_FILES);
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
function komentar_tips($data)
{
    global $koneksi;

    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // die();
    $id = $_SESSION["id_user"];
    $komentar = $data["komentar"];
    $tips_id = $data["tips_id"];
    $komen = "INSERT into komentar_tips(user_id, komentar, tips_id) values($id, '$komentar', $tips_id)";

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

function cari($data)
{
    global $koneksi;

    $keyword = $data["keyword"];

    $hasil1 = tampilkan("SELECT resep.*, user.username, bahan_resep.*, langkah_resep.* from resep join user on resep.user_id = user.user_id join bahan_resep on resep.resep_id = bahan_resep.resep_id join langkah_resep on langkah_resep.resep_id = resep.resep_id
    where resep.judul LIKE '%$keyword%' 
    OR resep.excerpt LIKE '%$keyword%'
    OR resep.asal_masakan LIKE '%$keyword%'
    OR langkah_resep.langkah LIKE '%$keyword%'
    OR bahan_resep.bahan LIKE '%$keyword%' group by resep.resep_id");

    // $hasil2 = tampilkan("SELECT tips.*, user.username, langkah_tips.* from tips join user on tips.user_id = user.user_id join langkah_tips on tips.tips_id = langkah_tips.tips_id
    // where tips.judul LIKE '%$keyword%' 
    // OR langkah_tips.langkah LIKE '%$keyword%' group by tips.tips_id");

    $hasil3 = tampilkan("SELECT cookbook.*, user.username from cookbook join user on cookbook.user_id = user.user_id 
    where cookbook.judul LIKE '%$keyword%'
    OR cookbook.excerpt LIKE '%$keyword%' limit 4");

    $hasil4 = tampilkan("SELECT * from user where username LIKE '%$keyword%' OR id_cookpad LIKE '%$keyword%'");

    $hasil = array();
    $hasil["resep"] = $hasil1;
    // $hasil["tips"] = $hasil2;
    $hasil["cookbook"] = $hasil3;
    $hasil["user"] = $hasil4;
    $hasil["keyword"] = $keyword;

    echo "
    <script>
        document.location.href = 'index.php?p=hasil_cari';
    </script>";
    // echo '<pre>';
    // var_dump($sql);
    // echo '</pre>';
    // die;
    return $hasil;
}

function caribahan($data)
{
    global $koneksi;

    if ($data == 'ayam') {
        $keyword = $data;
    } else {
        $keyword = $data["keyword"];
    }
    $hasil = tampilkan("SELECT resep.*, user.username, bahan_resep.* from resep join user on resep.user_id = user.user_id join bahan_resep on resep.resep_id = bahan_resep.resep_id
    where resep.judul LIKE '%$keyword%' 
    OR resep.excerpt LIKE '%$keyword%'
    OR bahan_resep.bahan LIKE '%$keyword%' group by resep.resep_id limit 4");
    // echo '<pre>';
    // var_dump($sql);
    // echo '</pre>';
    // die;
    $hasil[0]["keyword"] = $keyword;
    return $hasil;
}
function carialat($data)
{
    global $koneksi;

    if ($data == 'teflon') {
        $keyword = $data;
    } else {
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

function resepcookbook($data)
{
    // var_dump($data); die;
    global $koneksi;
    $rid = $data["resep_id"];
    $cid = $data["cookbook_id"];

    $sts = hitung("SELECT * from resep_cookbook where resep_id = $rid and cookbook_id = $cid");
    if ($sts > 0) {
        echo "
        <script>
            alert('resep sudah ada di dalam cookbook');
            document.location.href = '';
        </script>";

    } else {

        $query = mysqli_query($koneksi, "INSERT into resep_cookbook(cookbook_id, resep_id) values ($cid, $rid)");

        if ($query === TRUE) {
            echo "
                    <script>
                        alert('resep berhasil ditambahkan');
                        document.location.href = '';
                    </script>";
        } else {
            echo "
                    <script>
                        alert('resep gagal ditambahkan');
                        document.location.href = '';
                    </script>";
        }

    }

}


function editprofil($data)
{
    // var_dump($data);
    // die;
    global $koneksi;
    $uid = $_SESSION["id_user"];
    $username = $data['username'];
    $email = $data['email'];
    $asal = $data['asal'];
    $deskripsi = $data['deskripsi'];
    $id_cookpad = $data['id_cookpad'];

    $tes = tampilkan("SELECT email, profil_image, id_cookpad from user where user_id = $uid")[0];
    $email_lama = $tes["email"];
    $gambar_lama = $tes["profil_image"];
    $id_lama = $tes["id_cookpad"];

    if ($_FILES['gambar']['error'] === 4) {
        // var_dump($gambar_lama);
        // die;
        $gambar = $gambar_lama;
    } else {
        $gambar = upload();

    }



    if ($email == $email_lama) {
        if ($id_cookpad == $id_lama) {
            mysqli_query($koneksi, "UPDATE user set username = '$username', email = '$email', id_cookpad = '$id_cookpad', deskripsi = '$deskripsi', asal = '$asal', profil_image = '$gambar' where user_id = $uid ");
            echo "
                <script>
                    alert('update Akun Berhasil');
                    document.location.href = 'index.php?p=profil';
                </script>";
        } else {
            $cek_id = mysqli_query($koneksi, "SELECT id_cookpad FROM user WHERE id_cookpad = '$id_cookpad'");
            if (mysqli_num_rows($cek_id) > 0) {
                echo "
                <script>
                    alert('id sudah digunakan');
                    document.location.href = '';
                </script>";
            } else {
                mysqli_query($koneksi, "UPDATE user set username = '$username', email = '$email', id_cookpad = '$id_cookpad', deskripsi = '$deskripsi', asal = '$asal', profil_image = '$gambar' where user_id = $uid ");
                echo "
                <script>
                    alert('update Akun Berhasil');
                    document.location.href = 'index.php?p=profil';
                </script>";
            }
        }

    } else {
        if ($id_cookpad == $id_lama) {
            $cekEmail = mysqli_query($koneksi, "SELECT email FROM user WHERE email = '$email'");
            if (mysqli_num_rows($cekEmail) > 0) {
                echo "
                <script>
                    alert('Email sudah digunakan');
                    document.location.href = '';
                </script>";
            } else {
                mysqli_query($koneksi, "UPDATE user set username = '$username', email = '$email', id_cookpad = '$id_cookpad', deskripsi = '$deskripsi', asal = '$asal', profil_image = '$gambar' where user_id = $uid ");
                echo "
                <script>
                    alert('update Akun Berhasil');
                    document.location.href = 'index.php?p=profil';
                </script>";
            }
        } else {
            $cek_id = mysqli_query($koneksi, "SELECT id_cookpad FROM user WHERE id_cookpad = '$id_cookpad'");
            if (mysqli_num_rows($cek_id) > 0) {
                echo "
                <script>
                    alert('id sudah digunakan');
                    document.location.href = '';
                </script>";
            } else {
                mysqli_query($koneksi, "UPDATE user set username = '$username', email = '$email', id_cookpad = '$id_cookpad', deskripsi = '$deskripsi', asal = '$asal', profil_image = '$gambar' where user_id = $uid ");
                echo "
                <script>
                    alert('update Akun Berhasil');
                    document.location.href = 'index.php?p=profil';
                </script>";
            }

        }

    }
}


function hapusresep($data)
{
    $id = $data["resep_id"];
    global $koneksi;
    if ($koneksi) {

        $sql = "DELETE FROM resep WHERE resep_id = $id";
        mysqli_query($koneksi, $sql);
        echo "<script> alert ('resep berhasil dihapus');</script>";
        echo "<script>window.location.href = 'index.php?p=profil';</script>";
    } else if ($koneksi->connect_error) {
        echo "<script> alert ('resep gagal dihapus');</script>";
        echo "<script>window.location.href = '';</script>";
    }
}
function hapustips($data)
{
    $id = $data["tips_id"];
    global $koneksi;
    if ($koneksi) {

        $sql = "DELETE FROM tips WHERE tips_id = $id";
        mysqli_query($koneksi, $sql);
        echo "<script> alert ('tips berhasil dihapus');</script>";
        echo "<script>window.location.href = 'index.php?p=profil';</script>";
    } else if ($koneksi->connect_error) {
        echo "<script> alert ('tips gagal dihapus');</script>";
        echo "<script>window.location.href = '';</script>";
    }
}





?>