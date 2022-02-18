<?php
function stok($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $array = [];
    while ($hi = mysqli_fetch_assoc($result)) {

        $array[] = $hi;
    }
    return $array;
}
function tambah($data)
{
    $id = $data["id_barang"];
    global $connect;
    $sbelum = htmlspecialchars($data["stok_sebelum"]);
    $stambah = htmlspecialchars($data["stok_ditambahkan"]);
    $ssudah = $sbelum + $stambah;
    $idbarang = htmlspecialchars($data["id_barang"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    mysqli_query($connect, "UPDATE barang SET stok= '$ssudah' WHERE id= $id");
    $query = "INSERT INTO stok VALUES ('','$sbelum','$ssudah','$stambah','$idbarang','$tanggal' )";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM stok WHERE id= $id");
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    $id = $data["id_barang"];
    global $connect;
    $sbelum = htmlspecialchars($data["stok_sebelum"]);
    $ssudah = htmlspecialchars($data["stok_sesudah"]);
    $stambah = htmlspecialchars($data["stok_ditambahkan"]);
    $idbarang = htmlspecialchars($data["id_barang"]);
    $tanggal = htmlspecialchars($data["tanggal"]);
    $query = "UPDATE stok SET
                stok_sebelum='$sbelum',
                stok_sesudah= '$ssudah',
                stok_ditambahkan='$stambah',
                tanggal = '$tanggal'
                WHERE id= $id
                ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function cari($keyword)
{
    $query = "SELECT * FROM stok WHERE id_barang LIKE '%$keyword%'";
    return stok($query);
}
function registrasi($data)
{
    global $connect;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($connect, $data["password"]);
    $password2 = mysqli_real_escape_string($connect, $data["password2"]);
    $email = strtolower(stripslashes($data["email"]));
    $role = strtolower(stripslashes($data["role"]));
    // mengecek username ada di database apa belum
    $duplikatu = mysqli_query($connect, "SELECT username FROM user WHERE username= '$username'");
    if (mysqli_fetch_assoc($duplikatu)) {
        echo "<script>
        alert('username sudah pernah didaftarkan')
        </script>";
        return false;
    }
    // mengecek email ada di database apa belum
    $duplikate = mysqli_query($connect, "SELECT email FROM user WHERE email= '$email'");
    if (mysqli_fetch_assoc($duplikate)) {
        echo "<script>
        alert('email sudah pernah didaftarkan')
        </script>";
        return false;
    }
    // mengecek konfirmasi password apakah sesuai apa tidak
    if ($password !== $password2) {
        echo " <script>
        alert('konfirmasi password salah')
        </script>";
        return false;
    }
    // enkripsi password (password yang ingin di acak, )
    $password = password_hash($password, PASSWORD_DEFAULT);
    // menambah user ke database
    mysqli_query($connect, "INSERT INTO user VALUES('','$username','$email', '$password', '$role')");
    return mysqli_affected_rows($connect);
}
