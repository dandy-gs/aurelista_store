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

// $cart = mysqli_query($user, "UPDATE users SET status_cart = 'YES'");

include("../config.php");
if ($_GET['hal'] == 'tambah_keranjang') {
    $nama_keranjang = $_POST['nama'];
    $foto_keranjang = $_POST['foto'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $harga_keranjang = $_POST['harga'];
    $jenis_barang = $_POST['jenis_barang'];
    $users_email = $_POST['user_email'];
};

$total_harga = $jumlah_beli * $harga_keranjang;

$querykeranjang = mysqli_query($conn, "INSERT INTO keranjang VALUES('','$nama_keranjang',
                                '$foto_keranjang',
                                '$jumlah_beli', 
                                '$harga_keranjang',
                                '$total_harga',
                                '$jenis_barang', 
                                '$users_email')");

if ($querykeranjang) {
    header("location:./keranjang.php?pesan=berhasil");
} else {
    $msg = "<div class='alert alert-info'>Gagal tambah keranjang</div>";
}
