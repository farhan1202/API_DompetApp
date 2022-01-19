<?php 
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{

    }

    $transaksi_id = $_POST['transaksi_id'];

    // $query = "SELECT * FROM transaksi WHERE transaksi_id = '$transaksi_id'";
    $query = "SELECT transaksi.id,transaksi.kode,transaksi.deskripsi,transaksi.tanggal,transaksi.nilai,transaksi.dompet_id, dompet.nama AS nama_dompet, transaksi.kategori_id, kategori.nama AS nama_kategori, transaksi.transaksi_id, transaksi.status_id FROM transaksi, dompet, kategori WHERE transaksi.dompet_id = dompet.id AND transaksi.kategori_id = kategori.id AND transaksi.transaksi_id = '$transaksi_id'";
     
    $hasil = mysqli_query($con,$query);
    if(mysqli_num_rows($hasil)>0){ 
        $response1= array();
        while($x = mysqli_fetch_array($hasil)){
            $h['id']=$x['id'];
            $h['kode']=$x['kode']; 
            $h['deskripsi']=$x['deskripsi'];
            $h['tanggal']=$x['tanggal'];
            $h['nilai']=$x['nilai'];
            $h['dompet_id']=$x['dompet_id']; 
            $h['nama_dompet']=$x['nama_dompet']; 
            $h['kategori_id']=$x['kategori_id'];
            $h['nama_kategori']=$x['nama_kategori'];
            $h['transaksi_id']=$x['transaksi_id'];
            $h['status_id']=$x['status_id'];
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