<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>

<?php
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
        <title>Detail Sub Parameter</title>
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
                    <h1 class="mt-4">Detail Sub Parameter</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Sub Parameter</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                <table class="table" style="border-color: black;">         
                                <tr style="background-color: white">
                                    <th style="border: 3px solid; color: black;">Nama Parameter</th>
                                    <td style="border: 3px solid; color: black;"><?php echo $detailsub["nama_parameter"]; ?></td>
                                </tr>
                                <tr style="background-color: white">
                                    <th style="border: 3px solid ; color: black;">Sub Parameter</th>
                                    <td style="border: 3px solid ; color: black;"><?php echo $detailsub["nama_sub_parameter"]; ?></td>
                                </tr>
                                <tr style="background-color: white">
                                    <th style="border: 3px solid ; color: black;">Satuan Nilai</th>
                                    <td style="border: 3px solid ; color: black;"><?php echo ($detailsub["satuan_nilai"]); ?></td>
                                </tr>
                                <tr style="background-color: white">
                                    <th style="border: 3px solid ; color: black;">Batas Nilai Min</th>
                                    <td style="border: 3px solid ; color: black;"><?= $detailsub['batas_nilai_min']; ?></td>
                                </tr>
                                <tr style="background-color: white">
                                    <th style="border: 3px solid ; color: black;">Batas Nilai Max</th>
                                    <td style="border: 3px solid ; color: black;"><?php echo $detailsub["batas_nilai_max"]; ?></td>
                                </tr>
                                 <br>
                                </table>
                            </div>
                        </div>
				</form>
                <a href="sub_parameter.php" class="btn btn-info" style="color: black; border-radius: 0.6em;" ><b>Kembali</b></a>   
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
