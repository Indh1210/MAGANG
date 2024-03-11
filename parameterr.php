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
  <title>Parameter</title>
  <link rel="icon" href="file/logo.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
</head>
<body style="background-color: #edeff0;">
  <?php include 'side_bar.php' ?>
  <div class="main-content" id="panel">
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">PARAMETER SAMPLE</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6" >
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card">
            <div class="card-header bg-transparent" >
              <h3 class="mb-0">Parameter</h3>
            </div>
            <body style="background-color: #e6eefa;">
            <div class="all" >
            	<div class="container container2"  >
            		<form method="post">
            			<div class="row" >
                  <div class="col-md-5">
                      <label>Masukkan Parameter</label>
                      <input type="text" name="nama_parameter" class="form-control" >
                  </div>
                  <!-- <div class="col-md-5">
                    <label>Masukkan Id Pegawai</label>
                    <input type="text" class="form-control" name="id_pegawai">
                  </div> -->
                  <div class="col-md-2">
                    <div><br>
                      <button class="btn btn-info " name="save">Tambah</button>
                    </div>
                  </div>
                    <!-- <table>
                      <tr>
                        <label>Masukkan Parameter</label>
                        <td class="col-md-4">
                          <input type="text" class="form-control" name="nama_parameter" style="width: 100px">
                        </td>
                        <label>Masukkan Id Pegawai</label>
                        <td class="col-md-4">
                          <input type="text" class="form-control" name="id_pegawai" style="width: 1000px">
                        </td>
                      </tr>
                      <tr>
                      <td>
                          <button class="btn btn-info " name="save" style="position: relative; left: 30px; width: 100px;">Tambah</button></a>
                        </td>
                      </tr>
                    </table> -->
            			</div>
            		</form>
              </div>
            </div>
    <?php
        if (isset($_POST['save']))
            {
              $koneksi->query("INSERT INTO parameter (nama_parameter) VALUES('$_POST[nama_parameter]')");

            echo "<div class='alert alert-info'>Data tersimpan</div>";
            echo "<script>location='parameter.php?halaman=sub_parameter';</script>";
        }
    ?>

    <?php
        $ambil = $koneksi-> query("SELECT*FROM parameter");
        while ($tiap = $ambil->fetch_assoc())
        {
            $semuadata[] = $tiap;
        } 
    ?>

    <div class="card-body">
      <div class="row icon-examples">
        <table class="table table-hover ">
          <thead  >
            <tr class="bg-primary"  style="color: white; ">
              <th><b>No</b></th>
              <td><b>Parameter</b></td>
              <td><b>Aksi</b></td>
            </tr>
          </thead>
          <tbody>
            <?php $nomor=1; ?>
              <?php $ambil = $koneksi->query("SELECT * FROM parameter"); ?>
                <?php while($pecah = $ambil->fetch_assoc()){ ?>
                  <tr>
                    <td><?php echo $nomor; ?></td>
                      <td>
                        <?php echo $pecah['nama_parameter'];?></td>
                      <td>
                      <a href="hapus_parameter.php?halaman=hapus_parameter&id=<?php echo $pecah['id_param']; ?>">
                      <span class="btn btn-danger" style="width: 100px;"><b>Hapus</b></span>
                      </a>
                      </td>
                  </tr>
                      <?php $nomor++; ?>
              <?php } ?>
            </tbody>
        </table>
      </div>
    </div>
<!-- 
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script> -->
</body>
</html>