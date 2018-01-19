




<?php

$url = "http://redfoxdev.com/vtiger/webservice.php";

$data = array(
  'operation' => 'update',
  'sessionName' => '41fd14e15a617f672c0fd',
  'element' => '{
            "balanceno": "",
            "balance_tks_userid": "001",
            "balance_tks_balance": "5",
            "assigned_user_id": "19x1",
            "createdtime": "2018-01-19 05:16:44",
            "modifiedtime": "2018-01-19 05:16:44",
            "id": "47x531"
        }'
);

$json = json_encode($data);

$content = json_encode($json);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);
