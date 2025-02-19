<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width,initial-scale=1,maximum-scale=1" />
    <title>Aurellista Admin Dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <link
        rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
</head>

<body>
    <input type="checkbox" id="menu-toggle" />
    <div class="sidebar">
        <div class="side-header">
            <h3>A<span>urellista</span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <div
                    class="profile-img bg-img"
                    style="background-image: url(img/3.jpeg)"></div>
                <h4>Aurellista</h4>
                <small>Owner</small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="./index.php?hal=beranda" class="active nav-link" aria-current="page">
                            <span class="las la-home"></span>
                            <small>Beranda</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-user-alt"></span>
                            <small>Profil</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-envelope"></span>
                            <small>Mail</small>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./index.php?hal=baju">
                            <span class="las la-clipboard-list"></span>
                            <small>Baju</small>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./index.php?hal1=tas">
                            <span class="las la-clipboard-list"></span>
                            <small>Tas</small>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./index.php?hal2=sepatu">
                            <span class="las la-clipboard-list"></span>
                            <small>Sepatu</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-shopping-cart"></span>
                            <small>Pesanan</small>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="las la-tasks"></span>
                            <small>Tugas</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">
                    <label for="">
                        <span class="las la-search"></span>
                    </label>

                    <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div>

                    <div class="user">
                        <div
                            class="bg-img"
                            style="background-image: url(img/1.jpeg)"></div>

                        <span class="las la-power-off"></span>
                        <span>Logout</span>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <?php
            include "./content.php";
            ?>
        </main>
    </div>
</body>

</html>