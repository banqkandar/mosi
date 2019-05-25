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
  <div class="row mt-3">
      <h4>Data pelayanan saat kendaraan keluar</h4>
      <table class="table table-hover table-dark">
          <tr>
          <?php
              //data .. silahkan pusing sendiri wkwkw
              $i = 1;
              $array = explode("\n", file_get_contents('pelayanankeluar.txt'));
              foreach ($array as $row){
                $fi++;
                if ($i % 5 != 0) { 
                 echo "<td>$row</td>"; 
                } else{
                 echo "<td>$row</td></tr>";
                }
              $i++; } 
              
              $min = min($array);
              $gud = false;
              $btBw = $min;
              while ($gud != true) {
                if($btBw[0] == 0) {
                  $btBw = substr($btBw, 1, $btBw.length);
                } else {
                  $gud = true;
                }
              }
              $max = max($array);
              $r = $max - $min;          
              $k=number_format(1+3.3*log10($fi),5);
              $k2=number_format(1+3.3*log10($fi),0);
              $p=number_format($r/$k,0);

              $fi = array();
              $btsBw = array($min);
              $btsAt = array($min+$p-1);
              for ($j = 0; $j <= $k2; $j++) {
                $fi[] = 0;
                if ($j < $k2-1) {            
                  $btsBw[] = $btsAt[$j]+1;
                  $btsAt[] = $btsBw[$j+1]+$p-1;
                }                
              }

              //mencari fi
              foreach ($array as $row){
                for($j = 0; $j <= $k2; $j++) {
                  if($row>=$btsBw[$j]&& $row<=$btsAt[$j]) { $fi[$j]++;}
                }
              }

              // yang ada di tabel
              $fiTot = array_sum($fi);

              $xi = array();
              $fixi = array();
              for ($j = 0; $j <= $k2; $j++) {   
                $xi[] = ($btsBw[$j]+$btsAt[$j])/2;
                $fixi[] = $xi[$j]*$fi[$j];
              }
              $fixiTot = array_sum($fixi);

              $rata2 = $fixiTot/$fiTot;

              $xix = array();
              $fiksi = array();
              for ($j = 0; $j <= $k2; $j++) {   
                $xix[] = abs($xi[$j]-$rata2);
                $fiksi[] = $fi[$j]*pow($xix[$j],2);
              }
              
              $fiksiTot = array_sum($fiksi);

              $deviasi = number_format(sqrt($fiksiTot/$fiTot),3);
              
              $a = 11;
              $m = 135;
              $z0 = 9833;
              $c = 81;
              $zz = array();
              $u1 = array();
              for ($i = 1; $i < 23; $i++){
                $z0 = ($a*$z0+$c)%$m;
                $zz[] = $z0; 
                $ui = $z0/$m;
                $u1[] = $ui;
              }
            ?>
        </table>
      </div>
      
      <div class="row">
        <div class="col-lg-4">
          <h4>Menentukan Interval</h4>
          <table class="table table-hover">
          <tbody>
              <tr>
                <i>Datum terbesar = <?= $max; ?>, Datum Terkecil = <?= $btBw; ?></i>
                <td>Jangkauan</td><td><?=$r;?></td>
              </tr>
              <tr>
                <td>Banyak Interval</td>
                <td><?=$k2;?></td>
              </tr>
              <tr>
                <td>Panjang Interval</td><td><?=$p;?></td>
              </tr>
            </tbody>
          </table>
          <h4>Hasil Table di samping</h4>
          <table class="table table-hover">
            <tbody>
            <tr>
                <td>Total fi(|xi-x|)^2</td><td><?=number_format($fiksiTot,3);?></td>
              </tr>
              <tr>
                <td>Total fi</td><td><?=$fiTot;?></td>
              </tr>
              <tr>
                <td>Total fi * xi</td><td><?=$fixiTot;?></td>
              </tr>
              <tr>
                <td>Rata-rata </td><td><?=number_format($rata2,3);?></td>
              </tr>
              <tr>
                <td>Standar deviasi</td><td><?=$deviasi;?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-lg-8">
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">Interval</th>
                <th scope="col">fi</th>
                <th scope="col">xi</th>
                <th scope="col">fi*xi</th>
                <th scope="col">xi*x</th>
                <th scope="col">fi(x-xi)^2</th>
              </tr>
            </thead>  
            <tbody>
            <?php for ($i=0; $i < $k2; $i++) { ?>
              <tr>
                <td><?=$i+1?></td>
                <td><?php 
                if ($i==0) {
                  $btsBw[$i] = $btBw;
                }
                echo $btsBw[$i]?>-<?=$btsAt[$i]?></td>
                <td><?=$fi[$i]?></td>
                <td><?=$xi[$i]?></td>
                <td><?=$fixi[$i]?></td>
                <td><?=number_format($xix[$i],1);?></td>
                <td><?=number_format($fiksi[$i],2)?></td>
              </tr>
            <?php }?>
          </table>
        </div>
        <div class="col-lg-12">
          <h4>Bilangan Acak & Variabel yang dibangkitkan</h4>
          <table class="table table-hover">
            <thead class="thead-dark">
              <tr>
                <th scope="col">No</th>
                <th scope="col">zi</th>
                <th scope="col">ui</th>
                <th scope="col">ui+1</th>
                <th scope="col">(-2lnUi)^1/2</th>
                <th scope="col">SIN(2πUi+1)</th>
                <th scope="col">z</th>
                <th scope="col">X = rata+deviasi*Z</th>
                <th scope="col">Hasil</th>
              </tr>
            </thead>  
            <tbody>
              <?php
              for ($x = 0; $x < 20; $x++){?>
              <tr>
                <td><?=$x+1;?></td>
                <td><?=$zz[$x];?></td>
                <td><?=$uii=number_format($u1[$x],3);?></td>
                <td><?=$uii1=number_format($u1[$x+1],3);?></td>
                <td><?=$ln=number_format(sqrt(-2*log($uii, 2.718281828)),3);?></td>
                <td><?=$sin=number_format(sin(2*3.14*$u1[$x+1]),3);?></td>
                <td><?=$z=number_format($ln*$sin,3);?></td>
                <td><?=$xxx=number_format($rata2+($deviasi*$z),3);?></td>
                <td><?=$hasil[]=round($xxx);?></td>
              </tr>
              <?php } ?>
            </tbody>
            <?php 
            $new_line = "\n";
            $file_pointer = './hasilPelKel.txt';
            if(!file_exists($file_pointer)) {
              foreach ($hasil as $data) {
                file_put_contents('hasilPelKel.txt', print_r($data, TRUE), FILE_APPEND); 
                file_put_contents('hasilPelKel.txt', print_r($new_line, TRUE), FILE_APPEND);
              }
            } else {
              unlink($file_pointer) or die("Couldn't delete file");
              foreach ($hasil as $data) {
                file_put_contents('hasilPelKel.txt', print_r($data, TRUE), FILE_APPEND); 
                file_put_contents('hasilPelKel.txt', print_r($new_line, TRUE), FILE_APPEND);
              }
            } 
            ?>
          </table>
        </div>
    </div>

  <!-- Bootstrap core JavaScript -->
  <script src="suhe/jquery/jquery.min.js"></script>
  <script src="suhe/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>