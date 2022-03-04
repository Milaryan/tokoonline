<?php
include_once "connect.php";
$uid = $_SESSION["uid"];
$data_barang = mysqli_query($connect, "SELECT * FROM cart as c join user as u on c.user_id=u.id WHERE u.id='$uid'");

// menghitung data barang
$jumlah_barang = mysqli_num_rows($data_barang);
?>

<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li style="letter-spacing: 1px;"><a href="index.php">Home</a></li>
            <li style="letter-spacing: 1px;"><a href="cart.php">Keranjang</a></li>
            <li style="letter-spacing: 1px;"><a href="rpembelian.php">Pesanan</a></li>
            <li style="letter-spacing: 1px;"><a href="lgantiout.php">Ganti Akun</a></li>
            <li style="letter-spacing: 1px;"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <!-- Button Group -->
    <!-- <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div> -->
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav" style="letter-spacing: 1px;"><img src="img/core-img/cart.png" alt=""> Keranjang (<span><?= $jumlah_barang; ?></span>)</a>
        <a href="#" class="fav-nav" style="letter-spacing: 1px;"><img src="img/core-img/favorites.png" alt=""> Favorit</a>
        <a href="#" class="search-nav" style="letter-spacing: 1px;"><img src="img/core-img/search.png" alt=""> Cari</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    </div>
</header>