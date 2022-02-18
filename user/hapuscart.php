<?php
include_once "fdatatk.php";
include_once "connect.php";
$id = $_GET["id"];
if (hapus($id) > 0) {
    echo "<script>alert('data berhasil dihapus');
            document.location.href = 'cart.php';</script> ";
} else {
    echo "<script>alert('data gagal dihapus');
            document.location.href = 'cart.php';</script> ";
}
