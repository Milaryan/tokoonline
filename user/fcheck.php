<?php

$connect = mysqli_connect("localhost","root","","tokoonline");

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

function tambahdata($data)
{
    global $connect;
    $uid = htmlspecialchars($data["user_id"]);
    $nama1 = htmlspecialchars($data["nama_depan"]);
    $nama2 = htmlspecialchars($data["nama_belakang"]);
    $email = htmlspecialchars($data["email"]);
    $perusahaan = htmlspecialchars($data["perusahaan"]);
    $prov = htmlspecialchars($data["provinsi"]);
    $kota = htmlspecialchars($data["tipe"]." ".$data["kota"]);
    $alamat = htmlspecialchars($data["alamat_lengkap"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $kodepos = htmlspecialchars($data["kodepos"]);
    $pesan = htmlspecialchars($data["comment"]);
    

    $query = "INSERT INTO alamat VALUES ('','$uid','$nama1','$nama2','$email','$perusahaan','$prov','$kota','$alamat', '$no_hp','$kodepos','$pesan')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function checkongkir($helo){
    global $connect;
    $ekspedisi = htmlspecialchars($helo["nama_ekspedisi"]);
    $paket = htmlspecialchars($helo["nama_paket"]);
    $ongkir = htmlspecialchars($helo["jml_ongkir"]);
    $estimasi = htmlspecialchars($helo["estimasi"]);
    $tgl = htmlspecialchars($helo["tgl"]);
    
    $query = "INSERT INTO ongkir VALUES ('','$ekspedisi','$paket','$ongkir','$estimasi','$tgl'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
?>