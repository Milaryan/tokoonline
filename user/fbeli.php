<?php
function barang($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $array = [];
    while ($hi = mysqli_fetch_assoc($result)) {

        $array[] = $hi;
    }
    return $array;
}
function tambahsold($data)
{
    global $connect;
    $transaksi = htmlspecialchars($data["transaksi"]);
    $uid = htmlspecialchars($data["userid"]);
    $produk = $data["produk"];
    $stokdibeli = $data["stokdibeli"];
    $status = htmlspecialchars($data["status"]);
    $jumlah_dipilih = count($produk);

    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO sold VALUES ('','$transaksi','$uid','$produk[$x]','$stokdibeli[$x]','$status')";
        mysqli_query($connect, $query);
    }
    return mysqli_affected_rows($connect);
}