<?php
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

///////////
$id_sub = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM sub_parameter LEFT JOIN parameter ON sub_parameter.id_param=parameter.id_param WHERE id_sub='$id_sub' ");
$detailsub = $ambil->fetch_assoc();

?>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ubah Sub Parameter</title>
  <!-- icon -->
  <link rel="icon" href="file/logo.png" type="image/png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../fontawesome-free-5.15.4-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/parameter.css">
</head>
<body style="background-color: white;">
	<!-- yang aku tambahin -->
	<div class="all">
		<div class="judul" align="center">
			<h3><b>Ubah Sub Parameter</b></h3>
		</div>
		<br>
		<br>
			<div class="container container2">
				<br>
				<div class="container-fluid">
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
							<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_sub_parameter']; ?>">
						</div>
						<div class="form-group">
							<label>Satuan Nilai</label>
							<input type="text" name="satuan_nilai" class="form-control" value="<?php echo $pecah['satuan_nilai']; ?>">
						</div>
						<div class="form-group">
							<label>Batas Min</label>
							<input type="number" name="batas_nilai_min" class="form-control" value="<?php echo $pecah['batas_nilai_min']; ?>">
						</div>
                        <div class="form-group">
							<label>Batas Max</label>
							<input type="number" name="batas_nilai_max" class="form-control" value="<?php echo $pecah['batas_nilai_max']; ?>">
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
				</div>
				<br>
			</div>
	</div>
		<br>
		<br>
</body>
</html>