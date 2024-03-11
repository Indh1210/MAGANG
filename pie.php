<?php
include "koneksi.php";

$response = array();

// $result = mysqli_query($koneksi, "SELECT nama_sub_parameter FROM sub_parameter ");
$result = mysqli_query($koneksi, "SELECT asal_sample, HasilPengecekan FROM statuspengecekan");
foreach ($result as $key){
    // $key = mysqli_fetch_assoc($result);
    $data = array();
    $data['asal_sample'] = $key["asal_sample"];
    $data['HasilPengecekan'] = $key["HasilPengecekan"];
    array_push($response, $data);
}
echo json_encode($response);
?>
