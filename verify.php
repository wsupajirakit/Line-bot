<?php
$access_token =
'kr0/dRJjngoA6G+CdO94xUaR+SqEZia6jBbCUwA7yTQN1Wf/1fPhOuG5JyCQYsEKZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09wYh0iWl3isYfGlwUwb7dIWLmNC6HX/lPvg8cEUr2Vz/gdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
