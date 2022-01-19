<?php
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{}
    
    $id = $_POST['id'];
    $deskripsi = $_POST['deskripsi']; 
    $nilai = $_POST['nilai'];
    $dompet_id = $_POST['dompet_id'];
    $kategori_id = $_POST['kategori_id']; 
    $status_id = $_POST['status_id'];

    if (  empty($nilai) ||  empty($dompet_id) ||empty($kategori_id) ||empty($status_id)  ) :

        echo json_encode([
            'status' => "400",
            'message' => 'Field nilai, dompet, kategori, status tidak boleh kosong',
        ]);
        exit; 
    endif;

    $query = mysqli_query($con, "UPDATE transaksi SET deskripsi = '$deskripsi',  nilai = '$nilai', dompet_id = '$dompet_id',kategori_id = '$kategori_id',status_id = '$status_id' WHERE id = '$id'");
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