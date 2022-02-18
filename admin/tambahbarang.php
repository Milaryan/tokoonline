<?php
include_once "fdatatk.php";
include_once "connect.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../user/login.php");
}
if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan');
        document.location.href = 'databarang.php';</script> ";
    } else {
        echo "<script>alert('data gagal ditambahkan');
        document.location.href = 'databarang.php';</script> ";
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
    <link rel="stylesheet" href="image.css">
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
                    <div class="col-12" style="font-family: roboto;">
                        <div class="container card shadow overflow-hidden mt-5 p-5" style="width: 70%;">
                            <h3 class="text-center">Tambah Barang</h3>
                            <hr />
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama Barang:</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok:</label>
                                    <input type="number" class="form-control" id="stok" name="stok" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga:</label>
                                    <input type="number" class="form-control" id="harga" name="harga" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar:</label>
                                    <input type="file" class="form-control" id="gambar" name="image" autocomplete="off" onchange="readURL(this);" style="max-width: 150px;">
                                    <img id="blah" src="http://placehold.it/180" alt="your image" />
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <input type="text" class="form-control" id="deskripsi" name="detail" required autocomplete="off">
                                </div>
                                <div class=" form-group">
                                    <label for="kategori">Kategori:</label>
                                    <select id="kategori" class="form-control" name="kategori_id" required autocomplete="off">
                                        <?php
                                        $query = mysqli_query($connect, "SELECT * FROM kategori");
                                        while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['id']; ?>"><?php echo $data["name"]; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
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
    <script src="image.js"></script>
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