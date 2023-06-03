<?php
require_once "./function.php";
$idcb = $_GET["idcb"];

$result = tampilkan("SELECT cookbook.cookbook_id, cookbook.judul, cookbook.excerpt, user.username, user.id_cookpad, user.user_id FROM cookbook LEFT JOIN user on cookbook.user_id=user.user_id WHERE cookbook.cookbook_id = '$idcb' ")[0];
$resep = tampilkan("SELECT resep.*,user.username, user.profil_image FROM resep JOIN user on resep.user_id = user.user_id WHERE resep_id IN(SELECT resep_id FROM resep_cookbook WHERE cookbook_id = '$idcb') order by resep.resep_id ");
// echo "<pre>";
// var_dump($resep);
// echo "</pre>";
?>

<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container">
    <br>
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <div class="card">
          <div class="card-body">
            <br>
            <!-- tombol edit -->
            <div class="text-center">
              <img src="asset/img/buat.svg" alt="" width="30%">
              <br><br>
            </div>
            <!-- isi -->
            <div class="row">
              <div class="col-8">
                <div>
                  <p>Cookbook Publik</p>
                  <h3>
                    <?= $result["judul"] ?>
                  </h3>
                  <p><span>
                    <img alt="profil" class="rounded-circle" <?php if (empty($result["profil_image"])) { ?>
                                  src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $result['profil_image'] ?>"
                                <?php } ?>style="width: 30px; height: 30px;">&nbsp;
                      <?= $result["username"] ?>
                    </span>&nbsp; @
                    <?= $result["id_cookpad"] ?>
                  </p>
                  <p>
                    <?= $result["excerpt"] ?>
                  </p>
                </div>
              </div>

              <div class="col-2"></div>
              <div class="col-2 d-flex align-items-center">
                <?php
                if ($_SESSION["id_user"] == $result["user_id"]) { ?>
                  <a href="index.php?p=edit_cookbook&idcb=<?= $result["cookbook_id"] ?>"><img src="asset/img/sunting.png"
                      alt="" width="20%"></a>

                <?php } else {
                } ?>
              </div>

              <div class="col-1"></div>

            </div>
          </div>
        </div>
        <br>
        <!-- jumlah resep -->
        <!-- jumlah resep -->

        <br>
        <!-- tambah resep -->
        <!-- tambah resep -->
        <div class="card">
          <div class="card-body">

            <div class="card">
              <div class="card-body">
                <?php
                foreach ($resep as $resep) { ?>


                  <div class="row g-0 mb-2 border">
                    <div class="col-md-8">
                      <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>"
                        class="text-decoration-none text-dark">
                        <div>
                          <p><small class="text-muted">
                              <img alt="profil" class="rounded-circle" <?php if (empty($resep["profil_image"])) { ?>
                                  src="asset/img/profil.png" <?php } else { ?> src="gambar/<?= $resep['profil_image'] ?>"
                                <?php } ?>style="width: 30px; height: 30px;">&nbsp;
                              @
                              <?= $resep["username"] ?>
                            </small></p>
                          <br>
                          <h4>
                            <?= $resep["judul"] ?>
                          </h4>
                          <p>
                            <?php
                            $id = $resep["resep_id"];
                            $bahan = tampilkan("SELECT * from bahan_resep where resep_id = $id");
                            foreach ($bahan as $bahan) {
                              echo $bahan["bahan"];
                              echo " • ";
                            }
                            ?>
                          </p>
                        </div>
                      </a>
                    </div>
                    <div class="col-md-4">
                      <img src="gambar/<?= $resep["image"] ?>" class="img-fluid rounded-start"
                        style="width: 300px; height: 200px;" alt="...">
                    </div>
                  </div>
                <?php }
                ?>

                <!-- Button trigger modal -->
                <?php
                if ($_SESSION["id_user"] == $result["user_id"]) { ?>

                  <button type="button" class="btn btn-cookpad text-center" data-bs-toggle="modal"
                    data-bs-target="#myModal">
                    Tambahkan Resep
                  </button>
                <?php } ?>
                <br>

              </div>
            </div>
          </div>

        </div>
        <?php
        if (isset($_POST["resep_cookbook"])) {
          $_POST["cookbook_id"] = $idcb;
          resepcookbook($_POST);
        }
        ?>


        <!-- Modal Cari Resep -->
        <!-- Modal Cari Resep -->
        <!-- Modal Cari Resep -->

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">

                <form class="d-flex" id="searchForm" method="post">
                  <input class="form-control me-2" type="search" placeholder="Cari Resep" aria-label="Search"
                    id="keyword-resep">
                  <button class="btn btn-outline-secondary" type="submit" id="tombol-cookbook">Cari</button>
                </form>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!-- tampilan hasil resep start-->


              <div class="modal-body" id="hasil-resep">


              </div>
              <!-- tampilan hasil resep end-->

            </div>
          </div>
        </div>


      </div>

      <br>

    </div>

    <div class="col-2"></div>

  </div>
  <br>
</div>

<script>
  document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Mencegah form submit default

    const searchTerm = document.getElementById('searchInput').value; // Ambil nilai input pencarian

    // Lakukan permintaan pencarian menggunakan AJAX ke function.php
    fetch(`function.php?term=${searchTerm}`)
      .then(response => response.json())
      .then(data => {
        // Tampilkan hasil pencarian di dalam modal
        displaySearchResults(data);
      })
      .catch(error => {
        console.error('Error:', error);
      });
  });

  // Fungsi untuk menampilkan hasil pencarian di dalam modal
  function displaySearchResults(results) {
    const searchResults = document.getElementById('searchResults');

    // Hapus konten hasil pencarian sebelumnya (jika ada)
    searchResults.innerHTML = '';

    // Tambahkan konten hasil pencarian baru ke dalam modal
    results.forEach(result => {
      const resultItem = document.createElement('div');
      resultItem.textContent = result.title;
      searchResults.appendChild(resultItem);
    });
  }

  // // Fungsi untuk membuka modal
  // function openModal() {
  //   document.getElementById('myModal').style.display = 'block';
  // }
</script>


<!-- Body End -->