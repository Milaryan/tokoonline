<?php
include_once "connect.php";
$bany = $_POST['qty'];
$kera = $_POST['id'];
$hasil = "";
$cart = mysqli_query($connect, "SELECT b.stok, c.id, c.qty FROM barang AS b,cart AS c WHERE b.id = c.id_produk AND c.id = '$kera'");
$data = mysqli_fetch_array($cart);
$qua = $data['stok'];
if ($bany != "") {
    if ($bany > $qua) {
        $hasil = 'batas';
    } else {
        mysqli_query($connect, "UPDATE cart set qty = '$bany' where id = '$kera'");
    }
}
echo json_encode(array('status' => $hasil));
