<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n41fd14e15a617f672c0fd\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"001\",\n            \"balance_tks_balance\": \"900\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-19 05:16:44\",\n            \"modifiedtime\": \"2018-01-19 05:16:44\",\n            \"id\": \"47x531\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
    "postman-token: 533f06b3-0821-a7ea-5d31-36f0ce51e03f"
  ),
));

$response = curl_exec($curl);
$result = json_decode(curl_exec($curl));

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
}
