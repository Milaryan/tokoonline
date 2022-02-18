<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$id = $_GET['id'];
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
include_once "fdatatk.php";
$daftarkategori = barang("SELECT * FROM kategori");
$databarang = barang("SELECT b.id,b.nama, b.stok,b.harga,k.name, b.image, b.kategori_id
FROM barang AS b
INNER JOIN kategori AS k
ON b.kategori_id = k.id;");
$datapilihan = barang("SELECT b.id,b.nama, b.stok,b.harga,k.name, b.image, b.kategori_id FROM barang AS b JOIN kategori AS k ON b.kategori_id= k.id WHERE b.kategori_id= $id");
?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Shop</title>

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
                        <?php
                        foreach ($daftarkategori as $halo) : ?>
                            <li><a href=" shop.php?id=<?= $halo["id"]; ?>"><?= $halo["name"] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- ##### Single Widget ##### -->
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="product-topbar d-xl-flex align-items-end justify-content-between">
                            <!-- Total Products -->
                            <div class="total-products">
                                <p>Showing 1-8 0f 25</p>
                                <div class="view d-flex">
                                    <a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-bars" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <!-- Sorting -->
                            <div class="product-sorting d-flex">
                                <div class="sort-by-date d-flex align-items-center mr-15">
                                    <p>Sort by</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortBydate">
                                            <option value="value">Date</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Popular</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="view-product d-flex align-items-center">
                                    <p>View</p>
                                    <form action="#" method="get">
                                        <select name="select" id="viewProduct">
                                            <option value="value">12</option>
                                            <option value="value">24</option>
                                            <option value="value">48</option>
                                            <option value="value">96</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                    foreach ($datapilihan as $data) :
                    ?>
                        <!-- Single Product Area -->
                        <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <a href="product-details.php?id=<?= $data["id"]; ?>">
                                    <div class="product-img">
                                        <img src="../admin/img/<?= $data['image'] ?>" alt="">
                                        <!-- Hover Thumb -->
                                    </div>

                                    <!-- Product Description -->
                                    <div class="product-description d-flex align-items-center justify-content-between">
                                        <!-- Product Meta Data -->
                                        <div class="product-meta-data">
                                            <div class="line"></div>
                                            <p class="product-price" style="letter-spacing: 1px;">Rp <?= number_format($data["harga"])  ?></p>

                                            <h6 style="letter-spacing: 1px;"><?= strtoupper($data["nama"]);  ?></h6>

                                        </div>
                                </a>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <form action="tambahcart.php" method="POST">
                                            <input class="halo" type="hidden" value="1" min="1" max="<?= $data["stok"] ?>" name="qty">
                                            <input type="hidden" name="produkid" value="<?= $data["id"] ?>">
                                            <input type="hidden" value="1" name="halo">
                                            <style>
                                                .buttonsaya {
                                                    display: block;
                                                    background-color: white;
                                                    color: white;
                                                    border: none;
                                                    outline: none;
                                                    float: right;
                                                }
                                            </style>
                                            <button type="submit" name="addtocart" class="buttonsaya"><img src="img/core-img/cart.png"></button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            <?php
                    endforeach;
            ?>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Pagination -->
                    <nav aria-label="navigation">
                        <ul class="pagination justify-content-end mt-50">
                            <li class="page-item active"><a class="page-link" href="#">01.</a></li>
                            <li class="page-item"><a class="page-link" href="#">02.</a></li>
                            <li class="page-item"><a class="page-link" href="#">03.</a></li>
                            <li class="page-item"><a class="page-link" href="#">04.</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
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