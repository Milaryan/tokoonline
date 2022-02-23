<?php
$ekspedisi = $_POST["ekspedisi"];
$kota = $_POST["kota"];
$berat = $_POST["berat"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "origin=501&destination=$kota&weight=$berat&courier=$ekspedisi",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/x-www-form-urlencoded",
    "key: 949853039297a610c3a1468979fa9756"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
//$response dijadikan array
$array_response=json_decode($response,true);
$paket= $array_response["rajaongkir"]["results"]["0"]["costs"];
// echo "<pre>";
// print_r($paket);
// echo"</pre>";

echo"<option value=''>Pilih Paket</option>";
foreach ($paket as $key => $tiap){
    echo"<option
    paket='".$tiap['service']."'
    ongkir='".$tiap["cost"]["0"]["value"]."'
    value='".$tiap["cost"]["0"]["value"]."'
    etd='".$tiap["cost"]["0"]["etd"]."'>";
    echo $tiap["service"]." ";
    echo number_format($tiap["cost"]["0"]["value"])." ";
    echo $tiap["cost"]["0"]["etd"]." HARI";
    echo"</option>";
}
?>