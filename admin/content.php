<?php
if (isset($_GET['hal'])) {

    if ($_GET['hal'] == 'baju') {
        include "./templates/baju/baju.php";
    } elseif ($_GET['hal'] == 'tambah_baju') {
        include "./templates/baju/tambah_baju.php";
    } elseif ($_GET['hal'] == 'edit_baju') {
        include "./templates/baju/edit_baju.php";
    } else {
        include "./templates/beranda.php";
    };
};

if (isset($_GET['hal1'])) {

    if ($_GET['hal1'] == 'tas') {
        include "./templates/tas/tas.php";
    } elseif ($_GET['hal1'] == 'tambah_tas') {
        include "./templates/tas/tambah_tas.php";
    } elseif ($_GET['hal1'] == 'edit_tas') {
        include "./templates/tas/edit_tas.php";
    } else {
        include "./templates/beranda.php";
    };
};

if (isset($_GET['hal2'])) {

    if ($_GET['hal2'] == 'sepatu') {
        include "./templates/sepatu/sepatu.php";
    } elseif ($_GET['hal2'] == 'tambah_sepatu') {
        include "./templates/sepatu/tambah_sepatu.php";
    } elseif ($_GET['hal2'] == 'edit_sepatu') {
        include "./templates/sepatu/edit_sepatu.php";
    } else {
        include "./templates/beranda.php";
    };
};


if (isset($_GET['menu'])) {

    if ($_GET['menu'] == 'orders') {
        include "./templates/orders/orders.php";
    } elseif ($_GET['menu'] == 'acc_orders') {
        include "./templates/orders/acc_orders.php";
    } elseif ($_GET['menu'] == 'users') {
        include "./templates/users/users.php";
    } elseif ($_GET['menu'] == 'edit_hijab') {
        include "./templates/hijab/edit_hijab.php";
    } else {
        include "./templates/beranda.php";
    };
};
