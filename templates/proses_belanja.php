include("../config.php");
if ($_GET['hal'] == 'tambah_keranjang') {
    $nama_keranjang = $_POST['nama_keranjang'];
    $foto_keranjang = $_POST['foto_keranjang'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $harga_keranjang = $_POST['total_harga'];
    $jenis_barang = $_POST['jenis_barang'];
    $users_email = $_POST['nama'];
    $users_email = $_POST['email'];
    $users_email = $_POST['alamat'];
    $users_email = $_POST['nama'];
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
