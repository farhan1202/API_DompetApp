<?php 
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{

    }

    $query = "SELECT * FROM transaksi_stat ORDER BY nama ASC";
    $hasil = mysqli_query($con,$query);
    if(mysqli_num_rows($hasil)>0){ 
        $response1= array();
        while($x = mysqli_fetch_array($hasil)){
            $h['id']=$x['id'];
            $h['nama']=$x['nama']; 
            $h['deskripsi']=$x['deskripsi']; 
            array_push($response1, $h);
        }
        echo json_encode([
            'status' => "200",
            'message' => 'sukses get data',
            'data' => $response1,
        ]);
        exit; 
    }else{
        echo json_encode([
            'status' => "400",
            'message' => 'failet get data',
        ]);
        exit; 
    }

?>