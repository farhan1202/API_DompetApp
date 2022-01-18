<?php
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{}
    
    $id = $_POST['id'];
    $nama = $_POST['nama']; 
    $deskripsi = $_POST['deskripsi'];
    $status_id = $_POST['status_id'];

    if (empty($nama) ||  empty($deskripsi) || empty($status_id)) :

        echo json_encode([
            'status' => "400",
            'message' => 'Please fill all the fields',
        ]);
        exit; 
    endif;

    $query = mysqli_query($con, "UPDATE kategori SET nama = '$nama',  deskripsi = '$deskripsi', status_id = '$status_id' WHERE id = '$id'");
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