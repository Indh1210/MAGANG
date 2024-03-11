<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>  
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hasil Pemeriksaan </title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
</head>
<body style="background-color: white;">
    <!-- SideBar -->
    <?php include 'side_bar.php'; ?>
    <div class="main-content" id="panel" >
    <!-- Header -->
    <div class="header bg-primary pb-1">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <h6 class="h2 text-white d-inline-block mb-0">HASIL</h6>
          </div>
        </div>
      </div>
    </div>
	<!-- Tabel -->
	<div class="card-body">
      <div class="row icon-examples">
        <table class="table table-hover ">
          <thead>
            <tr class="bg-primary"  style="color: white; ">
                <th><b>No</b></th>
                <td><b>Sub Parameter</b></td>
                <td><b>Batas Nilai Min</b></td>
                <td><b>Batas Nilai Max</b></td>
			          <td><b>Satuan nilai</b></td>
			          <td><b>Nilai Masukan</b></td>
                <td><b>Hasil</b></td>
            </tr>
          </thead> 
          <tbody>
                <?php $nomor=1; ?>
                <?php $ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param = parameter.id_param");?>
                <?php while ($pecah = $ambil->fetch_assoc()) {

                      $nilaiMasukan = $pecah['nilai_masukan[]'];
                      $batasNilaiMin = $pecah['batas_nilai_min'];
                      $batasNilaiMax = $pecah['batas_nilai_max']; 
                      $hasil = '';

                      if ($nilaiMasukan < $batasNilaiMin || $nilaiMasukan > $batasNilaiMax) {
                        $hasil = "Tidak memenuhi syarat";
                      } else {
                        $hasil = "Memenuhi syarat";
                      }?>

                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $pecah['nama_sub_parameter'];?></td>
                      <td><?php echo $pecah['batas_nilai_min'];?></td>
                      <td><?php echo $pecah['batas_nilai_max'];?></td>
                      <td><?php echo $pecah['satuan_nilai'];?></td>
                      <td><?php echo $pecah['nilai_masukan[]'];?></td>
                      <td><?php echo $pecah['hasil'];?>                  
                      </td>
                    </tr>
                <?php $nomor++; ?>
                <?php } ?>
          </tbody>
        </table>
      </div>
  </div>
    <?php

    ?>
</body>
</html>

