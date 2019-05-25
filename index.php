<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Tubes - MOSI</title>
  <link href="suhe/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="suhe.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
<?php include "navbar.phtml";?>

  <!-- Page Content -->
    <div class="container">
    <main role="main" class="container">
      <div class="my-3 p-4 bg-white rounded box-shadow">
        <h4 class="border-bottom border-dark pb-3 mb-0">Fitur</h4>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Data antar kedatangan masuk</strong>
            Berisi data lama kedatangan setiap pengendara, merupakan fungsi waktu sehingga bersifat probabilistik.
          </p>
          <small class="d-block text-right">
            <a href="selisihmasuk.php" class="badge badge-secondary"> Klik di sini </a>
          </small>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Data lama masuk</strong>
            Berisi data lama pelayanan masuk setiap pengendara, merupakan fungsi waktu sehingga bersifat probabilistik.
          </p>
          <small class="d-block text-right">
            <a href="pelayananmasuk.php" class="badge badge-secondary"> Klik di sini </a>
          </small>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Data selisih lama pengendara saat keluar</strong>
            Berisi data lama selisih waktu antara pengendara, merupakan fungsi waktu sehingga bersifat probabilistik.
          </p>
          <small class="d-block text-right">
            <a href="selisihkeluar.php" class="badge badge-secondary"> Klik di sini </a>
          </small>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Data pelayanan saat kendaraan keluar</strong>
            Berisi data lama pelayanan keluar setiap pengendara  fasilitas, merupakan fungsi waktu sehingga bersifat probabilistik.
          </p>
          <small class="d-block text-right">
          <a href="pelayanankeluar.php" class="badge badge-secondary"> Klik di sini </a>
          </small>
        </div>
        <div class="media text-muted pt-3">
          <p class="media-body pb-3 mb-0 small lh-125 ">
            <strong class="d-block text-gray-dark">Data Simulasi</strong>
            Simulasi Lama Pelayanan Antrian Masuk dan Keluar Kendaraan
          </p>
          <small class="d-block text-right">
          <a href="simulasi.php" class="badge badge-secondary"> Klik di sini </a>
          </small>
        </div>
      </div>

    </main>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="suhe/jquery/jquery.min.js"></script>
  <script src="suhe/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
