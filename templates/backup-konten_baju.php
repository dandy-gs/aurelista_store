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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Baju (Nama Produk)</title>
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
    <link rel="stylesheet" href="/assets/css/content.css">
    <link rel="stylesheet" href="../style.css" />
</head>

<body class="body-fixed">
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="../logo.png" width="160" height="36" alt="Logo" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="#home">Beranda</a></li>
                                <li><a href="#about">Tentang Kami</a></li>
                                <li><a href="#menu">Produk</a></li>
                                <li><a href="#gallery">Galeri</a></li>
                                <li><a href="#contact">Kontak</a></li>
                            </ul>
                        </nav>
                        <div class="header-right">
                            <form action="#" class="header-search-form for-des">
                                <input
                                    type="search"
                                    class="form-input"
                                    placeholder="Search Here..." />
                                <button type="submit">
                                    <i class="uil uil-search"></i>
                                </button>
                            </form>
                            <a href="javascript:void(0)" class="header-btn header-cart">
                                <i class="uil uil-shopping-bag"></i>
                                <span class="cart-number">3</span>
                            </a>
                            <a
                                href="javascript:void(0)"
                                class="header-btn"
                                href="./logout.php">
                                <i class="uil uil-user-md"><b>
                                        <?php
                                        echo "Hai " . $user['nama']
                                        ?>
                                    </b></i>
                            </a>
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

                        $query = mysqli_query($conn, "SELECT * FROM baju_rajut WHERE id='$id'");
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
                                    src="../admin/templates/baju/file/<?php echo $row['foto']; ?>"
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
                                    Jenis Baju: <b class="m-2"><?php echo $row['jenis']; ?></b>
                                    <input type="hidden" name="jenis" value="<?php echo $row['jenis']; ?>">
                                </p>
                                <p>
                                    Stok Tersedia: <b class="m-2"><?php echo $row['stok']; ?></b>
                                    <input type="hidden" name="stok" value="<?php echo $row['stok']; ?>">
                                </p>
                                <div class="pt-2">
                                    <button type="button"
                                        class="sec-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Keranjang
                                    </button>
                                    <!-- <a href="./proses_tambah_keranjang.php" action="./proses_tambah_keranjang.php?hal=tambah_keranjang" class="sec-btn">
                                        Keranjang
                                    </a> -->
                                    <a href="./Belanja.php?id=<?php echo $row['id'] ?>" style="background-color: rebeccapurple; color: aliceblue"
                                        class="m-4 btn sec-btn">Belanja</a>

                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true" action="./aksi_tambah_content.php" method="POST">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content text-dark">
                                                <div class="modal-header" style="background-color: thistle;">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah ke Keranjang</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="background-color: snow;">
                                                    <form role="form" action="./aksi_tambah_content.php?hal=tambahcart" method="POST">
                                                        <div class="container pb-3">
                                                            <div class="row">
                                                                <input type="hidden" name="nama" value="<?php echo $row['nama']; ?>">
                                                                <h4 name="nama" value="<?php echo $row['nama']; ?>"><?php echo $row['nama']; ?></h4>
                                                                <div class="col-5"><input type="hidden" name="info_foto_barang"
                                                                        value="<?php echo $row['info_foto_barang']; ?>"
                                                                        src="../mimin/templates/shirt/file/<?php echo $row['info_foto_barang']; ?>">
                                                                    <?php
                                                                    if ($row['info_foto_barang'] == "") { ?>
                                                                        <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG"
                                                                            style="width:190;height:390;">
                                                                    <?php } else { ?>
                                                                        <img name="info_foto_barang"
                                                                            src="../mimin/templates/shirt/file/<?php echo $row['info_foto_barang']; ?>"
                                                                            value="<?php echo $row['info_foto_barang']; ?>" style="width:390;height:120px;">
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="col-7 pt-3">
                                                                    <input type="hidden" name="harga" value="<?php echo $row['harga']; ?>">
                                                                    <h4 class="font-weight-bold" name="harga"
                                                                        value="<?php echo $row['harga']; ?>">Rp. <?php echo $row['harga']; ?></h4>
                                                                    <p name="total_barang_datang">Stock = <?php echo $row['total_barang_datang']; ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container pt-2 border-top border-danger">
                                                            <div class="row">
                                                                <h4 class="mt-1 mb-2">Warna</h4>
                                                                <!-- <form role="form" action="./aksi_tambah_content.php" method="POST" enctype="multipart/form-data"> -->
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
                                                                <!-- </form>                             -->
                                                            </div>
                                                        </div>
                                                        <div class="container mt-3 border-top border-danger">
                                                            <div class="row">
                                                                <h4 class="mt-1 mb-2">Pilih Ukuran</h4>
                                                                <!-- <form role="form" action="./aksi_tambah_content.php" method="POST" enctype="multipart/form-data"> -->
                                                                <div class="box-body">
                                                                    <div class="form-group">
                                                                        <label>Size: </label>
                                                                        <select name="tipe_ukuran_cart" class="form-control" type="text">
                                                                            <option value="<?php echo $row['opsi_ukuran_1']; ?>"><?php echo $row['opsi_ukuran_1']; ?></option>
                                                                            <option value="<?php echo $row['opsi_ukuran_2']; ?>"><?php echo $row['opsi_ukuran_2']; ?></option>
                                                                            <option value="<?php echo $row['opsi_ukuran_3']; ?>"><?php echo $row['opsi_ukuran_3']; ?></option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group mt-3">
                                                                        <label>Jumlah: </label>
                                                                        <input placeholder="Jumlah Beli" min="1" max="<?php echo $row['total_barang_datang']; ?>" value=""
                                                                            name="jumlah_beli_cart" type="number">
                                                                    </div>
                                                                    <input type="hidden" name="user_email" value="<?php echo $user['email']; ?>">
                                                                    <input type="hidden" name="jenis_barang" value="BAJU">
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
                                            <a href="index.html">
                                                <img src="../logo.png" alt="">
                                            </a>
                                        </div>
                                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia, tenetur.
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
                                            <h3 class="h3-title">open hours</h3>
                                            <ul>
                                                <li><i class="uil uil-clock"></i> Mon-Thurs : 9am - 22pm</li>
                                                <li><i class="uil uil-clock"></i> Fri-Sun : 11am - 22pm</li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu food-nav-menu">
                                            <h3 class="h3-title">Links</h3>
                                            <ul class="column-2">
                                                <li>
                                                    <a href="#home" class="footer-active-menu">Home</a>
                                                </li>
                                                <li><a href="#about">About</a></li>
                                                <li><a href="#menu">Menu</a></li>
                                                <li><a href="#gallery">Gallery</a></li>
                                                <li><a href="#blog">Blog</a></li>
                                                <li><a href="#contact">Contact</a></li>
                                            </ul>
                                        </div>
                                        <div class="footer-menu">
                                            <h3 class="h3-title">Company</h3>
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
                                    <p>Copyright &copy; 2021 <span class="name">TechieCoder.</span>All Rights Reserved.
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
    <script src="../assets/js/smooth-scroll.js"></script>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.js"></script>
    <!-- custom js  -->
    <script src="../main.js"></script>
</body>

</html>