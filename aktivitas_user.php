<?php
require_once "function.php";

$aktivitas = tampilkan("SELECT * from aktivitas ")
  ?>

<!-- Body Starts -->

<div style="background-color: #f8f6f2;">
  <div class="container" style="position: relative;">
    <div class="container">
      <?php foreach ($aktivitas as $aktivitas): ?>

        <div class="row" style="border: 1px solid; display: ;">
          <div class="col-sm-3 d-flex justify-content-end my-5">
            <img src="asset/img/profil.png" alt="" class="rounded-circle " style="width: 90px; height: 90px;">
          </div>

          <div class="col-sm my-5">
            <p class="fs-3">
              <?= $aktivitas["name"] ?>
            </p>
            <p>
              <?= $aktivitas["pesan"] ?>
            </p>
          </div>
        </div>

      <?php endforeach ?>


      <br>




    </div>
  </div>
</div>

<!-- Body End -->