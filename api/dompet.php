<?php
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{}
    
    $nama = $_POST['nama'];
    $referensi = $_POST['referensi'];
    $deskripsi = $_POST['deskripsi'];
    $status_id = $_POST['status_id'];

    if (empty($nama) || empty($referensi) || empty($deskripsi) || empty($status_id)) :

        echo json_encode([
            'status' => "400",
            'message' => 'Please fill all the fields',
        ]);
        exit; 
    endif;

    $query = mysqli_query($con, "INSERT INTO dompet VALUES ('','$nama','$referensi','$deskripsi','$status_id' )");
    if ($query) {
        echo json_encode([
            'status' => "200",
            'message' => 'Berhasil Menambahkan Data',
        ]);
        exit; 
    }else{
        echo json_encode([
            'status' => "400",
            'message' => 'Gagal Menambahkan Data',
        ]);
        exit; 
    }
?>