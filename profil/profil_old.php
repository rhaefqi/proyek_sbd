<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
    <div class="container">
        <div class="container-fluid">

            <br><br>

            <!-- Edit Erofile Start -->
            <div class="card">

                <div class="row">

                    <div class="col-2">
                        <div class="p-3">
                            <a href="#">
                                <img alt="Dinira Wijaya" class="rounded-circle" src="asset/img/bekal.jpeg" width="100%">
                            </a>
                        </div>
                    </div>


                    <div class="col-8 ps-0">
                        <div class="p-3 d-inline">
                            <br>
                            <a href="/id/pengguna/38901259">
                                <h1 class="font-semibold">Dinira Wijaya</h1>
                            </a>
                            <div>
                                <p>
                                    <a href="/id/pengguna/38901259">
                                        <span>@id_pengguna</span>
                                    </a>
                                </p>
                                <a class="btn btn-light" href="/id/pengguna/38901259">Lihat Profil Publik</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-2">
                        <p class="p-3">
                            <a href=""><img width="20%" src="asset/img/sunting.png" alt=""></a> &nbsp;
                            <a href=""><img width="20%" src="asset/img/chart.png" alt=""></a> &nbsp;
                            <a href=""><img width="20%" src="asset/img/pengaturan.png" alt=""></a>
                        </p>
                    </div>

                </div>



            </div>
            <!-- Edit Profile End -->
            <br>

            <!-- Link starts -->
            <div>
                <div class="card overflow-scroll">
                    <br>
                    <p class="container">
                        <button type="button" class="btn btn-white text-black"><b>Tersimpan</b></button>
                        <button type="button" class="btn btn-white text-black" name="resep"><b>Resep Saya</b></button>
                        <button type="button" class="btn btn-white text-black" name="cooksnap"><b>Cooksnap</b></button>
                        <button type="button" class="btn btn-white text-black" name="tips"><b>Tips</b></button>
                        <a class="btn btn-white text-black" href="index.php?p=profil&m=cookbook">
                            <b>Cookbook</b>
                        </a>
                    </p>
                </div>
            </div>
            <!-- Link end -->

            <!-- Data yang ditampilkan dari link start -->
            <br>
            <?php
            if (@$_GET['m']) {
                switch($_GET['m']) {
                    case "cookbook":
                        include "profil_cookbook.php";
                    break;
                }
            } else {
                include "profil_simpan.php";
            }
            ?>
            <!-- Data yang ditampilkan dari link end -->


            <!-- Batas resep starts -->
            
            <!-- Batas resep end -->
            <br><br>

        </div>
    </div>
</div>

<!-- Body End -->