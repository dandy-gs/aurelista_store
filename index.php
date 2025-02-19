<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aurellista Store</title>
    <!-- for icons  -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- bootstrap  -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- for swiper slider  -->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">

    <!-- fancy box  -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- custom css  -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="body-fixed">
    <!-- start of header  -->
    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header-logo">
                        <a href="index.html">
                            <img src="logo.png" width="160" height="36" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="main-navigation">
                        <button class="menu-toggle"><span></span><span></span></button>
                        <nav class="header-menu">
                            <ul class="menu food-nav-menu">
                                <li><a href="#home">Beranda</a></li>
                                <li><a href="">Produk</a></li>
                                <li><a href="templates/tentang-kami.php">Tentang Kami</a></li>
                                <li><a href="#gallery">Blog</a></li>
                            </ul>
                        </nav>
                        <div class="header-right">
                            <li class="nav-item dropdown">
                                <a href="javascript:void(0)" class="header-btn header-cart dropdown-toggle"
                                    id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="uil uil-shopping-bag"></i>
                                    <span style="color:black" class="cart-number">0</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item disabled" href="#sepatu"><b>
                                                Kamu harus login terlebih dahulu
                                            </b></a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="">Keranjang</a>
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
                                        <a class="dropdown-item" href="login.php"><b>
                                                Login
                                            </b></a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href=register.php>Daftar</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header ends  -->

    <div id="viewport">
        <div id="js-scroll-content">

            <!-- Main Banner -->
            <section class="main-banner" id="home">
                <div class="js-parallax-scene">
                    <div class="banner-shape-1 w-100" data-depth="0.30">
                        <img src="assets/images/fly.png" alt="">
                    </div>
                    <div class="banner-shape-2 w-100" data-depth="0.25">
                        <img src="assets/images/leaf.png" alt="">
                    </div>
                </div>


                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="banner-text">
                                    <h1 class="h1-title">
                                        Selamat Datang di
                                        <span>Aurellista Store.</span>

                                    </h1>
                                    <p>Sebuah toko yang menjual produk aneka rajutan tangan yang dapat berupa <b>Tas
                                            Fashion,</b> <b>Baju anak - Baju Dewasa,</b> <b>Topi,</b> dan berbagai
                                        <b>Aksesoris Hijab.</b>
                                        Selain itu disini kami juga dapat menerima pesanan sesuai permintaan calon
                                        pembeli.
                                    </p>
                                    <div class="banner-btn mt-4">
                                        <a href="#menu" class="sec-btn">Lihat Produk Kami</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="banner-img-wp">
                                    <div class="banner-img" style="background-image: url(assets/images/main-b.jpg);">
                                    </div>
                                </div>
                                <div class="banner-img-text mt-4 m-auto">
                                    <h5 class="h5-title">Baju Rajut</h5>
                                    <p>Diatas merupakan gambar produk salah satu baju rajut yang diperuntukkan untuk
                                        outer atau luaran baju.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- List Product -->
            <section class="brands-sec">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="brand-title mb-5">
                                <h5 class="h5-title">Beberapa macam produk yang tersedia:</h5>
                            </div>
                            <div class="brands-row">
                                <div class="brands-box">
                                    <img src="assets/images/brands/b1.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img src="assets/images/brands/b2.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img src="assets/images/brands/b3.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img src="assets/images/brands/b4.png" alt="">
                                </div>
                                <div class="brands-box">
                                    <img src="assets/images/brands/b5.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Product -->
            <section style="background-image: url(assets/images/menu-bg.png);"
                class="our-menu section bg-light repeat-img" id="menu">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Produk Kami</p>
                                    <h2 class="h2-title">Gulir layar anda, <span>dan lihat aneka produk kami</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-tab-wp">
                            <div class="row">
                                <div class="col-lg-12 m-auto">
                                    <div class="menu-tab text-center">
                                        <ul class="filters">
                                            <div class="filter-active"></div>
                                            <li class="filter" data-filter=".all, .breakfast, .lunch, .dinner">
                                                <img src="assets/images/menu-1.png" alt="">
                                                Semua
                                            </li>
                                            <li class="filter" data-filter=".breakfast">
                                                <img src="assets/images/menu-2.png" alt="">
                                                Baju
                                            </li>
                                            <li class="filter" data-filter=".lunch">
                                                <img src="assets/images/menu-3.png" alt="">
                                                Tas
                                            </li>
                                            <li class="filter" data-filter=".dinner">
                                                <img src="assets/images/menu-4.png" alt="">
                                                Aksesoris
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="menu-list-row">
                            <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                                <?php
                                include 'config.php';
                                $query = "SELECT * FROM baju_rajut ORDER BY id ASC";
                                $dewan1 = $conn->prepare($query);
                                $dewan1->execute();
                                $rest1 = $dewan1->get_result();
                                while ($row = $rest1->fetch_assoc()) {
                                    $id = $row["id"];
                                    $nama = $row["nama"];
                                    $jenis = $row["jenis"];
                                    $lama_buat = $row["lama_buat"];
                                    $harga = $row["harga"];
                                    if (strlen($nama) > 50) {
                                        $nama = substr($nama, 0, 50) . "...";
                                    } ?>
                                    <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center" action="./admin/templates/baju/tambah_baju.php"
                                            method="POST">
                                            <a href="#home">
                                                <div class="dist-img">
                                                    <?php
                                                    if ($row['foto'] == "") { ?>
                                                        <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG">
                                                    <?php } else { ?>
                                                        <img src="./admin/templates/baju/file/<?php echo $row['foto']; ?>">
                                                    <?php } ?>
                                                    <!-- <img src="assets/images/dish/celana.png" alt=""> -->
                                                </div>
                                                <div class="dish-rating">
                                                    <i class="uil uil-star"></i>
                                                </div>
                                                <div class="dish-title">
                                                    <h4 class="h4-title" style="color:indigo" name="nama">
                                                        <?php echo $nama ?></h4>
                                                    <!-- <p name="lama_buat">lama_buat Barang: <?php echo $lama_buat ?></p> -->
                                                </div>
                                                <div class="dish-info" style="color: mediumpurple;">
                                                    <ul>
                                                        <li>
                                                            <p>Jenis</p>
                                                            <!-- <p>lama_buat</p> -->
                                                        </li>
                                                        <li>
                                                            <p><?php echo $jenis ?></p>
                                                            <!-- <p><?php echo $lama_buat ?></p> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dist-bottom-row" style="color: indigo">
                                                    <ul>
                                                        <li class="m-2">
                                                            <b>Rp. <?php echo $harga ?></b>
                                                        </li>
                                                        <li>
                                                            <button class="dish-add btn">
                                                                <i class="uil uil-plus"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <!-- <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center">
                                            <div class="dist-img">
                                                <img src="assets/images/dish/celana2.png" alt="">
                                            </div>
                                            <div class="dish-rating">
                                                4.3
                                                <i class="uil uil-star"></i>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title">Grilled Chicken</h3>
                                                <p>80 calories</p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p>Type</p>
                                                        <b>Non Veg</b>
                                                    </li>
                                                    <li>
                                                        <p>Persons</p>
                                                        <b>1</b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b>Rs. 359</b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <i class="uil uil-plus"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php } ?>
                            </div>
                        </div>
                        <div class="menu-list-row">
                            <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                                <?php
                                include 'config.php';
                                $query = "SELECT * FROM tas_rajut ORDER BY id ASC";
                                $dewan1 = $conn->prepare($query);
                                $dewan1->execute();
                                $rest1 = $dewan1->get_result();
                                while ($row = $rest1->fetch_assoc()) {
                                    $id = $row["id"];
                                    $nama = $row["nama"];
                                    $jenis_barang = $row["jenis_barang"];
                                    $lama_buat = $row["lama_buat"];
                                    $harga = $row["harga"];
                                    if (strlen($nama) > 50) {
                                        $nama = substr($nama, 0, 50) . "...";
                                    } ?>
                                    <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center" action="./admin/templates/tas/tambah_baju.php"
                                            method="POST">
                                            <a href="#home">
                                                <div class="dist-img">
                                                    <?php
                                                    if ($row['foto'] == "") { ?>
                                                        <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG">
                                                    <?php } else { ?>
                                                        <img src="./admin/templates/tas/file/<?php echo $row['foto']; ?>">
                                                    <?php } ?>
                                                    <!-- <img src="assets/images/dish/celana.png" alt=""> -->
                                                </div>
                                                <div class="dish-rating">
                                                    <i class="uil uil-star"></i>
                                                </div>
                                                <div class="dish-title">
                                                    <h4 class="h4-title" style="color:indigo" name="nama">
                                                        <?php echo $nama ?></h4>
                                                    <!-- <p name="lama_buat">lama_buat Barang: <?php echo $lama_buat ?></p> -->
                                                </div>
                                                <div class="dish-info" style="color: mediumpurple;">
                                                    <ul>
                                                        <li>
                                                            <p>Jenis</p>
                                                            <!-- <p>lama_buat</p> -->
                                                        </li>
                                                        <li>
                                                            <p><?php echo $jenis_barang ?></p>
                                                            <!-- <p><?php echo $lama_buat ?></p> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dist-bottom-row" style="color: indigo">
                                                    <ul>
                                                        <li class="m-2">
                                                            <b>Rp. <?php echo $harga ?></b>
                                                        </li>
                                                        <li>
                                                            <button class="dish-add btn">
                                                                <i class="uil uil-plus"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <!-- <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center">
                                            <div class="dist-img">
                                                <img src="assets/images/dish/celana2.png" alt="">
                                            </div>
                                            <div class="dish-rating">
                                                4.3
                                                <i class="uil uil-star"></i>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title">Grilled Chicken</h3>
                                                <p>80 calories</p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p>Type</p>
                                                        <b>Non Veg</b>
                                                    </li>
                                                    <li>
                                                        <p>Persons</p>
                                                        <b>1</b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b>Rs. 359</b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <i class="uil uil-plus"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php } ?>
                            </div>
                        </div>
                        <div class="menu-list-row">
                            <div class="row g-xxl-5 bydefault_show" id="menu-dish">
                                <?php
                                include 'config.php';
                                $query = "SELECT * FROM sepatu ORDER BY id ASC";
                                $dewan1 = $conn->prepare($query);
                                $dewan1->execute();
                                $rest1 = $dewan1->get_result();
                                while ($row = $rest1->fetch_assoc()) {
                                    $id = $row["id"];
                                    $nama = $row["nama"];
                                    $jenis = $row["jenis"];
                                    $lama_buat = $row["lama_buat"];
                                    $harga = $row["harga"];
                                    if (strlen($nama) > 50) {
                                        $nama = substr($nama, 0, 50) . "...";
                                    } ?>
                                    <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center" action="./admin/templates/sepatu/tambah_sepatu.php"
                                            method="POST">
                                            <a href="#home">
                                                <div class="dist-img">
                                                    <?php
                                                    if ($row['foto'] == "") { ?>
                                                        <img src="https://via.placeholder.com/500x500.png?text=FOTO+BARANG">
                                                    <?php } else { ?>
                                                        <img src="./admin/templates/sepatu/file/<?php echo $row['foto']; ?>">
                                                    <?php } ?>
                                                    <!-- <img src="assets/images/dish/celana.png" alt=""> -->
                                                </div>
                                                <div class="dish-rating">
                                                    <i class="uil uil-star"></i>
                                                </div>
                                                <div class="dish-title">
                                                    <h4 class="h4-title" style="color:indigo" name="nama">
                                                        <?php echo $nama ?></h4>
                                                    <!-- <p name="lama_buat">lama_buat Barang: <?php echo $lama_buat ?></p> -->
                                                </div>
                                                <div class="dish-info" style="color: mediumpurple;">
                                                    <ul>
                                                        <li>
                                                            <p>Jenis</p>
                                                            <!-- <p>lama_buat</p> -->
                                                        </li>
                                                        <li>
                                                            <p><?php echo $jenis ?></p>
                                                            <!-- <p><?php echo $lama_buat ?></p> -->
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dist-bottom-row" style="color: indigo">
                                                    <ul>
                                                        <li class="m-2">
                                                            <b>Rp. <?php echo $harga ?></b>
                                                        </li>
                                                        <li>
                                                            <button class="dish-add btn">
                                                                <i class="uil uil-plus"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- 2 -->
                                    <!-- <div class="col-lg-4 col-sm-6 dish-box-wp breakfast" data-cat="breakfast">
                                        <div class="dish-box text-center">
                                            <div class="dist-img">
                                                <img src="assets/images/dish/celana2.png" alt="">
                                            </div>
                                            <div class="dish-rating">
                                                4.3
                                                <i class="uil uil-star"></i>
                                            </div>
                                            <div class="dish-title">
                                                <h3 class="h3-title">Grilled Chicken</h3>
                                                <p>80 calories</p>
                                            </div>
                                            <div class="dish-info">
                                                <ul>
                                                    <li>
                                                        <p>Type</p>
                                                        <b>Non Veg</b>
                                                    </li>
                                                    <li>
                                                        <p>Persons</p>
                                                        <b>1</b>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dist-bottom-row">
                                                <ul>
                                                    <li>
                                                        <b>Rs. 359</b>
                                                    </li>
                                                    <li>
                                                        <button class="dish-add-btn">
                                                            <i class="uil uil-plus"></i>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section Banner -->
            <section class="two-col-sec section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="sec-img mt-5">
                                <img src="assets/images/break1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="sec-text">
                                <h2 class="xxl-title">Beda Hari, Beda Warna</h2>
                                <p>Menikmati hari dengan warna yang berbeda. Ada sebuah penelitian yang mengatakan
                                    kenakan warna
                                    baju yang menggambarkan suasana hatimu, maka pilihlah warna yang sesuai dan cocok
                                    seperti
                                    mood kamu hari ini, dengan dipadukan bahan baju dari rajut membuat kamu dapat
                                    menjalani hari
                                    dengan nyaman dan percaya diri</p>
                                <p>Untuk itu kami menyediakan berbagai pilihan produk yang beraneka warna, dan jika kamu
                                    tidak
                                    menemukan warna dan model yang kamu cari silahkan memesan melalui kolom chat kami
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="two-col-sec section pt-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 order-lg-1 order-2">
                            <div class="sec-text">
                                <h2 class="xxl-title">Checkout Dari Rumah</h2>
                                <p>Tidak hanya di instagram, dengan wesbite ini kini kamu dapat melihat dan memilih
                                    produk rajut yang kamu cari hanya melalui 1 website ini,
                                    dan jika kamu tidak menemukan produk rajut yang kamu inginkan, silahkan lakukan
                                    proses pemesanan dan hubungi admin untuk membuat produk seperti yang kamu pesan</p>
                                <p>Pilih, masukkan keranjang dan checkout sekarang</p>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-1">
                            <div class="sec-img">
                                <img src="assets/images/break2.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="book-table section bg-light">
                <div class="book-table-shape">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div>

                <div class="book-table-shape book-table-shape2">
                    <img src="assets/images/table-leaves-shape.png" alt="">
                </div>

                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Buku Pesanan</p>
                                    <h2 class="h2-title">Melayani Pesanan</h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="book-table-info">
                            <div class="row align-items-center">
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Senin hingga Jumat</h3>
                                        <p>5:00 - 16:00</p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="call-now text-center">
                                        <i class="uil uil-phone"></i>
                                        <a href="tel:+62-89506490105">+62 - 89506490105</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="table-title text-center">
                                        <h3>Sabtu dan Minggu</h3>
                                        <p>7::00 - 12:00</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="gallery">
                            <div class="col-lg-10 m-auto">
                                <div class="book-table-img-slider" id="icon">
                                    <div class="swiper-wrapper">
                                        <a href="/assets/images/bt2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt1.jpg)"></a>
                                        <a href="/assets/images/bt2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt2.jpg)"></a>
                                        <a href="assets/images/bt3.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt3.jpg)"></a>
                                        <a href="assets/images/bt4.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt4.jpg)"></a>
                                        <a href="assets/images/bt1.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt1.jpg)"></a>
                                        <a href="assets/images/bt2.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt2.jpg)"></a>
                                        <a href="assets/images/bt3.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt3.jpg)"></a>
                                        <a href="assets/images/bt4.jpg" data-fancybox="table-slider"
                                            class="book-table-img back-img swiper-slide"
                                            style="background-image: url(assets/images/bt4.jpg)"></a>
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


                    </div>
                </div>
            </section>

            <!-- Testimonial -->
            <section class="testimonials section bg-light">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mb-5">
                                    <p class="sec-sub-title mb-3">Testimoni</p>
                                    <h2 class="h2-title">Apa yang para pembeli katakan <span>tentang kami</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="testimonials-img">
                                    <img src="assets/images/testimonial-img.png" alt="">
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/review1.jpeg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:85%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Rosidah
                                                </h3>
                                                <p>Buat yang nyari baju rajut buat cucunya, bagus loh disini</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/review2.jpg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:80%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Nur Ajeng Aminah
                                                </h3>
                                                <p>Sekarang sudah ada websitenya, dulu masih harus pesan lewat wa</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/review3.jpeg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:89%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Nufidah Rohmah
                                                </h3>
                                                <p>Tas rajut nya awet dan nyaman di pakai</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="testimonials-box">
                                            <div class="testimonial-box-top">
                                                <div class="testimonials-box-img back-img"
                                                    style="background-image: url(assets/images/testimonials/reviiew4.jpeg);">
                                                </div>
                                                <div class="star-rating-wp">
                                                    <div class="star-rating">
                                                        <span class="star-rating__fill" style="width:100%"></span>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="testimonials-box-text">
                                                <h3 class="h3-title">
                                                    Endang Manik
                                                </h3>
                                                <p>Cukup bagus untuk yang lagi nyari dompet rajut</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="faq-sec section-repeat-img" style="background-image: url(assets/images/faq-bg.png);">
                <div class="sec-wp">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sec-title text-center mt-5 mb-5">
                                    <p class="sec-sub-title mb-3">faqs</p>
                                    <h2 class="h2-title">Beberapa <span>yang mungkin ditanyakan</span></h2>
                                    <div class="sec-title-shape mb-4">
                                        <img src="assets/images/title-shape.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-row">
                            <div class="faq-box">
                                <h4 class="h4-title">Apakah pembelian masih bersifat pemesanan terlebih dahulu?</h4>
                                <p>Benar, kami hanya akan membuatkan produk berdasarkan pesanan yang telah masuk </p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Berapa lama waktu pembuatan masing-masing produk?</h4>
                                <p>Tergantung masing-masing produknya yang dipesan, namun mayoritas produk akan jadi maksimal dalam 2 minggu setelah pemesanan</p>
                            </div>
                            <div class="faq-box">
                                <h4 class="h4-title">Apakah Aurellista ada gerai resminya?</h4>
                                <p>Sejauh ini masih belum, namun pembeli juga dapat melihat langsung ke tempat lokasi produksi dan berdiskusi secara langsung terkait pesanannya kepada pemilik usaha.</p>
                            </div>
                        </div>

                    </div>
                </div>

            </section>


            <!-- footer starts  -->
            <footer class="site-footer" id="contact">
                <div class="top-footer section">
                    <div class="sec-wp">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="footer-info">
                                        <div class="footer-logo">
                                            <a href="index.html">
                                                <img src="logo.png" alt="">
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
                                                    <a href="#home" class="footer-active-menu">Home</a>
                                                </li>
                                                <li><a href="#about">Produk</a></li>
                                                <li><a href="./templates/tentang-kami.php">Tentang Kami</a></li>
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
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!-- fontawesome  -->
    <script src="assets/js/font-awesome.min.js"></script>

    <!-- swiper slider  -->
    <script src="assets/js/swiper-bundle.min.js"></script>

    <!-- mixitup -- filter  -->
    <script src="assets/js/jquery.mixitup.min.js"></script>

    <!-- fancy box  -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- parallax  -->
    <script src="assets/js/parallax.min.js"></script>

    <!-- gsap  -->
    <script src="assets/js/gsap.min.js"></script>

    <!-- scroll trigger  -->
    <script src="assets/js/ScrollTrigger.min.js"></script>
    <!-- scroll to plugin  -->
    <script src="assets/js/ScrollToPlugin.min.js"></script>
    <!-- rellax  -->
    <!-- <script src="assets/js/rellax.min.js"></script> -->
    <!-- <script src="assets/js/rellax-custom.js"></script> -->
    <!-- smooth scroll  -->
    <script src="assets/js/smooth-scroll.js"></script>
    <!-- custom js  -->
    <script src="main.js"></script>

</body>

</html>