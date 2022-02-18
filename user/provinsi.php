<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
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

//dapatnya dalam bentuk json
//diubah ke bentuk array
$array_response = json_decode($response, TRUE);
$provinsi = $array_response ["rajaongkir"]["results"];
  
  echo "<option value=''>Pilih Provinsi</option>";
foreach ($provinsi as $key => $tiap) {
  echo "<option value='".$tiap["province_id"]."' id_provinsi='".$tiap["province_id"]."'>";
  echo $tiap["province"];
  echo "</option>";
}

?>