<?php
include_once "fstok.php";
include_once "connect.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../user/login.php");
}
$id = $_GET['id'];
$ubah = stok("SELECT * FROM barang WHERE id = $id")[0];
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');
        document.location.href = 'daftarstok.php';</script> ";
    } else {
        echo "<script>alert('data gagal diubah');</script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Simple Tables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="tambah.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once "header.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once "sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden mt-5 p-5" style="width: 70%;">
                            <h3 class="text-center">Ubah Stok</h3>
                            <hr />
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id_barang" value="<?= $ubah["id"] ?>">
                                    <label for="nama">Stok Sebelum:</label>
                                    <input disabled type="text" class="form-control" id="nama" name="stok_sebelum" required value="<?= $ubah["stok"] ?>">
                                    <input hidden type="text" class="form-control" id="nama" name="stok_sebelum" required value="<?= $ubah["stok"] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="harga">Stok Ditambahkan:</label>
                                    <input type="number" class="form-control" id="harga" name="stok_ditambahkan" required value="">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Tanggal:</label>
                                    <input type="date" class="form-control" id="harga" name="tanggal" required required value="">
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include_once "footer.php";
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>