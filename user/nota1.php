<?php
session_start();
include_once "connect.php";
include_once "fdatatk.php";
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
if ($_SESSION["role"] == "admin") {
    header("location: ../admin/index3.php");
 }
 $uid = $_SESSION['uid'];
 $call = mysqli_query($connect,"SELECT id_trans,nama,produk,stok,harga,tgl,jasa,ongkir,est,total,totala,proses FROM sold ");
 $nota = mysqli_fetch_assoc($call);
 $halo = barang("SELECT * FROM sold");
 
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
        <div class="amado_product_area section-padding-100 mx-auto">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden p-5 m-auto" style="width: 100%;">
                            <h3 class="text-center">Pesanan</h3>
                            <hr />
                            <form action="" method="POST">
                            <table style="margin-bottom: 10px;">
                                <tr>
                                    <td>ID    : <?= $nota["id_trans"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama    : <?= $nota["nama"]; ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl      : <?= $nota["tgl"]?></td>
                                </tr>
                                <tr>
                                    <td>Jasa Pengiriman: 
                                        <?PHP if ($nota['jasa'] == "pos") {
                                                    echo "POS INDONESIA";}
                                            else if ($nota['jasa']== "tiki"){
                                                    echo "TIKI";}
                                            else {echo "JNE";}?></td>
                                </tr>
                                <tr>
                                    <td>Estimasi : <?= $nota["est"]?></td>
                                </tr>
                            </table>
                            <form action="" method="post">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $a = 1;
                                        ?>
                                        <?php
                                        foreach ($halo as $data) :
                                        ?>
                                            <?php
                                            
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $a ?></th>

                                                <input type="hidden" value="<?= $uid ?>" name="userid">
                                                <input type="hidden" value="proses" name="status">
                                                <td><?= $data["produk"] ?></td>
                                                <td><?= $data["stok"] ?></td>
                                                <td>Rp <?= number_format($data["harga"]); ?></td>
                                            </tr>
                                            <?php
                                            $a++;
                                            ?>
                                        <?php
                                        endforeach;
                                        ?>
                                        <tr class="">
                                            <th colspan="3">Ongkir</th>
                                            <th>Rp <?= number_format($nota["ongkir"])  ?></th>
                                        </tr>
                                        <tr class="">
                                            <th colspan="3">Total Akhir</th>
                                            <th>Rp <?= number_format($nota["totala"]);  ?></th>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                            <a href="rpembelian.php" class="btn amado-btn w-25">Kembali</a>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
   
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