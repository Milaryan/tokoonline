<?php
include_once "fdatatk.php";
session_start();

$uid = $_SESSION["uid"];
$res = mysqli_query($connect, "SELECT SUM(harga * qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
$row = mysqli_fetch_row($res);
$sum = $row[0];
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
    <title>Amado - Furniture Ecommerce Template | Checkout</title>

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

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Formulir</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" placeholder="Nama Depan" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="" placeholder="Nama Belakang" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="company" placeholder="Nama Perusahaan" value="">
                                    </div>
                                    <div class="col-md-6 mb-3 halo">
                                        <select class="w-100" id="provinsi" name="provinsi">
                                        <option selected>Pilih Provinsi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 halo">
                                        <select class="w-100" id="kota" name="kota">
                                            <option selected>Pilih Kota</option>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="hidden" name="total_berat" value="1200">
                                        <input type="text" name="letak_provinsi">
                                        <input type="text" name="letak_kota" id="">
                                        <input type="text" name="tipe" id="">
                                        <input type="text" name="kodepos" id="">
                                        <input type="text" name="nama_ekspedisi" id="">
                                        <input type="text" name="nama_paket" id="">
                                        <input type="text" name="jml_ongkir" id="">
                                        <input type="text" name="estimasi" id="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" placeholder="Alamat Lengkap" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" max="12" placeholder="No. Telp/Handpone" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="kodepos" placeholder="Kode Pos" value="">
                                    </div>
                                    <div class="col-md-6 mb-3 halo">
                                        <select class="w-100" id="ekspedisi" name="ekspedisi">
                                            <option>Pilih Jasa Pengiriman</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3 halo">
                                        <select class="w-100" id="paket" name="paket">
                                            <option>Pilih Paket</option>
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Tinggalkan Pesan Untuk Pesanan Anda"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span><?= number_format($sum); ?></span></li>
                                <li><span>delivery:</span> <span>Free</span></li>
                                <li><span>total:</span> <span><?= number_format($sum); ?></span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>

                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
                            </div>
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
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
     <!-- <script src="js/plugins.js"></script>     -->
    <!-- Active js -->
    <script src="js/active.js"></script>
    <!-- Style -->
    <style>
    .halo .w-100 {
        background-color: #F5F7FA;
        border: none;
        height: 60px;
        color: #676A94;
        padding-left: 30px;
        font-size: 14px;
        border-radius: none;
        outline-style: hidden;
    }

    .halo .w-100:focus {
        outline: none !important;
        border-color: aqua;
        box-shadow: 0 0 0 2px #BFDEFF;
    }
    </style>

    <script>
        $(document).ready(function(){
            $.ajax({
                type:'post',
                url:'provinsi.php',
                success:function(hasil){
                    $("select[name=provinsi]").html(hasil);
                }
            });
        
        $("select[name=provinsi]").on("change",function(){
            //ambil id provinsi yg dipilh dari id provinsi
            var pilihan = $("option:selected",this).attr("id_provinsi");
            $.ajax({
                type:'post',
                url:'kota.php',
                data: 'id_provinsi='+pilihan,
                success:function(hasilk){
                    $("select[name=kota]").html(hasilk);
                }
                });
            });
        $.ajax({
            type: 'post',
            url: 'ekspedisi.php',
            success:function(hasile){
                $("select[name=ekspedisi]").html(hasile);
            }
        });
        $("select[name=ekspedisi").on("change",function(){
            //mendapat data ongkir

            //mendapatkan epspedisi yg dipilih
            var ekspedisi_pilihan = $("select[name=ekspedisi]").val();
            //mendapatkan kota yg dipilih user
            var kota_pilihan = $("option:selected","select[name=kota]").attr("id_kota");
            //mendapatkan total berat dari inputan
            var total_berat= $("input[name=total_berat]").val();
            $.ajax({
                type:'post',
                url:'paket.php',
                data:'ekspedisi='+ekspedisi_pilihan+'&kota='+kota_pilihan+'&berat='+total_berat,
                success:function(hasilp){
                    $("select[name=paket").html(hasilp);

                    //lrtakkan nama ekspedisi terpilih di input ekspedisi
                    $("input[name=nama_ekspedisi]").val(ekspedisi_pilihan)
                }
             });
         });
         $("select[name=kota").on("change", function(){
            var prov = $("option:selected",this).attr("nama_provinsi");
            var dist=  $("option:selected",this).attr("nama_kota");
            var tipe= $("option:selected",this).attr("tipe");
            var code= $ ("option:selected", this).attr("kode_pos");

            $("input[name=letak_provinsi]").val(prov);
            $("input[name=letak_kota]").val(dist);
            $("input[name=tipe]").val(tipe);
            $("input[name=kodepos]").val(code);
         });
         $("select[name=paket]").on("change",function(){
             var paket= $("option:selected",this).attr("paket");
             var ongkir= $("option:selected",this).attr("ongkir");
             var etd= $("option:selected",this).attr("etd");

            $("input[name=nama_paket]").val(paket);
            $("input[name=jml_ongkir]").val(ongkir);
            $("input[name=estimasi]").val(etd);
            
         })
    });
    </script>

</body>

</html>