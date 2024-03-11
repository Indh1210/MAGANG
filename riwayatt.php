<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<!-- <?php
$dataparameter = array();

$ambil = $koneksi->query("SELECT * FROM parameter ");
while($tiap = $ambil->fetch_assoc())
{
	$dataparameter[] = $tiap;
}
?>  -->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Riwayat</title>
  <link rel="icon" href="file/logo.png" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
</head>
<body style="background-color: #edeff0;">
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
              <h6 class="h2 text-white d-inline-block mb-0">RIWAYAT</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
    $semuadata=array();
    $tgl_mulai="-";
    $tgl_selesai="-";
    $nama_parameter="";
    $HasilPengecekan = "";
    $asal_sample = "";
    $lokasi = "";
    if (isset($_POST["kirim"])) {
      $tgl_mulai = $_POST["tglm"];
      $tgl_selesai = $_POST['tgls'];
      $HasilPengecekan = $_POST["HasilPengecekan"];
      // $ambil = $koneksi->query("SELECT * FROM statuspengecekan sp LEFT JOIN parameter p ON sp.id_status=p.id_param 
      // WHERE HasilPengecekan='$HasilPengecekan' AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
      $ambil = $koneksi->query("SELECT * FROM statuspengecekan sp LEFT JOIN parameter p ON sp.id_status=p.id_param 
      WHERE HasilPengecekan='$HasilPengecekan' AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
      // $ambil = $koneksi->query("SELECT * FROM statuspengecekan sp LEFT JOIN parameter p ON sp.id_status=p.id_param 
      // WHERE HasilPengecekan= '$asal_sample' BETWEEN '$HasilPengecekan' AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
      while ($pecah=$ambil->fetch_assoc())
      {
        $semuadata[]=$pecah;
      }
    }
    // echo $HasilPengecekan;
    // print_r($semuadata);
  ?>
  <div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <div class="card-header bg-transparent">
            <h3 class="mb-0">Riwayat dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h3>
          </div>
            <div class="card-body">
              <div class="row icon-examples">
                <div class="container-fluid">
                  <form method="post">
                    <!-- Row -->
                    <div class="row">
                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label style="width: 700px">Parameter</label>
                        <select class="form-control" name="id_param">
				                  <option value="">Parameter</option>
				                  <?php foreach ($dataparameter as $key => $value): ?>
				                  <option value="<?php echo $value["id_param"] ?>"><?php echo $value["nama_parameter"] ?></option>
				                  <?php endforeach ?>
			                  </select>
                      </div>
                    </div> -->
                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label style="width: 700px">Asal Sample</label>
                        <select class="form-control" name="asal_sample">
                          <option value="">Asal</option>
                          <option value="Mata Air" <?php echo $asal_sample=="Mata Air"?"selected":""; ?> >Mata Air</option>
                          <option value="Sumur Bor" <?php echo $asal_sample=="Sumur Bor"?"selected":""; ?> >Sumur Bor</option>
                        </select>
                      </div>
                    </div> -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label style="width: 700px">Status</label>
                        <select class="form-control" name="HasilPengecekan">
                          <option value="">Pilih Status</option>
                          <option value="Memenuhi Syarat" <?php echo $HasilPengecekan=="Memenuhi Syarat"?"selected":""; ?> >Memenuhi Syarat</option>
                          <option value="Tidak Memenuhi Syarat" <?php echo $HasilPengecekan=="Tidak Memenuhi Syarat"?"selected":""; ?> >Tidak Memenuhi Syarat</option>
                          <option value="Semua Riwayat" <?php echo $HasilPengecekan=="Semua Riwayat"?"selected":""; ?> >Semua Riwayat</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                      </div>
                    </div>
                    
                    <div class="col-md-2">
                      <label>&nbsp;</label><br>
                      <button type="submit" class="btn btn-primary " name="kirim" style="background-color: #253D93; border: 4px solid #253D93 ; border-radius: 0.6em; width: 100px;"  ><b>Lihat</b></button>
                    </div>
                    </div>
                    <!-- close row -->
                    <table class="table table-hover"  >
                      <thead>
                        <tr class="bg-primary"  style="color: white; ">
                          <th><b>No</b></th>
                          <th><b>Parameter</b></th>
                          <th><b>Tanggal</b></th>
                          <th><b>Lokasi</b></th>
                          <th><b>Asal</b></th>
                          <!-- <th><b>Status</b></th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($semuadata as $key => $value): ?>
                        <tr>
                          <td><?php echo $key+1; ?></td>
                          <td><?php echo $value["nama_parameter"] ?></td>
                          <!-- <td><?php echo $value["asal_sample"] ?></td> -->
                          <td><?php echo date("d F Y",strtotime($value["tanggal"])) ?></td>
                          <td><?php echo $value["lokasi"] ?></td>
                          <td><?php echo $value["asal_sample"] ?></td>
                          <!-- <td><?php echo $value["HasilPengecekan"] ?></td> -->
                          <!-- <td>
                            <a class="nav-link" href="detail_riwayat.php?halaman=detail_riwayat&id=<?php echo $pecah['id_riwayat']; ?>">
                              <span class="btn btn-info" style=" width: 130px; background-color: #28B5B5;">Detail</span>
                            </a>
                          </td> -->
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
  <!-- <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <script src="assets/js/argon.js?v=1.2.0"></script> -->
</body>
</html>

