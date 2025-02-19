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
    <link rel="stylesheet" href="../assets/css/drawing-product.css">
    <link rel="stylesheet" href="../assets/css/jquery.fancybox.min.css" />
    <!-- custom css  -->
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
            <section class="about-sec section" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="sec-title text-center mb-5">
                                <p class="sec-sub-title mb-3">Tentang Kami</p>
                                <h2 class="h2-title">Berdasarkan <span>cerita Aurellista Store</span></h2>
                                <div class="sec-title-shape mb-4">
                                    <img src="assets/images/title-shape.svg" alt="">
                                </div>
                                <p>Aurellista Store didirikan oleh Seorang Mahasiswi Pendidikan Matematika dari Universitas Negeri Malang bernama Gressika Aurellista,
                                    yang difungsikan sebagai penghasilan tambahan di samping kegiatan perkuliahan.
                                    Toko ini merupakan anak Toko dari Yanti Arta, sebuah usaha offline yang didirikan perorangan oleh seorang Ibu hebat, Ibu Rumah Tangga Bernama Yanti, sebuah usaha untuk menambah pemasukan keluarga.
                                    Aurellista Store ini didirikan atas ijin pemilik Yanti Arta untuk melakukan <i>rebranding</i> usaha yang diharapkan dapat menjadi sebuah usaha yang bisa dijangkau banyak kalangan konsumen.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 m-auto">
                            <div class="about-video">
                                <div class="about-video-img" style="background-image: url(../assets/images/about.jpg);">
                                </div>
                                <div class="play-btn-wp">
                                    <a href="../assets/images/video.mp4" data-fancybox="video" class="play-btn">
                                        <i class="uil uil-play"></i>

                                    </a>
                                    <span>Lihat Toko Kami</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="our-team section">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Tim Kami</p>
                                    <h2 class="h2-title">Berikut beberapa individu yang terlibat</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row team-slider">
                            <div class="swiper-wrapper">
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(../assets/images/staff/mama-yanti.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Mama Yanti</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
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
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(../assets/images/staff/Yanto.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Endik Suryanto</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
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
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(../assets/images/staff/Lista.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Gressika Aurellista</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
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
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(../assets/images/staff/Ardan.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Ardan</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
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
                                <div class="col-lg-4 swiper-slide">
                                    <div class="team-box text-center">
                                        <div style="background-image: url(../assets/images/staff/Febri.jpg);"
                                            class="team-img back-img">

                                        </div>
                                        <h3 class="h3-title">Febri</h3>
                                        <div class="social-icon">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="uil uil-facebook-f"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="uil uil-instagram"></i>
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
                            </div>
                            <div class="swiper-button-wp">
                                <div class="swiper-button-prev swiper-button">
                                    <i class="uil uil-angle-left"></i>
                                </div>
                                <div class="swiper-button-next swiper-button">
                                    <i class="uil uil-angle-right"></i>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
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
    <script src="../assets/js/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="../main.js"></script>
    <script src="./draw.js" defer></script>
</body>

</html>