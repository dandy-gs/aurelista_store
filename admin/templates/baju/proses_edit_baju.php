<?php

include './config.php';
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {
        // Mengambil data dari form lalu ditampung didalam variabel

        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $harga = $_POST['harga'];
        $lama_buat = $_POST['lama_buat'];
        $foto_nama = $_FILES['foto']['name'];
        $foto_size = $_FILES['foto']['size'];
    } else {
        header("location:../../index.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($foto_size > 2097152) {
        // Jika File lebih dari 2 MB maka akan gagal mengupload File
        header("location:../../index.php?hal=edit_baju&pesan=size");
    } else {

        // Mengecek apakah Ada file yang diupload atau tidak
        if ($foto_nama != "") {

            // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
            $ekstensi_izin = array('png', 'jpg', 'jepg');
            // Memisahkan nama file dengan Ekstensinya
            $pisahkan_ekstensi = explode('.', $foto_nama);
            $ekstensi = strtolower(end($pisahkan_ekstensi));
            // Nama file yang berada di dalam direktori temporer server
            $file_tmp = $_FILES['foto']['tmp_name'];
            // Membuat angka/huruf acak berdasarkan waktu diupload
            $tanggal = md5(date('Y-m-d h:i:s'));
            // Menyatukan angka/huruf acak dengan nama file aslinya
            $foto_nama_new = $tanggal . '-' . $foto_nama;

            // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
            if (in_array($ekstensi, $ekstensi_izin) === true) {

                // Mengambil data siswa_foto didalam table siswa
                $get_foto = "SELECT foto FROM baju_rajut WHERE id='$id'";
                $data_foto = mysqli_query($conn, $get_foto);
                // Mengubah data yang diambil menjadi Array
                $foto_lama = mysqli_fetch_array($data_foto);

                // Menghapus Foto lama didalam folder FOTO
                unlink("./templates/baju/file/" . $foto_lama['foto']);

                // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, './templates/baju/file/' . $foto_nama_new);

                // Query untuk memasukan data kedalam table SISWA
                $query = mysqli_query($conn, "UPDATE baju_rajut SET nama='$nama',jenis='$jenis',harga='$harga',foto='$foto_nama_new',lama_buat='$lama_buat' WHERE id='$id'");

                // Mengecek apakah data gagal diinput atau tidak
                if ($query) {
                    header("location:../../index.php?hal=edit_baju&pesan=berhasil");
                } else {
                    header("location:../../index.php?hal=edit_baju&pesan=gagal");
                }
            } else {
                // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
                header("location:../../index.php?hal=edit_baju&pesan=ekstensi");
            }
        } else {

            // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
            $query = mysqli_query($conn, "UPDATE baju_rajut SET nama='$nama',jenis='$jenis',harga='$harga',lama_buat='$lama_buat' WHERE id='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:../../index.php?hal=edit_baju&pesan=berhasil");
            } else {
                header("location:../../index.php?hal=edit_baju&pesan=gagal");
            }
        }
    }
} else {
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:../../index.php");
}
