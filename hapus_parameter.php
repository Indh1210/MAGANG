<?php
//koneksi ke database
include 'koneksi.php';
?>

<?php
//cek kategori
if (isset($_GET['id_param'])) {
    $id_param = $_GET['id_param'];
//baca nama file yang mau dihapus
$ambil = $koneksi-> query("SELECT * FROM parameter");
while ($pecah = $ambil->fetch_assoc())
{
  $semuadata[] = $tiap;
}
}
$koneksi->query("DELETE FROM parameter WHERE id_param='$_GET[id]'");

echo "<script>alert('parameter terhapus');</script>";
echo "<script>location='parameter.php?halaman=parameter';</script>";
?>
