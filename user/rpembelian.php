<?php
include_once "fdatatk.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
if ($_SESSION["role"] == "admin") {
    header("location: ../admin/index3.php");
 }
$uid = $_SESSION["uid"];
// $cart = barang("SELECT b.nama, c.qty, b.image, b.harga, c.id, b.stok FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
// $nota = mysqli_query($connect, "SELECT nama_depan, nama_belakang, kota, nama_perusahaan, provinsi, no_hp, ongkir, ekspedisi, paket, pembelian, alamat_lengkap, tgl, estimasi, id_trans FROM ongkir INNER JOIN alamat using(user_id) WHERE user_id='$uid'");
// // penjumlahan total akhir
// $res = mysqli_query($connect, "SELECT id_SUM(harga * qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
// $row = mysqli_fetch_row($res);
// $sum = $row[0];
// // jumlah barang di keranjang
// $resj = mysqli_query($connect, "SELECT SUM(qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
// $rowj = mysqli_fetch_row($resj);
// $sumj = $rowj[0];
$call = mysqli_query($connect,"SELECT id_trans,nama,produk,stok,harga,tgl,jasa,ongkir,est,total,totala,proses FROM sold ");
 $sold = mysqli_fetch_assoc($call);
 $halo = barang("SELECT * FROM sold GROUP BY id_trans");

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
    <title>Amado - Furniture Ecommerce Template | Cart</title>

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
    <div class="main-content-wrapper d-flex clearfix" id="cartList">

        <!-- Mobile Nav (max width 767px)-->
        <?php
        include_once "navbar.php";
        ?>

        <!-- Header Area Start -->
        <?php
        include_once "header.php";
        ?>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Pesanan</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                            <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Total</th>
                                        <th>Estimasi</th>
                                    </tr>
                                </thead>
                            <?php foreach ($halo as $carta) : ?>

                                <tbody>
                                    
                                        <tr>
                                            <td>
                                                <h5><a href="nota1.php?=<?= $carta["id_trans"]?>"><?= $carta["id_trans"]?></a></h5>
                                            </td>
                                            <?php
                                            $ID = $carta["id_trans"];
                                            $nama= barang("SELECT s.produk, b.id FROM sold AS s INNER JOIN barang AS b ON b.nama=s.produk WHERE id_trans= $ID");
                                            ?>
                                            <td class="cart_product_desc">
                                                <?php
                                                foreach($nama as $coba) :
                                                ?>
                                                <a href="product-details.php?id=<?= $coba["id"];?>"><h5><?= $coba["produk"] ?></h5></a>
                                                <?php
                                                endforeach;
                                                ?>
                                            </td>
                                            <td class="price">
                                                <span>Rp. <?= number_format($carta["totala"]);  ?></span>
                                            </td>
                                            <td>
                                                <span><?= $carta["est"]?></span>
                                            </td>
                                            <!-- <td class=" qty">
                                                <div class="qty-btn d-flex">
                                                    <div class="quantity">
                                                        <style>
                                                            input[type=number]::-webkit-inner-spin-button {
                                                                opacity: 1;
                                                                -webkit-appearance: caps-lock-indicator;
                                                                -webkit-appearance: textfield;
                                                                -moz-appearance: textfield;
                                                                appearance: textfield;
                                                            }
                                                        </style>
                                                        <input class=" qty" onblur="qty(this)" style="text-align:center;" id="<?php echo $carta['id']; ?>" type="number" value="<?php echo $carta['qty']; ?>" min="1" max="<?= $carta['stok'] ?>">

                                                        <a class="ml-1" href="hapuscart.php?id=<?= $carta["id"]; ?>" role="button" onclick="return confirm('Yakin ingin menghapus?')">
                                                            <p style="display: inline; padding: 0%;"><i class="fa fa-trash"></i></p>

                                                        </a>
                                                    </div>
                                                </div>
                                            </td> -->
                                            
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>

                            </table>
                        </div>
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
    </tr>
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
    <script src="qty.js"></script>
</body>

</html>