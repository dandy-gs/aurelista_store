<?php
include '../../config.php';
if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        // Mengambil ID diURL
        $id = $_GET['id'];

        // Mengambil data siswa_foto didalam table siswa
        $get_foto = "SELECT foto FROM baju_rajut WHERE id='$id'";
        $data_foto = mysqli_query($conn, $get_foto);
        // Mengubah data yang diambil menjadi Array
        $foto_lama = mysqli_fetch_array($data_foto);

        // Menghapus Foto lama didalam folder FOTO
        unlink("./templates/baju/file/" . $foto_lama['foto']);

        // Mengapus data siswa berdasarkan no
        // $query = mysqli_query($conn, "TRUNCATE TABLE shirt");
        $query = mysqli_query($conn, "DELETE FROM baju_rajut WHERE id='$id'");
        if ($query) {
            header("location:../../index.php?hal=baju&pesan=hapus");
        } else {
            header("location:../../index.php?hal=baju&pesan=gagalhapus");
        }
    } else {
        // Apabila no nya kosong maka akan dikembalikan kehal1aman index
        header("location:../../index.php");
    }
} else {
    // Jika tidak ada Data no maka akan dikembalikan kehal1aman index
    header("location:../../index.php");
}