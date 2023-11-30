<?php
$idbp = $_GET["idbp"];
$bahan = tampilkan("SELECT * from bahan_pilihan where bp_id = $idbp")[0];
$bahanuy = $bahan["bahan"];
// $temp = cari($bahanuy);
$resep = tampilkan("SELECT resep.*, user.username, bahan_resep.* from resep join user on resep.user_id = user.user_id 
join bahan_resep on resep.resep_id = bahan_resep.resep_id
where resep.judul LIKE '%$bahanuy%' 
OR resep.excerpt LIKE '%$bahanuy%'
OR bahan_resep.bahan LIKE '%$bahanuy%' group by resep.resep_id");
?>

<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container">

    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <!-- konten start -->
        <div class="card">
          <!-- Gambar bahan -->
          <!-- <img src="asset/img/ban1.jpg" alt=""> -->

          <div class="card-body">
            <!-- nama bahan -->
            <h3>
              <?= $bahan["bahan"] ?>
            </h3>
            <br>

            <!-- Deskripsi Bahan -->
            <p>
              <?= $bahan["deskripsi"] ?>
            </p>

            <br> <br>

            <!-- resep -->
            <!-- resep -->
            <h3>Resep</h3>
            <div class="row row-cols-3 g-3">

              <?php foreach ($resep as $resep): ?>
                <a href="index.php?p=detail_resep&idr=<?= $resep["resep_id"] ?>" class=" text-decoration-none text-dark ">
                  <div class="col">
                    <div>
                      <p>
                        <?= $resep["username"] ?>
                      </p>
                    </div>
                    <div class="card">
                      <img class="card-img" src="gambar/<?= $resep["image"] ?>" style="height: 250px; width: 262px;"
                        alt="...">
                      <div class="card-body">
                        <h5 class="card-title">
                          <?= $resep["judul"] ?>
                        </h5>
                        <p>
                          <?= $resep["excerpt"] ?>
                        </p>
                      </div>
                    </div>
                  </div>
                </a>
              <?php endforeach ?>

            </div>
            <br>
            <!-- button -->


            <!-- rekomendasi bahan lain -->

          </div>
        </div>
        <!-- konten end -->
      </div>
      <div class="col-2"></div>
    </div>

  </div>
  <br>
</div>

<!-- Body End -->



<!-- Script Bootstrap -->
<script>
  function toggleReadMore() {
    var content = document.querySelector('.read-more-content');
    var button = document.querySelector('button');

    if (content.style.display === 'none') {
      content.style.display = 'block';
      button.textContent = 'Sembunyikan';
    } else {
      content.style.display = 'none';
      button.textContent = 'Selengkapnya';
    }
  }
</script>