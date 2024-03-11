<?php
session_start();
//koneksi ke database
include 'koneksi.php';

$id_sub = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param=parameter.id_param WHERE id_sub='$id_sub' ");
$detailsub = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Detail Sub Parameter</title>
  <!-- icon -->
  <link rel="icon" href="file/logo.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/parameter.css">
</head>
<body style="background-color: white;">
  <div class="all">
  		<div class="header">
        <h2>Detail Sub Parameter</h2>
  		</div> 
    <div class="container container2">
      <div class="container-fluid">
        <form method="post" enctype="multipart/form-data">
          <table class="table" style="border-color: black;">         
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Nama Parameter</th>
              <td style="border: 3px solid #307EA1; color: black;"><?php echo $detailsub["nama_parameter"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Sub Parameter</th>
              <td style="border: 3px solid #307EA1; color: black;"><?php echo $detailsub["nama_sub_parameter"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Satuan Nilai</th>
              <td style="border: 3px solid #307EA1; color: black;"><?php echo ($detailsub["satuan_nilai"]); ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Batas Nilai Min</th>
              <td style="border: 3px solid #307EA1; color: black;"><?= $detailsub['batas_nilai_min']; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Batas Nilai Max</th>
              <td style="border: 3px solid #307EA1; color: black;"><?php echo $detailsub["batas_nilai_max"]; ?></td>
            </tr>
            <tr style="background-color: white">
              <th style="border: 3px solid #307EA1; color: black;">Batas Nilai Max</th>
              <td style="border: 3px solid #307EA1; color: black;"><?php echo $detailsub["batas_nilai_max"]; ?></td>
            </tr>
            <br>
          </table>
        </form>
        <a href="sub_parameter.php" class="btn btn-primary" style="color: black; background-color: #ffff; border: 4px solid #ffff; border-radius: 0.6em;" ><b>Kembali</b></a>
      </div>
      <br>
      <br>
    </div>
  </div>
</body>
</html>
