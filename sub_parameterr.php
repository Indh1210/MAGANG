<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Sub Parameter</title>
  <link rel="icon" href="file/logo.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
</head>
<body style="background-color: #edeff0;" content="width=device-width, initial-scale=1">
  <!-- Sidenav -->
  <?php include 'side_bar.php' ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">SUB PARAMETER</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent">
              <h3 class="mb-0">Data Sub Parameter</h3>
            </div>
            <div class="card-body">
              <div class="icon-examples">
                <a href="tambah_sub_parameter.php" class="btn btn-info">Tambah Data</a>
                <br></br>
                <table class="table table-hover " >
                  <thead align="center">
                    <tr class="bg-primary"  style="color: white; ">
                      <th><b>No</b></th>
                      <th><b>Parameter</b></th>
                      <th><b>Sub Parameter</b></th>
                      <th><b>Nilai Satuan</b></th>
                      <th><b>Batas Nilai Min.</b></th>
                      <th><b>Batas Nilai Maks.</b></th>
                      <th><b>Aksi</b></th>
                    </tr>
                  </thead>
                  <tbody align="center" >
                    <?php $nomor=1; ?>
                    <?php $ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param = parameter.id_param"); ?>
                    <?php while($pecah = $ambil->fetch_assoc()){ ?>
                    <tr>
                      <td><?php echo $nomor; ?></td>
                      <td><?php echo $pecah['nama_parameter'];?></td>
                      <td><?php echo $pecah['nama_sub_parameter'];?></td>
                      <td><?php echo $pecah['satuan_nilai'];?></td>
                      <td><?php echo number_format($pecah['batas_nilai_min']);?></td>
                      <td><?php echo number_format($pecah['batas_nilai_max']);?></td>
                      <td>
                        <a class="nav-link" href="hapus_sub_param.php?halaman=hapussub_parameter&id=<?php echo $pecah['id_sub']; ?>">
                          <span class="btn-danger btn" style=" width: 130px;">Hapus</span>
                        </a>
                        <a class="nav-link" href="ubah_sub_param.php?halaman=ubahsub_parameter&id=<?php echo $pecah['id_sub']; ?>">
                          <!-- <span class="btn btn-warning" style=" width: 130px;">Ubah</span> -->
                          <span class="btn btn-info" style=" width: 130px;">Ubah</span>
                        </a>
                        <a class="nav-link" href="detail_sub_param.php?halaman=detailsub_parameter&id=<?php echo $pecah['id_sub']; ?>">
                          <span class="btn btn-info" style=" width: 130px; background-color: #28B5B5;">Detail</span>
                        </a>
                      </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
      </div>
    </div>
  </div>
  <!-- Core -->
  <!-- <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script> -->
</body>
</html>
