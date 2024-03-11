<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<?php
$dataparameter = array();

$ambil = $koneksi->query("SELECT * FROM parameter ");
while($tiap = $ambil->fetch_assoc())
{
	$dataparameter[] = $tiap;
}
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Riwayat</title>
        <link rel="icon" href="file/logo.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="bs/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Lab AMGM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="cek_sample.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Cek Sample
                            </a>
                            <a class="nav-link" href="parameter.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Parameter
                            </a>
                            <a class="nav-link" href="sub_parameter.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Sub Parameter
                            </a>
                            <a class="nav-link" href="riwayat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Riwayat
                            </a>
                        </div>
                    </div>
                </nav>
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
      $ambil = $koneksi->query("SELECT * FROM statuspengecekan sp LEFT JOIN parameter p ON sp.id_status=p.id_param 
      WHERE HasilPengecekan='$HasilPengecekan' AND tanggal BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
      while ($pecah=$ambil->fetch_assoc())
      {
        $semuadata[]=$pecah;
      }
    }
    // echo $HasilPengecekan;
    // print_r($semuadata);
    ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Riwayat</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Riwayat</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div>
                            <!-- <div class="card-header bg-transparent">
                                 <h3 class="mb-0">Riwayat dari <?php echo $tgl_mulai ?> hingga <?php echo $tgl_selesai ?></h3>
                            </div>     -->
                    <form method="post">
            		 <div class="row" >
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
                        <label style="width: 700px">Parameter</label>
                        <select class="form-control" name="id_param">
				                  <option value="">Parameter</option>
				                  <?php foreach ($dataparameter as $key => $value): ?>
				                  <option value="<?php echo $value["id_param"] ?>"><?php echo $value["nama_parameter"] ?></option>
				                  <?php endforeach ?>
			                  </select>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
                      </div>
                    </div>
                    <div class="col-md-2">
                        <div><br>
                            <button type="submit" class="btn btn-info " name="kirim">Lihat</button>
                        </div>
                    </div>
                    </form>
                    <div><br>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Parameter</th> -->
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Asal</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Parameter</th> -->
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                            <th>Asal</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($semuadata as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key+1; ?></td>
                                        <!-- <td><?php echo $value["nama_parameter"] ?></td> -->
                                        <!-- <td><?php echo $value["asal_sample"] ?></td> -->
                                        <td><?php echo date("d F Y",strtotime($value["tanggal"])) ?></td>
                                        <td><?php echo $value["lokasi"] ?></td>
                                        <td><?php echo $value["asal_sample"] ?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; IT AMGM 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="bs/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="bs/js/datatables-simple-demo.js"></script>
    </body>
</html>
