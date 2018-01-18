<?php
$access_token = 'MvaBOn28FTS3LauWjll8BKWyV3jxSw+4WfcvERCq+ANM03tnQ9vtZI0DJBxgT2IWU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeUqzuUdkGGYXsR3x7oaG1TdhFw2oumm6taqN300id4ffAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
