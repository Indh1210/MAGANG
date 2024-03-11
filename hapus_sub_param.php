<?php
//koneksi ke database
include 'koneksi.php';
?>

<?php

if (isset($_GET['id_sub'])) {
    $id_kategori = $_GET['id_sub'];
//baca nama file yang mau dihapus
$ambil = $koneksi-> query("SELECT * FROM sub_parameter WHERE id_sub='$_GET[id]'");
while ($pecah = $ambil->fetch_assoc())
{
  $semuadata[] = $tiap;
}
}
$koneksi->query("DELETE FROM sub_parameter WHERE id_sub='$_GET[id]'");

echo "<script>alert('sub parameter terhapus');</script>";
echo "<script>location='sub_parameter.php?halaman=sub_parameter';</script>";
?>
