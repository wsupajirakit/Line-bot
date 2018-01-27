<?php
include('./httpful.phar');
//
$vid = $_POST['iid'];
$newbalance= $_POST['inewbalance'];
$currentbalance= $_POST['ibalance'];
$iname= $_POST['iname'];

$sum = $newbalance+$currentbalance;

// echo $vid.'//'.$newbanalce.'//'.$currentbalance.'//'.$sum

// //
//
$uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20id%3D'".$vid."'%20%3B";
$response = \Httpful\Request::get($uri)->send();

$usernamex = $response->body->result[0]->cf_958;
$userIDx = $response->body->result[0]->balance_tks_userid;


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userIDx\",\n            \"balance_tks_balance\": \"$sum\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
    \"cf_956\": \"\",\n            \"cf_958\": \"$usernamex\",\n            \"cf_960\": \"\",\n            \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
  ),
));

$response = curl_exec($curl);
$result = json_decode($response);

$err = curl_error($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {

      $access_token =
      'QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=';

      $messages = [
        'type' => 'text',
        // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
        'text' => 'เติมเงินให้'.$iname.' จำนวน'.$sum
      ];


      $url = 'https://api.line.me/v2/bot/message/push';
      $data = [
        'to' => 'Ccab41b434c5bffb33de6b56baa03f642',
        'messages' => [$messages],
      ];
      $post = json_encode($data);
      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      $result = curl_exec($ch);
      curl_close($ch);




    header("Location: fbot.php?check=1");
    die();

}


curl_close($curl);


?>
