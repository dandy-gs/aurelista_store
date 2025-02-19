<?php
session_start();
if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: ../index.php");
    die();
}

include '../config.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_assoc($query);
};

$email = $user['email'];
$user_email = $email;

$data_keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE users_email='{$_SESSION['SESSION_EMAIL']}'");
$jumlah_keranjang = mysqli_num_rows($data_keranjang);

$query_cart = "SELECT sum(total_harga) FROM keranjang WHERE users_email='{$_SESSION['SESSION_EMAIL']}'";
$result_cart = mysqli_query($conn, $query_cart);

$row_cart = mysqli_fetch_array($result_cart);
$total_cart = $row_cart[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Aurellista Store</title>
    <!-- for icons  -->
    <link
        rel="stylesheet"
        href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
    <!-- bootstrap  -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css" />

    <!-- fancy box  -->
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css" />
    <!-- custom css  -->
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="../style.css" />
</head>

<body class="body-fixed">
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="../logo.png" width="160" height="36" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="../aurelista.php">Beranda</a></li>
                                <li><a href="">Produk</a></li>
                                <li><a href="templates/tentang-kami.php">Tentang Kami</a></li>
                            </ul>
                        </nav>
                        <div class="header-right">
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="header-btn header-cart dropdown-toggle"
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="uil uil-shopping-bag"></i>
                                    <span style="color:black" class="cart-number"><?php echo $jumlah_keranjang; ?></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item disabled" href="#sepatu"><b>
                                                Jumlah = <?php echo $jumlah_keranjang; ?>
                                            </b></a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item disabled" href=""><b>
                                                Harga = Rp. <?php echo number_format($total_cart, 2, ",", "."); ?>
                                            </b></a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" style="color:blueviolet;" href="keranjang.php?email=<?php echo $user['email'] ?>">Keranjang</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- <a href="javascript:void(0)" class="header-btn header-cart">
                                <i class="uil uil-shopping-bag"></i>
                                <span style="color:black" class="cart-number"><?php echo $jumlah_keranjang; ?></span>
                            </a> -->
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="header-btn dropdown-toggle"
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="uil uil-user-md"><b>
                                        </b></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item disabled" href="#sepatu"><b>
                                                <?php
                                                echo "Hai " . $user['nama']
                                                ?>
                                            </b></a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href=../logout.php>Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="viewport">
        <div id="js-scroll-content">
            <section class="two-col-sec section">
                <?php
                include '../config.php';
                if (isset($_GET['id'])) {
                    if ($_GET['id'] != "") {
                        $id = $_GET['id'];

                        $query = mysqli_query($conn, "SELECT * FROM sepatu WHERE id='$id'");
                        if (!$query) {
                            die("Query Error: " . mysqli_errno($conn) .
                                " - " . mysqli_error($conn));
                        }

                        $row = mysqli_fetch_assoc($query);
                        if (!count($row)) {
                            echo "<script>alert('Data tidak ditemukan pada database');
                            windows.location='index.php;'</script>";
                        }
                    } else {
                        echo "<script>alert('Data tidak ditemukan pada database');
                        windows.location='index.php;'</script>";
                    };
                }
                ?>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="sec-img mt-5">
                                <img name="foto"
                                    src="../admin/templates/sepatu/file/<?php echo $row['foto']; ?>"
                                    value="<?php echo $row['foto']; ?>" />
                                <input type="hidden" name="foto" value="<?php echo $row['foto']; ?>">

                                <!-- <img src="../assets/images/pizza.png" alt="" /> -->
                            </div>
                        </div>
                        <div id="nameProduct" class="col-lg-7">
                            <div class="sec-text">
                                <h2 class="xxl-title"><?php echo $row['nama']; ?></h2>
                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                <p>
                                    <!-- <b class="">Jenis: <?php echo $row['jenis']; ?></b> -->
                                    Jenis : <b class="m-2"><?php echo $row['jenis']; ?></b>
                                    <input type="hidden" name="jenis" value="<?php echo $row['jenis']; ?>">
                                </p>
                                <p>
                                    Lama Pembuatan: <b class="m-2"><?php echo $row['lama_buat']; ?> Minggu</b>
                                    <input type="hidden" name="lama_buat" value="<?php echo $row['lama_buat']; ?>">
                                </p>
                                <div class="pt-2">
                                    <a role="button" href="#staticBackdrop"
                                        class="sec-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Keranjang
                                    </a>
                                    <!-- <a href="./proses_tambah_keranjang.php" action="./proses_tambah_keranjang.php?hal=tambah_keranjang" class="sec-btn">
                                        Keranjang
                                    </a> -->
                                    <a href="./Belanja.php?id=<?php echo $row['id'] ?>" style="background-color: rebeccapurple; color: aliceblue"
                                        class="m-4 btn sec-btn">Pesan Sekarang</a>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true" action="./proses_tambah_keranjang.php" method="POST">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content text-dark">
                                                <div class="modal-header" style="background-color: thistle;">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah ke Keranjang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="background-color: snow;">
                                                    <form role="form" action="./proses_tambah_keranjang.php?hal=tambah_keranjang" method="POST">
                                                        <div class="container pb-3">
                                                            <div class="row">
                                                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                                                <h4 name="nama" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></h4>
                                                                <div class="col-5"><input type="hidden" name="foto"
                                                                        value="<?php echo $row['foto']; ?>"
                                                                        src="../admin/templates/sepatu/file/<?php echo $row['foto']; ?>">
                                                                    <?php
                                                                    if ($row['foto'] == "") { ?>
                                                                        <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG"
                                                                            style="width:190;height:390;">
                                                                    <?php } else { ?>
                                                                        <img name="foto"
                                                                            src="../admin/templates/sepatu/file/<?php echo $row['foto']; ?>"
                                                                            value="<?php echo $row['foto']; ?>" style="width:390;height:120px;">
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-7 pt-3">
                                                                    <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                                                                    <h4 class="font-weight-bold" name="harga"
                                                                        value="<?php echo $row['harga']; ?>">Rp. <?php echo $row['harga']; ?></h4>
                                                                    <p name="lama_buat">Lama Pembuatan = <?php echo $row['lama_buat']; ?> Minggu</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="container pt-2 border-top border-danger">
                                                        <div class="row">
                                                            <form role="form" action="./aksi_tambah_content.php" method="POST" enctype="multipart/form-data">
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label>Pilih Warna Kesukaanmu: </label>
                                                                        <select name="tipe_warna_cart" class="form-control" type="text">
                                                                            <option value="<?php echo $row['warna']; ?>"><?php echo $row['warna']; ?></option>
                                                                            <option value="<?php echo $row['warna1']; ?>"><?php echo $row['warna1']; ?></option>
                                                                            <option value="<?php echo $row['warna2']; ?>"><?php echo $row['warna2']; ?></option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div> -->
                                                        <div class="container mt-3 border-top border-danger">
                                                            <div class="row">
                                                                <!-- <h4 class="mt-1 mb-2">Pilih Ukuran</h4> -->
                                                                <!-- <form role="form" action="./aksi_tambah_content.php" method="POST" enctype="multipart/form-data"> -->
                                                                <div class="box-body">
                                                                    <!-- <div class="form-group">
                                                                    <label>Size: </label>
                                                                    <select name="tipe_ukuran_cart" class="form-control" type="text">
                                                                        <option value="<?php echo $row['opsi_ukuran_1']; ?>"><?php echo $row['opsi_ukuran_1']; ?></option>
                                                                        <option value="<?php echo $row['opsi_ukuran_2']; ?>"><?php echo $row['opsi_ukuran_2']; ?></option>
                                                                        <option value="<?php echo $row['opsi_ukuran_3']; ?>"><?php echo $row['opsi_ukuran_3']; ?></option>
                                                                    </select>
                                                                </div> -->
                                                                    <div class="form-group mt-3">
                                                                        <label>Jumlah: </label>
                                                                        <input placeholder="0" min="1" max="<?php echo $row['lama_buat']; ?>" value=""
                                                                            name="jumlah_beli" type="number">
                                                                    </div>
                                                                    <input type="hidden" name="user_email" value="<?php echo $user['email']; ?>">
                                                                    <input type="hidden" name="jenis_barang" value="SEPATU">
                                                                </div>
                                                                <!-- </form>                             -->
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer" style="background-color: thistle;">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" name="submit" style="background-color: rebeccapurple;"
                                                        class="btn text-white">Keranjang</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="collapse" id="collapseExample" style="background-color: lightpink">
                                        <div class="card card-body">
                                            Tombol belum disempurnakan, anda harus menambahkan produk ke dalam keranjang terlebih dahulu
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- footer -->
            <footer class="site-footer" id="contact">
                <div class="top-footer section">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-info">
                                        <div class="footer-logo">
                                            <a href="../index.php">
                                                <img src="../logo.png" alt="">
                                            </a>
                                        </div>
                                        <p>Jl. Janti Selatan VIII No. 45 Kota Malang
                                        </p>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-facebook-f"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-github-alt"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-youtube"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="footer-flex-box">
                                        <div class="footer-table-info">
                                            <h3 class="h3-title">Jam Operasional</h3>
                                            <ul>
                                                <li><i class="uil uil-clock"></i> Senin-Jumat : 9 - 22.00</li>
                                                <li><i class="uil uil-clock"></i> Sabtu-Minggu : 11 - 22.00</li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu food-nav-menu">
                                            <h3 class="h3-title">Links</h3>
                                            <ul class="column-2">
                                                <li>
                                                    <a href="../aurelista.php" class="footer-active-menu">Home</a>
                                                </li>
                                                <li><a href="#about">Produk</a></li>
                                                <li><a href="tentang-kami.php">Tentang Kami</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu">
                                            <h3 class="h3-title">Aurellista Store</h3>
                                            <ul>
                                                <li><a href="#">Terms & Conditions</a></li>
                                                <li><a href="#">Privacy Policy</a></li>
                                                <li><a href="#">Cookie Policy</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="copyright-text">
                                    <p>Copyright &copy; 2025 <span class="name">Dandy Gilang Saputra.</span>All Rights Reserved.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="scrolltop"><i class="uil uil-angle-up"></i></button>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- jquery  -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="../assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="../assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="../assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="../assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="../assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="../assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="../assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="../assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="./konten.js"></script>
    <script src="../assets/js/smooth-scroll.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <!-- <script src="../assets/js/bootstrap.bundle.js"></script> -->
    <!-- custom js  -->
    <script src="../main.js"></script>
</body>

</html>