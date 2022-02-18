<?php
include_once "fdatatk.php";
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil ditambahkan');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo mysqli_error($connect);
    }
}
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
        <!-- Header Area End -->

        <!-- <div class="shop_sidebar_area"> -->

        <!-- ##### Single Widget ##### -->
        <!-- <div class="widget catagory mb-50"> -->
        <!-- Widget Title -->
        <!-- <h6 class="widget-title mb-30">Kategori</h6> -->

        <!--  Catagories  -->
        <!-- <div class="catagories-menu">
                    <ul>
                        <li class="active"><a href="#">Gadget</a></li>
                        <li><a href="#">Sepatu</a></li>
                        <li><a href="#">Aksesoris</a></li>
                        <li><a href="#">Pakaian</a></li>
                        <li><a href="#">Mainan</a></li>
                        <li><a href="#">Kamera</a></li>
                        <li><a href="#">Alat Dapur</a></li>
                    </ul>
                </div>
            </div> -->

        <!-- ##### Single Widget ##### -->

        <div class="amado_product_area section-padding-100 mx-auto

                <div class="row">
            <div class="col-12">
                <div class="container card shadow overflow-hidden p-5 m-auto" style="width: 100%;">
                    <h3 class="text-center">Menu Registrasi</h3>
                    <hr />
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password2">Konfirmasi password:</label>
                            <input type="password" class="form-control" id="password2" name="password2" required autocomplete="off">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="role" name="role" value="user" required autocomplete="off">
                        </div>
                        <button type="submit" name="register" class="amado-btn">Daftar</button>

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