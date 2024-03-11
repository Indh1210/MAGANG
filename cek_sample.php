<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<?php
$dataparameter = array();

$ambil = $koneksi->query("SELECT * FROM parameter");
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
        <title>Beranda</title>
        <link rel="icon" href="file/logo.png" type="image/png">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="bs/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="#">Lab AMGM</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="dashboard.php">Dashboard</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="splash.php">Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php
        $semuadata=array();
        $asal_sample = "";
        ?>
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
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Sub Parameter
                            </a>
                            <a class="nav-link" href="riwayat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Riwayat
                            </a>
                        </div>
                    </div>
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Beranda</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Cek Sample</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <div>
                            <form method="post">
                            <div class="row">
                             <div class="col-md-3">
                              <div>
		                        <label>Pilih Parameter</label>
                                <select class="form-control" name="id_param">
				                 <option value="">Parameter</option>
				                    <?php foreach ($dataparameter as $key => $value): ?>
				                        <option value="<?php echo $value["id_param"] ?>"><?php echo $value["nama_parameter"] ?></option>
				                    <?php endforeach ?>
			                    </select>
                              </div>
                             </div>
                             <div class="col-md-3">
                              <div>
                                <label style="width: 700px">Asal Sample</label>
                                <select class="form-control" name="asal_sample">
                                 <option value="">Asal</option>
                                 <option value="Mata Air" <?php echo $asal_sample=="Mata Air"?"selected":""; ?> >Mata Air</option>
                                 <option value="Sumur Bor" <?php echo $asal_sample=="Sumur Bor"?"selected":""; ?> >Sumur Bor</option>
                                </select>
                              </div>
                             </div>
                             <div class="col-md-3">
                              <div>
                                <label>Lokasi Sample</label>
                                <td><input type="text" name="lokasi" class="form-control" ></td>
                              </div>
                             </div>
                             <div class="col-md-2">
                              <div>
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="<?php echo $tgl ?>">
                             </div>
                            </div>
                            <div class="col-md-2">
                             <div><br>
                                <button type="submit" class="btn btn-info " name="ya">Masuk</button>
                             </div>
                            </div>
                            <div><br>
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Table Cek Parameter
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Parameter</th>
                                            <th>Satuan Nilai</th>
                                            <th>Masukan Nilai</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Parameter</th>
                                            <th>Satuan Nilai</th>
                                            <th>Masukan Nilai</th>
                                        </tr>
                                    </tfoot>                  
                                    <tbody >
                                        <?php $nomor=1; ?>
                                        <?php $ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param = parameter.id_param ");?>
                                        <?php while($pecah = $ambil->fetch_assoc()){ ?>              
                                            <tr>
                                                <td><?php echo $nomor; ?></td> 
                                                <td><?php echo $pecah['nama_sub_parameter'];?></td> 
                                                <td><?php echo $pecah['satuan_nilai'];?></td>
                                                <td><input type="text" name="nilai_masukan[]" class="form-control"></td> 
                                            </tr>
                                        <?php $nomor++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table><br>
		                        <button class="btn btn-primary" name="cek" href="sil.php" style="background-color: #253D93; border: 4px solid #253D93 ; width: 200px;">Cek Sample</button>
		                        <br><br>
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

    <!-- <?php
    $semuadata=array();
    $tgl_mulai="-";
    $tgl_selesai="-";
    $nama_parameter="";
    $HasilPengecekan = "";
    $asal_sample = "";
    $lokasi = "";
    if (isset($_POST["ya"])) {
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
    ?> -->

<!-- <?php
$tgl = "-";
$asal_sample = "";
$lokasi = "";
if (isset($_POST['cek']))
 {
 	$koneksi->query("INSERT INTO statuspengecekan (id_status, id_param, lokasi, asal_sample, tanggal)
 		VALUES('$_POST[id_status]','$_POST[id_param]', '$_POST[lokasi]', '$_POST[asal_sample]','$_POST[tanggal]')");

 }
?> -->

<?php
$tgl = "-";
$HasilPengecekan = "";
$asal_sample = "";
$lokasi = "";
if (isset($_POST['cek']))
 {
 	$koneksi->query("INSERT INTO statuspengecekan (id_status, id_param, HasilPengecekan, lokasi, asal_sample, tanggal)
 		VALUES('$_POST[id_status]','$_POST[id_param]','$_POST[HasilPengecekan]', '$_POST[lokasi]', '$_POST[asal_sample]','$_POST[tgl]')");

 	
 	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	echo "<script>location='sil.php?halaman=sil';</script>";
 }
?>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="bs/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="bs/js/datatables-simple-demo.js"></script>
    </body>
</html>
