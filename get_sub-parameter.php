<?php
include 'koneksi.php';

if (isset($_POST['id_param'])) {
    $id_param = $_POST['id_param'];

    $sub_parameters = array();

    $ambil = $koneksi->query("SELECT * FROM sub_parameter WHERE id_param = '$id_param'");
    while ($pecah = $ambil->fetch_assoc()) {
        $sub_parameters[] = $pecah;
    }

    foreach ($sub_parameters as $nomor => $pecah) {
        echo "<tr>
                <td>" . ($nomor + 1) . "</td>
                <td>{$pecah['nama_sub_parameter']}</td>
                <td>{$pecah['satuan_nilai']}</td>
                <td><input type='text' name='nilai_masukan[]' class='form-control'></td>
              </tr>";
    }
}
