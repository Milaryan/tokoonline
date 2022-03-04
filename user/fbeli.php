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
    $transaksi = $data["idt"];
    $uid = htmlspecialchars($data["user_id"]);
    $nama = $data["nama"];
    $produk = $data["produk"];
    $stokdibeli = $data["stokdibeli"];
    $harga = $data["harga"];
    $total = $data["pembelian"];
    $tgl = $data["tgl"];
    $jasa = $data["jasa"];
    $ongkir = $data["ongkir"];
    $est = $data["est"];
    $totala = $data["total"];
    $status = htmlspecialchars($data["status"]);
    $jumlah_dipilih = count($produk);

    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO sold VALUES ('','$transaksi','$uid','$nama' ,'$produk[$x]','$stokdibeli[$x]','$harga[$x]' ,'$tgl[$x]', '$jasa', '$ongkir', '$est', '$total', '$totala','$status')";
        mysqli_query($connect, $query);
        $nota = "INSERT INTO nota VALUES ('', '$uid', '$transaksi')";
        mysqli_query($connect,$nota);
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
    $query3 = "DELETE FROM alamat WHERE user_id= $uid";
    mysqli_query($connect, $query3);
    $query4 = "DELETE FROM ongkir WHERE user_id= $uid";
    mysqli_query($connect, $query4);

    return mysqli_affected_rows($connect);
}

function hapus($batal){

    global $connect;
    $uid = htmlspecialchars($batal["user_id"]);
    $query3 = "DELETE FROM alamat WHERE user_id= $uid";
    mysqli_query($connect, $query3);
    $query4 = "DELETE FROM ongkir WHERE user_id= $uid";
    mysqli_query($connect, $query4);

    return mysqli_affected_rows($connect);
}
