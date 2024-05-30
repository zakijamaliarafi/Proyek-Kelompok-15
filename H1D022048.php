<?php
include "../inc/koneksi.php";
session_start();

if (!isset($_SESSION['id'])) {
  header("Location: ../index.php");
  exit();
}

if($_SESSION['role']!='admin'){
  header("Location: ../routing.php");
  exit();
}

if(isset($_POST['input'])){
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $supplier = $_POST['supplier'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $insert = "INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`, `id_supplier`) VALUES ('$id', '$nama', '$stok', '$harga_beli', '$harga_jual', '$supplier') ";
    $query = mysqli_query($conn, $insert);
    if($query){
        ?>
        <script>
            alert('Data berhasil Ditambahkan!');
            document.location='view.php';
        </script>
        <?php
    }
}
?>