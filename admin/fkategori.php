<?php
function kategori($query)
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
    $nama = htmlspecialchars($data["name"]);
    $query = "INSERT INTO kategori VALUES ('','$nama')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function hapus($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kategori WHERE id= $id");
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    $id = $data["id"];
    global $connect;
    $nama = htmlspecialchars($data["name"]);
    $query = "UPDATE kategori SET
                name='$nama'
                WHERE id= $id
                ";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function cari($keyword)
{
    $query = "SELECT * FROM kategori WHERE name LIKE '%$keyword%'";
    return kategori($query);
}
