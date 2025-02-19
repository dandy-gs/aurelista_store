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

$email = $user['email'];
$user_email = $email;

$data_keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE users_email='{$_SESSION['SESSION_EMAIL']}'");
$jumlah_keranjang = mysqli_num_rows($data_keranjang);

$query_cart = "SELECT sum(total_harga) FROM keranjang WHERE users_email='{$_SESSION['SESSION_EMAIL']}'";
$result_cart = mysqli_query($conn, $query_cart);

$row_cart = mysqli_fetch_array($result_cart);
$total_cart = $row_cart[0];

// $total_harga = $jumlah_beli * $harga_keranjang;

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
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="../assets/css/keranjang.css">
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
                <div class="container">
                    <div class="row align-items-center">
                        <table class="demo-table responsive">
                            <thead>
                                <tr>
                                    <th scope="col" class="column-primary" data-header="Keranjang"><span>Keranjang</span></th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Foto Produk</th>
                                    <th scope="col">Jumlah Beli</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jenis Produk</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col" class="column-primary">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../config.php";
                                // $cart=mysqli_query($conn,"SELECT A.* FROM cart A inner join users B where A.user_email = B.email ");
                                $keranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE users_email = '$user_email'");
                                $nomor = 1;
                                date_default_timezone_set('Asia/Jakarta');
                                $date = date("d-m-y");
                                while ($row = mysqli_fetch_array($keranjang)) {
                                ?>
                                    <tr>
                                        <td data-header="Nama Produk" class="title"><?php echo $row['nama_keranjang'] ?></td>
                                        <td data-header="Foto">
                                            <?php
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
                                        </td>
                                        </td>
                                        <td data-header="Jumlah Beli"><?php echo $row['jumlah_beli'] ?></td>
                                        <td data-header="Harga Satuan">Rp. <?php echo number_format($row['harga_keranjang'], 2, ",", "."); ?></td>
                                        <td data-header="Jenis Produk"><?php echo $row['jenis_barang'] ?></td>
                                        <td style="font-size:larger;" data-header="Total Harga"><b>Rp. <?php echo number_format($row['total_harga'], 2, ",", "."); ?></b></td>
                                        <th scope="row">
                                            <div class="toolbox">
                                                <a style="background-color: rebeccapurple;"
                                                    class="btn text-white mb-2" href="./belanja.php?id=<?php echo $row['id'] ?>">Beli</a>
                                                <button type="button" class="btn btn-secondary mb-2">Hapus</button>
                                            </div>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- jquery  -->
    <script>
        $(document).ready(function() {
            $("a.more").click(function() {
                // Toggle Class
                $tr = $(this).parent().parent();
                $tr.toggleClass("expanded");

                // Tampilkan - sembunyikan baris
                $i = $(this).children("i");
                $i.removeClass("fa-chevron-down", "fa-chevron-up");
                var arrow = $tr.hasClass("expanded") ? "fa-chevron-up" : "fa-chevron-down";
                $i.addClass(arrow);

                return false;
            });
        });
    </script>
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
    <script src="../assets/js/keranjang.js"></script>
</body>

</html>