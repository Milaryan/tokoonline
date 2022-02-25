<?php
include_once "fdatatk.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}

if ($_SESSION["role"] == "admin") {
    header("location: ../admin/index3.php");
 }
$daftarkategori = barang("SELECT * FROM kategori");
$databarang = barang("SELECT b.id,b.nama, b.stok,b.harga,k.name, b.image, b.kategori_id
FROM barang AS b
INNER JOIN kategori AS k
ON b.kategori_id = k.id;");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">
        <!-- Mobile Nav (max width 767px)-->
        <?php
        include_once "navbar.php";
        ?>

        <!-- Header Area Start -->
        <?php
        include_once "header.php";
        ?>
        <!-- Header Area End -->
        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h3 class="widget-title mb-30" style="color: rgb(252, 177, 3); letter-spacing: 1px;">KATEGORI</h3>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <ul>
                        <li><a href="index.php">Semua</a></li>
                        <?php foreach ($daftarkategori as $data) : ?>
                            <li><a href="shop.php?id=<?= $data["id"]; ?>"><?= $data["name"] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
        </div>

        <!-- Product Catagories Area Start -->

        <div class="amado_product_area section-padding-100 clearfix">
            <div class="amado-pro-catagory clearfix">
                <?php
                foreach ($databarang as $data) :
                ?>
                    <!-- Single Catagory -->
                    <div class="single-products-catagory clearfix">
                        <a href="product-details.php?id=<?= $data["id"]; ?>">
                            <img src="../admin/img/<?= $data['image'] ?>" alt="">
                            <!-- Hover Content -->
                            <div class="hover-content">
                                </style>
                                <div class="line"></div>
                                <p> Rp <?= number_format($data['harga']); ?></p>
                                <h4><?= $data['nama'] ?></h4>
                            </div>
                        </a>
                    </div>
                <?php
                endforeach;
                ?>


            </div>
        </div>
        <!-- Product Catagories Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php
    include_once "info.php";
    ?>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    include_once "footer.php";
    ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>