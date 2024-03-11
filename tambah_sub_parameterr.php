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
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tambah Sub Parameter</title>
  	<!-- icon -->
  	<link rel="icon" href="file/logo.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/parameter.css">
	<!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
</head>
<body>
	<div class="all">
		<div class="header">
			<h2>Tambah Sub Parameter</h2>
		</div>
<!-- Tambah Sub -->
		<div class="container container2">
			<br>
			<!-- <h2>Tambah Sub</h2> -->
			<div class="container-fluid">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Parameter</label>
                        <select class="form-control" name="id_param">
							<option value="">Pilih Parameter</option>
							<?php foreach ($dataparameter as $key => $value): ?>
							<option value="<?php echo $value["id_param"] ?>"><?php echo $value["nama_parameter"] ?></option>
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
					<!-- <button class="btn btn-primary btn-simpan" name="save">Simpan</button> -->
					<button class="btn btn-primary" name="save">Simpan</button>
					<br>
					<br>
				</form>
			</div>
		</div>
	</div>
	<br>
	<br>

<?php
if (isset($_POST['save']))
 {
 	$koneksi->query("INSERT INTO sub_parameter (nama_sub_parameter, satuan_nilai,batas_nilai_min, batas_nilai_max, id_param)
 		VALUES('$_POST[nama]','$_POST[satuan_nilai]','$_POST[batas_nilai_min]', '$_POST[batas_nilai_max]', '$_POST[id_param]')");

 	//mendapatkan id_sub_parameter barusan
	$id_sub_parameter_barusan = $koneksi->insert_id;

 	echo "<div class='alert alert-info'>Data tersimpan</div>";
 	echo "<script>location='sub_parameter.php?halaman=sub_parameter';</script>";
 }
?>

</body>
</html>
