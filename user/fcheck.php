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
    $prov = htmlspecialchars($data["letak_provinsi"]);
    $kota = htmlspecialchars($data["tipe"]." ".$data["letak_kota"]);
    $alamat = htmlspecialchars($data["alamat_lengkap"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $kodepos = htmlspecialchars($data["kodepos"]);
    $pesan = htmlspecialchars($data["comment"]);
    $ekspedisi = htmlspecialchars($data["nama_ekspedisi"]);
    $paket = htmlspecialchars($data["nama_paket"]);
    $ongkir = htmlspecialchars($data["jml_ongkir"]);
    $pembelian = htmlspecialchars($data["pembelian"]);
    $estimasi = htmlspecialchars($data["estimasi"]);
    $tgl = htmlspecialchars($data["tgl"]);
    $idt = $data["idt"];

    $query = "INSERT INTO alamat VALUES ('','$uid','$nama1','$nama2','$email','$perusahaan','$prov','$kota','$alamat', '$no_hp','$kodepos','$pesan')";
    $query1 = "INSERT INTO ongkir VALUES ('','$uid','$idt','$ekspedisi','$paket','$ongkir','$pembelian','$estimasi','$tgl')";

    mysqli_query($connect, $query);
    mysqli_query($connect, $query1);
    return mysqli_affected_rows($connect);
}

function nota($nota){
    global $connect;
    $uid = htmlspecialchars($nota["user_id"]);
    $idt = $nota["idt"];

    $query2 = "INSERT INTO nota Values ('','$uid','$idt')";
    mysqli_query($connect, $query2);
    return mysqli_affected_rows($connect);

}


?>