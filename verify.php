<?php
$access_token =
'X+Hs7VK4FWrHIHrncVsWlb1V0rZxEehZLLrs3by2HgpQ0x9C2YcNhJRjDPZGomgN/nMHGx1Ejz0/ggPx2O4+ul+0uQO3FeQkx1ufBJmMBthBfC1g7SO19SnxdOmkuAfQI8HP1bUV5Ubv0Em1Yz8fdQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
