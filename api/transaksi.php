<?php 
    include_once("../configs/database.php");
    header("Content-type:application/json");

    class emp{

    }

    $transaksi_id = $_POST['transaksi_id'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $nilai = $_POST['nilai'];
    $dompet_id = $_POST['dompet_id'];
    $kategori_id = $_POST['kategori_id']; 
    $status_id = $_POST['status_id'];

    if ( empty($deskripsi) || empty($tanggal) ||empty($nilai) ||  empty($dompet_id) ||empty($kategori_id) ||empty($status_id)     ) :

        echo json_encode([
            'status' => "400",
            'message' => 'Please fill all the fields',
        ]);
        exit; 
    endif;

    $query = "SELECT * FROM transaksi WHERE transaksi_id = '$transaksi_id' ORDER BY id DESC Limit 1";
    $hasil = mysqli_query($con,$query);
    if(mysqli_num_rows($hasil)>0){  
        $rows = mysqli_fetch_array($hasil);
        $kode;
        if ($transaksi_id == 1) {
            $kode = get_newid($rows['kode'],3,'WIN');
        }else{
            $kode = get_newid($rows['kode'],4,'WOUT');
        }
        $query = mysqli_query($con, "INSERT INTO transaksi VALUES ('','$kode','$deskripsi','$tanggal','$nilai','$dompet_id','$kategori_id','$transaksi_id','$status_id' )");
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
        
        
          
    }else{
        $kode = '';
        if ($transaksi_id == 1) {
            $kode = "WIN000001";
        }else{
            $kode = "WOUT000001";
        }
        $query = mysqli_query($con, "INSERT INTO transaksi VALUES ('','$kode','$deskripsi','$tanggal','$nilai','$dompet_id','$kategori_id','$transaksi_id','$status_id' )");
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
    }

    function get_newid($auto_id, $start,$prefix){
        $newId = substr($auto_id, $start,9);
        $tambah = (int)$newId + 1;
        if(strlen($tambah) == 1){
            $id_mobil = $prefix."00000" .$tambah;
        }else if (strlen($tambah) == 2){
            $id_mobil = $prefix."0000" .$tambah;
         }else if (strlen($tambah) == 3){
           $id_mobil = $prefix."000" .$tambah;
        }
        else if (strlen($tambah) == 4){
           $id_mobil = $prefix."00" .$tambah;
        }
        else if(strlen($tambah) == 5){
           $id_mobil = $prefix."0".$tambah;   
        }
        else if(strlen($tambah) == 6){
           $id_mobil = $prefix.$tambah;   
        }
        return $id_mobil;
        }

?>