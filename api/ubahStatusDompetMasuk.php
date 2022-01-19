<?php
    include_once("../configs/database.php");
    header("Content-type:application/json");

    $id = $_POST['id'];
    $status_id = $_POST['status_id'];
   

    $query = mysqli_query($con, "UPDATE transaksi SET status_id = '$status_id' WHERE id = '$id'");
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