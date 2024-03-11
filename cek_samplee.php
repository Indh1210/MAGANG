<?php
session_start();
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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>beranda</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <link rel="icon" href="file/logo.png" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body style="background-color: #edeff0;">
    <!-- SideBar -->
    <?php include 'side_bar.php'; ?>
    <div class="main-content" id="panel" >
    <?php
    $semuadata=array();
    $asal_sample = "";
    ?>
   <!-- Header -->
   <div class="header bg-primary pb-2" style="background-color: #253D93;">
   <!-- <nav class="sb-topnav navbar navbar-expand navbar-dark bg-white">
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="#sidenav-main" href="#!"><i class="fas fa-bars"></i></button>
        </nav> -->
      <div class="container-fluid">
        <div class="header-body">            
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-5">
              <h6 class="h2 text-white d-inline-block mb-0" id="sidebarToggle">Beranda</h6>
            </div>
          </div>
        </div>
      </div>
    </div><br>
    <div class="container-fluid mt--5" >
      <div class="row justify-content-center">
        <div class=" col ">
          <div class="card"><br>
            <div class="container-fluid h4 d-inline-block " style="color: black;">
              <form method="post" action="hasil.php">
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
        <label>Tanggal</label>
        <input type="date" class="form-control" name="tanggal" value="<?php echo $tgl ?>">
      </div>
    </div>	
	  <div class="card-body" >
      <div class="row icon-examples">
        <table class="table table-hover">
          <thead>
            <tr class="bg-primary"  style="color: white; " >
              <th><b>No</b></th>
              <td><b>Sub Parameter</b></td>
			        <td><b>Satuan Nilai</b></td>
			        <td><b>Masukan Nilai</b></td>
            </tr>
          </thead>
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
		    <button class="btn btn-primary" name="cek" href="hasil.php" style="background-color: #253D93; border: 4px solid #253D93 ; width: 200px;">Cek Sample</button>
		    <br><br>
      </div>
    </div>
  </form>
  </div>
  <!-- <?php
        $semuadata = array();
        $tgl = "-";
        $HasilPengecekan = "";
        $asal_sample = "";
        $lokasi = "";
        if (isset($_POST["cek"])) {
          $dataToSend = array(
              'asal_sample' => $_POST['asal_sample'],
              'lokasi' => $_POST['lokasi'],
              'tanggal' => $_POST['tanggal'],
              'nilai_masukan[]' => $_POST['nilai_masukan[]']
          );      
          $_SESSION['dataToSend'] = $dataToSend;      
          header('Location: hasil.php');
          exit();
      }      
        echo $HasilPengecekan;
        print_r($semuadata);
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

 	//mendapatkan id_sub_parameter barusan
	// $id_sub_parameter_barusan = $koneksi->insert_id;

 	// echo "<div class='alert alert-info'>Data tersimpan</div>";
 	// echo "<script>location='sub_parameter.php?halaman=sub_parameter';</script>";
 }
?>

<!-- <script>
        $(document).ready(function () {
            
            $('#id_param').change(function () {
                var id_param = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: 'get_sub_parameters.php', 
                    data: { id_param: id_param },
                    success: function (response) {
                        $('#sub_parameters_body').html(response);
                    }
                });
            });
        });
</script> -->
</body>
</html>

