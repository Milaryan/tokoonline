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
    $transaksi = htmlspecialchars($data["idt"]);
    $uid = htmlspecialchars($data["user_id"]);
    $produk = $data["produk"];
    $stokdibeli = $data["stokdibeli"];
    $harga = $data["pembelian"];
    $status = htmlspecialchars($data["status"]);
    $jumlah_dipilih = count($produk);

    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO sold VALUES ('','$transaksi','$uid','$produk[$x]','$stokdibeli[$x]', '$harga','$status')";
        mysqli_query($connect, $query);
    }
    //hapus cart setelah confirm
    $uid = htmlspecialchars($data["user_id"]);
    $id = $data["produk_id"];
    $ssudah = $data["stokbaru"];
    $jumlah_dipilih = count($id);
    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query1 = "UPDATE barang SET stok= '$ssudah[$x]' WHERE id= $id[$x]";
        mysqli_query($connect, $query1);
    }
    $query2 = "DELETE FROM cart WHERE user_id= $uid";
    mysqli_query($connect, $query2);
    // $query3 = "DELETE FROM sold WHERE user_id= $uid";
    // mysqli_query($connect, $query3);
    // $query4 = "DELETE FROM ongkir WHERE user_id= $uid";
    // mysqli_query($connect, $query4);

    return mysqli_affected_rows($connect);
}
