<?php
require_once "./function.php";
$idcb = $_GET["idcb"];

$result = tampilkan("SELECT cookbook.cookbook_id, cookbook.judul, cookbook.excerpt, user.username FROM cookbook LEFT JOIN user on cookbook.user_id=user.user_id WHERE cookbook.cookbook_id = '$idcb' ")[0];
$resep = tampilkan("SELECT resep.*,user.username FROM resep JOIN user on resep.user_id = user.user_id WHERE resep_id IN(SELECT resep_id FROM resep_cookbook WHERE cookbook_id = '$idcb')  ");
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
                  <p><span><img src="asset/img/profil.png" alt="" width="3%">&nbsp;
                      <?= $result["username"] ?>
                    </span>&nbsp; @cookbook_id</p>
                  <p>
                    <?= $result["excerpt"] ?>
                  </p>
                </div>
              </div>

              <div class="col-2"></div>
              <div class="col-2 d-flex align-items-center">
                <a href="editcookbook.html"><img src="asset/img/sunting.png" alt="" width="20%"></a>
              </div>

              <div class="col-1"></div>

            </div>
          </div>
        </div>
        <br>
        <!-- jumlah resep -->
        <!-- jumlah resep -->
        <div class="card">
          <div class="card-body">

            <div class="row text-center">
              <div class="col-4">
                <p>0/40</p>
                <p style="font-size: 13px;">Resep</p>
              </div>
              <div class="col-4">
                <p>1</p>
                <p style="font-size: 13px;">Kolaborator</p>
              </div>
              <div class="col-4">
                <p>0</p>
                <p style="font-size: 13px;">Pengikut</p>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="row g-3">

                  <div class="col-8 d-flex align-items-center">
                    <p>Undang kolaborator untuk membantumu menambahkan resep ke Cookbook ini.</p>
                  </div>

                  <div class="col-4 text-center d-flex align-items-center justify-content-center">
                    <button class="btn btn-cookpad">
                      undang
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>

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
                      <div>
                        <p><small class="text-muted"><img src="asset/img/profil.png" alt="" width="5%">&nbsp;
                            @
                            <?= $resep["username"] ?>
                          </small></p>
                        <br>
                        <h4>
                          <?= $resep["judul"] ?>
                        </h4>
                        <p>Bahan Masakan
                          Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nobis ipsum hic repellat a quidem
                          deserunt est consequuntur dicta, nesciunt minus, tempore architecto incidunt itaque doloremque!
                          At repudiandae architecto corrupti?
                        </p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <img src="asset/img/ayam.jpeg" class="img-fluid rounded-start" alt="...">
                    </div>
                  </div>
                <?php }
                ?>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-cookpad text-center" data-bs-toggle="modal"
                  data-bs-target="#myModal">
                  Tambahkan Resep
                </button>
                <br>

              </div>
            </div>
          </div>

        </div>


        <!-- Modal Cari Resep -->
        <!-- Modal Cari Resep -->
        <!-- Modal Cari Resep -->

        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">

                <form class="d-flex" id="searchForm">
                  <input class="form-control me-2" type="search" placeholder="Cari Resep" aria-label="Search"
                    id="searchInput">
                  <button class="btn btn-outline-secondary" type="submit">Cari</button>
                </form>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <!-- tampilan hasil resep start-->
              <div class="modal-body" >
                <div class="card" >
                  <div class="row d-flex align-items-center">
                    <div class="col-10">
                      <div class="card-body" id="searchResults">
                        
                      </div>
                    </div>
                    <div class="col-2">
                      <button class="btn btn-secondary">Add</button>
                    </div>
                  </div>
                </div>
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