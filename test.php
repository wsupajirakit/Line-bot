<?php

$client = new http\Client;
$request = new http\Client\Request;

$body = new http\Message\Body;
$body->addForm(array(
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
), NULL);

$request->setRequestUrl('http://redfoxdev.com/vtiger/webservice.php');
$request->setRequestMethod('POST');
$request->setBody($body);

$request->setHeaders(array(
  'postman-token' => 'd70b73d8-7bac-ba8e-af5f-40490d8e1eb1',
  'cache-control' => 'no-cache'
));

$client->enqueue($request)->send();
$response = $client->getResponse();

echo $response->getBody();
