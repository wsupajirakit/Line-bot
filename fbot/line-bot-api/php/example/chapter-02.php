<?php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '56c7d7a131821a15a2f406ce300ea4eb';
$access_token  = 'QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=';


$bot = new BOT_API($channelSecret, $access_token);

$bot->sendMessageNew('Ccab41b434c5bffb33de6b56baa03f642', 'Hello World !!');

if ($bot->isSuccess()) {
    echo 'Succeeded!';
    exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody();
exit();
