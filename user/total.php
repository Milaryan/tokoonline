<?php
include_once "fdatatk.php";
$res = mysqli_query($connect, "SELECT SUM(harga * qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
$row = mysqli_fetch_row($res);
$sum = $row[0];