<?php

$pilihan = $_POST["id_provinsi"];
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$pilihan,
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
//jadikan array
$array_response=json_decode($response,true);
$data = $array_response["rajaongkir"]["results"];

// echo "<pre>";
// print_r($data);
// echo "</pre>";

echo "<option value=''>Pilih Kota</option>";
foreach ($data as $key => $tiap){
    echo "<option value='' 
    id_kota='".$tiap["city_id"]."'
    nama_provinsi='".$tiap["province"]."' 
    nama_kota='".$tiap["city_name"]."' 
    tipe='".$tiap["type"]."' 
    kode_pos='".$tiap["postal_code"]."'>";
    echo $tiap["type"]." ";
    echo $tiap["city_name"];
    echo"</option>";
}
?>