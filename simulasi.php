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
<?php include "navbar.phtml";
//gak tau ini apa, siapa tau penting
$array = explode("\n", file_get_contents('hasilSelMas.txt'));
foreach ($array as $row){
  $app[] = $row;
}
$array = explode("\n", file_get_contents('hasilPelMas.txt'));
foreach ($array as $row){
  $wpm[] = $row;
}
$array = explode("\n", file_get_contents('hasilSelKel.txt'));
foreach ($array as $row){
  $wkwk[] = $row;
}
$array = explode("\n", file_get_contents('hasilPelKel.txt'));
foreach ($array as $row){
  $wakanda[] = $row;
}

?>
  <!-- Page Content -->
    <div class="container">
      
      <div class="row pt-3">
        <div class="col-lg-12">
          <h4>Simulasi Lama Pelayanan Antrian Masuk dan Keluar Kendaraan</h4>
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col"><center>No</center></th>
                <th scope="col"><center>Antar Kedatangan Pengendara</center></th>
                <th scope="col"><center>Komulatif Kedatangan</center></th>
                <th scope="col"><center>Waktu Pelayanan Masuk</center></th>
                <th scope="col"><center>Total Waktu selesai masuk</center></th>
                <th scope="col"><center>Antar Keluar Pengendara</center></th>
                <th scope="col"><center>Komulatif Keluar</center></th>
                <th scope="col"><center>Waktu Pelayanan Keluar</center></th>
                <th scope="col"><center>Total Waktu selesai keluar</center></th>
              </tr>
            </thead>  
            <tbody>
            <?php for ($i=0; $i < 20; $i++) {
              ?>
            <tr>
              <td><?=$i+1;?></td>
              <td><?=$app[$i];?></td>

              <td><?php echo $sick = $app[$i]+$sick; ?></td>
              <td><?php echo $wpm[$i]; ?></td>
              <td><?php echo $wpm[$i]+$sick; ?></td>
              <td><?php echo $wkwk[$i]; ?></td>
              <td><?php echo $sick2 = $wkwk[$i]+$sick2; ?></td>
              <td><?php echo $wakanda[$i]; ?></td>
              <td><?php echo $wakanda[$i]+$sick2; ?></td>
            </tr>
            <?php } ?>  
            </tbody>
          </table>
        </div>
    </div>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="suhe/jquery/jquery.min.js"></script>
  <script src="suhe/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>
