<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="../asset/css/tambahan.css">
  <link rel="stylesheet" href="../asset/icon/css/font-awesome.min.css" />


  <link rel="icon" href="">
  <title>Tubes SBD</title>
</head>

<body style="background-color: #f8f6f2;">

  <!-- Navbar start -->
  <nav class="navbar navbar-expand-lg bg-white sticky-top shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="../asset/img/cookpad_logo.png" alt="" height="40"></a>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link" href="../index.php"><img class="img-nav" src="../asset/img/beranda.png" alt=""
                height="20">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php?p=cari"><img class="img-nav" src="../asset/img/cari.png" alt=""
                height="20">Cari</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php?p=buat"><img class="img-nav" src="../asset/img/tambah.png" alt=""
                height="20">Buat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php?p=aktivitas"><img class="img-nav" src="../asset/img/aktivitas.png" alt=""
                height="20">Aktivitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php?p=profil"><img class="img-nav" src="../asset/img/profil.png" alt=""
                height="20">Profil</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--Navbar end -->


  <!-- Body Starts -->

  <div>
    <div class="container" style="width: 60%;">

      <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
          <br>
          <div class="center-div">
            <h4><b>Ganti Id Cookpad</b></h4>
            <img alt="" class="rounded-circle" src="../asset/img/profil.png" width="40%">
            <h4><b>Nama User</b></h4>
          </div>

          <br>

          <form action="">
            <div class="input-group mb-3">
              <span class="input-group-text" id="idcookpad">@</span>
              <input type="text" id="idcookpad" class="form-control" placeholder="Username"
                value="id_cookpad Sebelumnya">
            </div>
          </form>

          <small>
            <b>ID Cookpad dapat terdiri dari:</b>
            <ul type="square">
              <li>4-20 karakter</li>
              <li>arakter dapat berupa huruf, angka, atau _</li>
              <li>Tidak menggunakan spasi</li>
            </ul>
          </small>

          <button class="btn btn-secondary" style="width: 100%;">
            Konfirmasi ID Cookpad
          </button>
        </div>
        <div class="col-3"></div>
      </div>

      <br>
    </div>

    <!-- Body End -->

    <!-- Script Bootstrap -->
    <script src="../asset/js/bootstrap.bundle.min.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/jquery.js"></script>
</body>

</html>