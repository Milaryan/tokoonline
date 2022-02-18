<?php
include_once "connect.php";
session_start();
$hii = $_POST["halo"];
$userid = $_SESSION["uid"];
$produkid = $_POST["produkid"];
$qty = $_POST["qty"];
$pilih = mysqli_query($connect, "SELECT * FROM cart WHERE user_id=$userid AND id_produk=$produkid");
$halo = mysqli_fetch_assoc($pilih);
$idproduk = isset($halo["id_produk"]);


if ($produkid == $idproduk) {
        $idcart = $halo["id"];
        $qbelum = $halo["qty"];
        $qsudah = $qbelum + $qty;
        mysqli_query($connect, "UPDATE cart SET qty= '$qsudah' WHERE id = $idcart");
        echo "<script>alert('barang berhasil ditambah');
        window.location=history.go(-1);</script> ";
} else {
        $query = "INSERT INTO cart VALUES ('','$userid','$produkid','$qty')";
        mysqli_query($connect, $query);
        echo "<script>alert('barang berhasil ditambah');
        window.location=history.go(-1);</script> ";
}
