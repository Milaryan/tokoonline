<?php
session_start();
include_once "fdatatk.php";

// cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];
    // ambil username berdasarkan id
    $result = mysqli_query($connect, "SELECT * FROM user WHERE id= '$id'");
    $row = mysqli_fetch_assoc($result);
    if ($key === hash('gost', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

//cek session
if (isset($_SESSION["login"])) {
    header("location: ../admin/index3.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cek = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username'");
    $row = mysqli_fetch_assoc($cek);
    if (mysqli_num_rows($cek) === 1) {
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;
            // remember me
            if (isset($_POST["remember"])) {
                setcookie('id', $row["id"], time() + 60);
                setcookie('key', hash('gost', $row['username']), time() + 60);
            }
        }
        if ($row['role'] == "admin") {
            $_SESSION['role'] = "admin";
            // alihkan ke halaman dashboard admin
            header("location:../admin/index3.php");
        } else if ($row['role'] == "user") {
            $_SESSION['uid'] = $row["id"];
            $_SESSION['role'] = "user";
            header("location: index.php");
        } else {
            header("location: login.php");
        }
    }
    $error = true;
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
        <div class="amado_product_area section-padding-100 mx-auto">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden p-5 m-auto" style="width: 100%;">
                            <h3 class="text-center">MENU LOGIN</h3>
                            <hr />
                            <?php
                            if (isset($error)) :
                            ?>
                                <p style="color: red;">Data yang anda masukkan salah!</p>
                            <?php endif; ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="username">Username:</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember" style="opacity: .85;">Remember me</label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="login" name="login" class="amado-btn">Login</button>
                                </div>
                                <p>Belum punya akun? <a href="registrasi.php" style="color: blue; font-size: 15px;">daftar</a></p>
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