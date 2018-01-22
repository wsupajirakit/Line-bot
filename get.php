<?php
echo '3333';

$bot = new \LINE\LINEBot(new CurlHTTPClient('oOuhFrVkrCn3ngWNcdA96wED/ZtTR3Y8xEozvIP0zdAfamJCNsuZZHDAByWu70/7U6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVVUpnDm09h8C0VmOEcKNsi9RHTFNbBv5V5EA3FaugRewdB04t89/1O/w1cDnyilFU='), [
    'channelSecret' => '56c7d7a131821a15a2f406ce300ea4eb'
]);

$res = $bot->getProfile('Uea8f71000cb4673f4d4431dee2318edd');
if ($res->isSucceeded()) {
    $profile = $res->getJSONDecodedBody();
    $displayName = $profile['displayName'];
    $statusMessage = $profile['statusMessage'];
    $pictureUrl = $profile['pictureUrl'];
}
