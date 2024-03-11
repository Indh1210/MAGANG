<?php
session_start();
//koneksi ke database
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM sub_parameter WHERE id_sub= '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

?>

<?php
$dataparameter = array();

$ambil = $koneksi->query("SELECT * FROM parameter");
while($tiap = $ambil->fetch_assoc())
{
	$dataparameter[] = $tiap;
}

$id_sub = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param=parameter.id_param WHERE id_sub='$id_sub' ");
$detailsub = $ambil->fetch_assoc(); 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ubag Sub Parameter</title>
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
                        <li><a class="dropdown-item" href="#!">Cek Sample</a></li>
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
                        <h1 class="mt-4">Sub Parameter</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ubah Data Sub Parameter</li>
                        </ol>
                <div class="card mb-4">
                  <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Parameter</label>
                        <select class="form-control" name="id_param">
							<option value="">Pilih Parameter</option>
							<?php foreach ($dataparameter as $key => $value): ?>
                                <option value="<?php echo $value["id_param"] ?>" <?php if ($pecah["id_param"]==$value["id_param"]){echo "selected"; } ?> >
									<?php echo $value["nama_parameter"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Nama Sub Parameter</label>
						<input type="text" class="form-control" name="nama">
					</div>
					<div class="form-group">
						<label>Satuan Nilai</label>
						<input type="text" class="form-control" name="satuan_nilai">
					</div>
					<div class="form-group">
						<label>Batas Nilai Min</label>
						<input type="number" name="batas_nilai_min" class="form-control">
					</div>
					<div class="form-group">
						<label>Batas Nilai Max</label>
						<input type="number" class="form-control" name="batas_nilai_max">
					</div>
                    <br>
					<br>
                    <a href="sub_parameter.php" class="btn btn-primary btn-ubah">Batal</a>
						<button class="btn btn-primary btn-ubah" name="ubah"> Ubah </button>						

						<?php
						if (isset($_POST['ubah']))
						{
						$koneksi->query("UPDATE sub_parameter SET nama_sub_parameter='$_POST[nama]',satuan_nilai='$_POST[satuan_nilai]',batas_nilai_min='$_POST[batas_nilai_min]', batas_nilai_max='$_POST[batas_nilai_max]', id_param='$_POST[id_param]' WHERE id_sub='$_GET[id]'");
						 	echo "<script>alert('data sub parameter telah diubah');</script>";
						 	echo "<script>location='sub_parameter.php?halaman=sub_parameter';</script>";
						}
						?>
					</form>
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
