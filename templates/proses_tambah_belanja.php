<?php

session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../index.php");
    die();
}

include "../config.php";
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
};

include("../config.php");
if ($_GET['hal'] == 'tambah_belanja') {
    $id = $_POST['id'];
    $nama_beli = $_POST['nama_keranjang'];
    $foto_beli = $_POST['foto_keranjang'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $harga_beli = $_POST['total_harga'];
    $jenis_barang = $_POST['jenis_barang'];
    $nama_pembeli = $_POST['nama'];
    $users_email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $kodepos = $_POST['kodepos'];
    $order_id = rand();
};


$querykeranjang = mysqli_query($conn, "INSERT INTO beli VALUES('','$order_id','$nama_beli',
                                '$foto_beli',
                                '$jenis_barang',
                                '$harga_beli',
                                '$jumlah_beli', 
                                '$nama_pembeli',
                                '$users_email',
                                '$alamat',
                                '$kota',
                                '$provinsi',
                                '$kodepos','','')");

if ($querykeranjang) {
    header("location:../midtrans/examples/snap/checkout-process-simple-version.php?order_id=$order_id");
} else {
    $msg = "<div class='alert alert-info'>Gagal tambah keranjang</div>";
}
