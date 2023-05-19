<!DOCTYPE html>
<html>
<head>
   <title>Merubah Tampilan Input File HTML</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <style>
   .container_{margin:10px;padding:10px;border:solid 1px teal;}
   .image_upload > input{display:none;}
   input[type=text]{width:220px;height:auto;}
   </style>
</head>
<body>
<form action="" method="post">
   <div class="container_">
     <p>
     <label for="nama_lengkap">Nama Lengkap :</label>
     <input type="text" name="nama" id="nama_lengkap">
   </p>
   <p>
     <label for="alamat">Alamat :</label>
     <input type="text" name="alamat" id="alamat">
   </p>
   <p>Sisipkan File /Gambar :</p>
   <p class="image_upload">
     <label for="userImage">
     <a class="btn btn-warning btn-sm" rel="nofollow"><span class='glyphicon glyphicon-paperclip'></span> Sisipkan Gambar</a>
     </label>
     <input type="file" name="userImage" id="userImage">
   </p>
   <input type="file" name="" id="">
   </div>
</form>
</body>
</html>