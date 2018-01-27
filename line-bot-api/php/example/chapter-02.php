<?php

include ('line-bot-api/php/line-bot.php');

$channelSecret = '551ec4........3cff0';
$access_token  = '2og9ogezC..... W5ZUEQQdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
$bot->sendMessageNew('U39f72cc.....d460d6ddf', 'Hello World !!');

if ($bot->isSuccess()) {
    echo 'Succeeded!';
    exit();
}

// Failed
echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
exit();
