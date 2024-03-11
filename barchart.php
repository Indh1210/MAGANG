<?php
include "koneksi.php";

$response = array();

$result = mysqli_query($koneksi, "SELECT HasilPengecekan FROM statuspengecekan");
foreach ($result as $key){
    // $key = mysqli_fetch_assoc($result);
    $data = array();
    $data['HasilPengecekan'] = $key["HasilPengecekan"];
    
    
    array_push($response, $data);
}
echo json_encode($response);
?>
