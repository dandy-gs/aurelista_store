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
    <link rel="stylesheet" href="../assets/css/belanja.css">
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

                        $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE id='$id'");
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
                <div class="container" action="./proses_tambah_belanja.php" method="POST">
                    <div class="row">
                        <div class="col-75">
                            <div class="container">
                                <form action="./proses_tambah_belanja.php?hal=tambah_belanja" method="POST">
                                    <div class="row">
                                        <div class="col-50">
                                            <h3>Alamat Tujuan</h3>
                                            <label for="fname"><i class="fa fa-user"> Nama Lengkap</i></label>
                                            <input type="hidden" id="fname" name="id" value="<?php echo $row['id'] ?>">
                                            <input type="text" id="fname" name="nama" value="<?php echo $user['nama'] ?>">
                                            <label for="email"><i class="fa fa-envelope"></i> EMail</label>
                                            <input type="text" id="email" name="email" value="<?php echo $user['email'] ?>">
                                            <label for="adr"><i class="fa fa-address-card-o"></i> Alamat</label>
                                            <input type="text" id="adr" name="alamat" placeholder="Alamat kecamatan dan kelurahan" required>
                                            <label for="city"><i class="fa fa-institution"></i> Kota/Kabupaten</label>
                                            <input type="text" id="city" name="kota" placeholder="Isikan Kota" required>

                                            <div class="row">
                                                <div class="col-50">
                                                    <label for="state">Provinsi</label>
                                                    <input type="text" id="provinsi" name="provinsi" placeholder="Provinsi Kamu" required>
                                                </div>
                                                <div class="col-50">
                                                    <label for="zip">Kode Pos</label>
                                                    <input type="text" id="kodepos" name="kodepos" placeholder="0000" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-50">
                                            <h3>Informasi Produk</h3>
                                            <label for="cname"><b>Nama Produk</b></label>
                                            <input type="hidden" id="cname" name="nama_keranjang" value="<?php echo $row['nama_keranjang'] ?>"><?php echo $row['nama_keranjang'] ?>
                                            <label for="ccnum" class="mt-4"><b>Foto Produk</b></label>
                                            <input type="hidden" id="ccnum" name="foto_keranjang" value="<?php echo $row['foto_keranjang']; ?>"><?php
                                                                                                                                                if ($row['jenis_barang'] == "TAS") { ?>
                                                <img src="../admin/templates/tas/file/<?php echo $row['foto_keranjang']; ?>"
                                                    value="<?php echo $row['foto_keranjang']; ?>"
                                                    style="width:100px;height:100px;">
                                            <?php } elseif ($row['jenis_barang'] == "AKSESORIS") { ?>
                                                <img src="../admin/templates/tas/file/<?php echo $row['foto_keranjang']; ?>"
                                                    value="<?php echo $row['foto_keranjang']; ?>"
                                                    style="width:100px;height:100px;">
                                            <?php } else { ?>
                                                <img name="foto_keranjang"
                                                    src="../admin/templates/baju/file/<?php echo $row['foto_keranjang']; ?>"
                                                    value="<?php echo $row['foto_keranjang']; ?>"
                                                    style="width:390;height:120px;">
                                            <?php } ?>
                                            <label for="cname" class="mt-4"><b>Jenis Barang</b></label>
                                            <input type="hidden" id="cname" name="jenis_barang" value="<?php echo $row['jenis_barang'] ?>"><?php echo $row['jenis_barang'] ?>
                                            <label for="cname" class="mt-4"><b>Jumlah Beli</b></label>
                                            <input type="hidden" id="cname" name="jumlah_beli" value="<?php echo $row['jumlah_beli'] ?>"><?php echo $row['jumlah_beli'] ?>
                                            <label for="cname" class="mt-4"><b>Harga Total</b></label>
                                            <input type="hidden" id="cname" name="total_harga" value="<?php echo $row['total_harga']; ?>">
                                            <h4><b>Rp. <?php echo number_format($row['total_harga'], 2, ",", "."); ?></b></h4>
                                            <!-- <label class="mt-2" for="expmonth">Exp Month</label>
                                            <input type="text" id="expmonth" name="expmonth" placeholder="September">

                                            <div class="row">
                                                <div class="col-50">
                                                    <label for="expyear">Exp Year</label>
                                                    <input type="text" id="expyear" name="expyear" placeholder="2018">
                                                </div>
                                                <div class="col-50">
                                                    <label for="cvv">CVV</label>
                                                    <input type="text" id="cvv" name="cvv" placeholder="352">
                                                </div>
                                            </div> -->
                                        </div>

                                    </div>
                                    <label>
                                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                                    </label>
                                    <input type="submit" value="Continue to checkout" class="btn">
                                </form>
                            </div>
                        </div>

                        <!-- <div class="col-25">
                                <div class="container">
                                    <h4>Keranjang
                                        <span class="price" style="color:black">
                                            <i class="fa fa-shopping-cart"></i>
                                            <b><?php echo $jumlah_keranjang; ?></b>
                                        </span>
                                    </h4>
                                    <p><a href="#"><?php echo $row['nama_keranjang'] ?></a> <span class="price">Rp. <?php echo number_format($row['total_harga'], 2, ",", "."); ?></span></p>
                                    <p><a href="#">Product 2</a> <span class="price">$5</span></p>
                                    <p><a href="#">Product 3</a> <span class="price">$8</span></p>
                                    <p><a href="#">Product 4</a> <span class="price">$2</span></p>
                                    <hr>
                                    <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
                                </div>
                            </div> -->
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