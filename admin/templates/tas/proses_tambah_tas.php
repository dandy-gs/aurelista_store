<?php
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$lama_buat = $_POST['lama_buat'];
$foto_nama = $_FILES['foto']['name'];
$foto_size = $_FILES['foto']['size'];

include("../../config.php");

$sql = "insert into tas_rajut(
            nama,
            jenis,
            harga,
            lama_buat
            ) values (
            '$nama',
            '$jenis',
            '$harga',
            '$lama_buat')";


if ($foto_size > 20097152) {
    // Jika File lebih dari 2 MB maka akan gagal mengupload File
    header("location:./index.php?hal1=tas&pesan=size");
} else {

    // Mengecek apakah Ada file yang diupload atau tidak
    if ($foto_nama != "") {

        // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
        $ekstensi_izin = array('png', 'jpg', 'jpeg');
        // Memisahkan nama file dengan Ekstensinya
        $pisahkan_ekstensi = explode('.', $foto_nama);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        // Nama file yang berada di dalam direktori temporer server
        $file_tmp = $_FILES['foto']['tmp_name'];
        // Membuat angka/huruf acak berdasarkan waktu diupload
        $tanggal = md5(date('Y-m-d h:i:s'));
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $foto_nama_new = $tanggal . 'tas' . $foto_nama;

        // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
        if (in_array($ekstensi, $ekstensi_izin) === true) {
            // Memindahkan File kedalam Folder "file"
            move_uploaded_file($file_tmp, './file/' . $foto_nama_new);

            // Query untuk memasukan data kedalam table SISWA
            $query = mysqli_query($conn, "INSERT INTO tas_rajut VALUES ('','$nama',
                                                                        '$jenis',
                                                                        '$harga',
                                                                        '$lama_buat',
                                                                        '$foto_nama_new')");

            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:../../index.php?hal1=tas&pesan=berhasil");
            } else {
                header("location:../../index.php?hal1=tas&pesan=gagal");
            }
        } else {
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
            header("location:./index.php?hal1=tas&pesan=ekstensi");
        }
    } else {

        // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
        $query = mysqli_query($conn, $sql);

        // Mengecek apakah data gagal diinput atau tidak
        if ($query) {
            header("location:./index.php?hal1=tas&pesan=berhasil");
        } else {
            header("location:./index.php?hal1=tas&pesan=gagal");
        }
    }
}
