<?php
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{}
    
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $referensi = $_POST['referensi'];
    $deskripsi = $_POST['deskripsi'];
    $status_id = $_POST['status_id'];

    if (empty($nama) || empty($status_id)) :

        echo json_encode([
            'status' => "400",
            'message' => 'Please fill Nama and Status fields',
        ]);
        exit; 
    endif;

    $query = mysqli_query($con, "UPDATE dompet SET nama = '$nama', referensi = '$referensi', deskripsi = '$deskripsi', status_id = '$status_id' WHERE id = '$id'");
    if ($query) {
        echo json_encode([
            'status' => "200",
            'message' => 'update berhasil',
        ]);
        exit; 
    }else{
        echo json_encode([
            'status' => "400",
            'message' => 'update failed ',
        ]);
        exit; 
    }
?>