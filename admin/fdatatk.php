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
function tambah($data)
{
    global $connect;
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $berat = htmlspecialchars($data["berat"]);
    $kategori = htmlspecialchars($data["kategori_id"]);
    $image = upload();
    $detail = htmlspecialchars($data["detail"]);
    $query = "INSERT INTO barang VALUES ('','$nama','$stok','$harga', '$berat','$kategori','$image','$detail')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function upload()
{

    $nfile = $_FILES['image']['name'];
    $ufile = $_FILES['image']['size'];
    $tfile = $_FILES['image']['tmp_name'];
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $valid = explode('.', '$nfile');
    $valid = strtolower(end($gambarvalid));
    if (!in_array($valid, $gambarvalid)) {
        echo "<script>alert('File yang anda pilih bukan gambar')</script>";
        return false;
    }
    if ($ufile > 30000000) {
        echo "<script>alert('Ukuran file terlalu besar')</script>";
        return false;
    }
    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $valid;
    move_uploaded_file($tfile, 'img/' . $namabaru);

    return $namabaru;
}
function hapus($id)
{
    global $connect;
    // untuk memimilih data berdasarkan id
    $query1 = mysqli_query($connect, "SELECT * FROM barang WHERE id= $id");
    $data1 = mysqli_fetch_array($query1);

    // untuk menghapus seluruh data di id yang dipilih
    mysqli_query($connect, "DELETE FROM barang WHERE id= $id");
    // membuat variable untuk data image yang dipilih
    $path = "img/" . $data1["image"];
    // untuk menghapus image dari directory
    unlink($path);
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    $id = $data["id"];
    global $connect;
    $nama = htmlspecialchars($data["nama"]);
    $stok = htmlspecialchars($data["stok"]);
    $harga = htmlspecialchars($data["harga"]);
    $berat = htmlspecialchars($data["berat"]);
    $kategori = htmlspecialchars($data["kategori_id"]);
    $gambarlama = $data["gambarlama"];
    if ($_FILES['image']['error'] === 4) {
        $image = $gambarlama;
    } else {
        $image = upload();
    }
    $detail = htmlspecialchars($data["detail"]);
    $query = "UPDATE barang SET
                nama='$nama',
                stok= '$stok',
                harga='$harga',
                berat='$berat',
                kategori_id='$kategori',
                image='$image',
                detail= '$detail'
                WHERE id= $id
                ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function cari($keyword)
{
    $query = "SELECT * FROM barang WHERE id LIKE '%$keyword%' OR
                                        nama LIKE '%$keyword%'";
    return barang($query);
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
