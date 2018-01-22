<?php
  include('./httpful.phar');
$access_token =
'oOuhFrVkrCn3ngWNcdA96wED/ZtTR3Y8xEozvIP0zdAfamJCNsuZZHDAByWu70/7U6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVVUpnDm09h8C0VmOEcKNsi9RHTFNbBv5V5EA3FaugRewdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
      $userID = $event['source']['userId'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
      $context = substr($text, 0, 2);
			$ftext = substr($text, 0, 1);

      if(strtoupper($ftext) == "P"){
        $player= strstr($text, '-', true);
        $money  = substr($text, (strpos($text, '-') ?: -1) + 1);


        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$userID."'%20;";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $username = $response->body->result[0]->cf_958;
        $vid = $response->body->result[0]->id;
        $balance = $response->body->result[0]->balance_tks_balance;
                //
                // $mydata = [
                //   'operation' => 'update',
                //   'sessionName' => '244bae35a6579977f668',
                //   'element' => '"balanceno": "",
                //             "balance_tks_userid": '.$userID.',
                //             "balance_tks_balance": '.$balance.',
                //             "assigned_user_id": "19x1",
                //             "createdtime": "2018-01-22 04:44:00",
                //             "modifiedtime": "2018-01-22 04:45:29",
                //             "cf_956": '.$money.',
                //             "cf_958": '.$username.',
                //             "cf_960": '.$player.',
                //             "id": '.$vid.'',
                //   'elementType' => 'Balance',
                // ];
                // $mypost = json_encode($mydata);
                //
                //
        				// 	$curl = curl_init();
                //
        				// 	curl_setopt_array($curl, array(
        				// 	  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
        				// 	  CURLOPT_RETURNTRANSFER => true,
        				// 	  CURLOPT_ENCODING => "",
        				// 	  CURLOPT_MAXREDIRS => 10,
        				// 	  CURLOPT_TIMEOUT => 30,
        				// 	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        				// 	  CURLOPT_CUSTOMREQUEST => "POST",
        				// 	  CURLOPT_POSTFIELDS => $mypost,
                //     CURLOPT_HTTPHEADER => array(
        				// 	    "cache-control: no-cache",
        				// 	    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
        				// 	    "postman-token: 533f06b3-0821-a7ea-5d31-36f0ce51e03f"
        				// 	  ),
        				// 	));
                //
        				// 	$response = curl_exec($curl);
        				// 	$result = json_decode($response);
                //
        				// 	$err = curl_error($curl);
                //
        				// 	if ($err) {
        				// 	  echo "cURL Error #:" . $err;
        				// 	} else {
        				// 	}
                //
                //
        				// 	curl_close($curl);


              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$balance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                  \"cf_956\": \"$money\",\n            \"cf_958\": \"$username\",\n            \"cf_960\": \"$player\",\n            \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                CURLOPT_HTTPHEADER => array(
                  "Cache-Control: no-cache",
                  "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                ),
              ));

              $response = curl_exec($curl);
              $err = curl_error($curl);

              curl_close($curl);

              if ($err) {
                echo "cURL Error #:" . $err;
              } else {
              }
        $messages = [
          'type' => 'text',
          // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
          'text' => 'คุณ '.$username.' แทงพนันผู้เล่น '.$player.' จำนวน '.$money.' บาท ยอดคงเหลือปัจจุบัน(ก่อนหัก) '.number_format($balance,0,'.'.',').'บาท'
        ];
      }

			else if($ftext == "#"){
					$forwardtext = strstr($text, '+', true);
					$id = substr($forwardtext, 1);
					$money  = substr($text, (strpos($text, '+') ?: -1) + 1);

					$uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$id."'%20;";
			    $response = \Httpful\Request::get($uri)->send();
			    // echo $response;
			    $sum = $response->body->result[0]->balance_tks_balance;
					$sum = $sum+$money;

					$curl = curl_init();

					curl_setopt_array($curl, array(
					  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
					  CURLOPT_RETURNTRANSFER => true,
					  CURLOPT_ENCODING => "",
					  CURLOPT_MAXREDIRS => 10,
					  CURLOPT_TIMEOUT => 30,
					  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
					  CURLOPT_CUSTOMREQUEST => "POST",
					  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n41fd14e15a617f672c0fd\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$user\",\n            \"balance_tks_balance\": \"$sum\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-19 05:16:44\",\n            \"modifiedtime\": \"2018-01-19 05:16:44\",\n
            \"id\": \"47x531\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
					  CURLOPT_HTTPHEADER => array(
					    "cache-control: no-cache",
					    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
					    "postman-token: 533f06b3-0821-a7ea-5d31-36f0ce51e03f"
					  ),
					));

					$response = curl_exec($curl);
					$result = json_decode($response);

					$err = curl_error($curl);

					if ($err) {
					  echo "cURL Error #:" . $err;
					} else {
					}


					curl_close($curl);


        $messages = [
          'type' => 'text',
          'text' => 'ฝากเงินสำเร็จ คุณมียอดเงินคงเหลือ : '.$sum.' บาท'.'by'.$userID
        ];
      }

      else if(strtoupper($text) == "REGISTER"){


        $messages = [
          'type' => 'text',
          'text' => $userID
        ];
      }

      else if(strtoupper($context) == "PL"){

        $forwardtext = strstr($text, '+', true);
        $num1 = substr($forwardtext, 3);
        $num2  = substr($text, (strpos($text, '+') ?: -1) + 1);
        $sumall = $num1+$num2;
        $messages = [
          'type' => 'text',
          'text' => $sumall
        ];
      }
      else if(strtoupper($context) == "MU"){

        $forwardtext = strstr($text, '*', true);
        $num1 = substr($forwardtext, 3);
        $num2  = substr($text, (strpos($text, '*') ?: -1) + 1);
        $sumall = $num1*$num2;
        $messages = [
          'type' => 'text',
          'text' => $sumall
        ];
      }
      else if(strtoupper($context) == "MI"){

        $forwardtext = strstr($text, '-', true);
        $num1 = substr($forwardtext, 3);
        $num2  = substr($text, (strpos($text, '-') ?: -1) + 1);
        $sumall = $num1-$num2;
        $messages = [
          'type' => 'text',
          'text' => $sumall
        ];
      }

      else if(strtoupper($context) == "DI"){

        $forwardtext = strstr($text, '/', true);
        $num1 = substr($forwardtext, 3);
        $num2  = substr($text, (strpos($text, '/') ?: -1) + 1);
        $sumall = $num1/$num2;
        $messages = [
          'type' => 'text',
          'text' => $sumall
        ];
      }

      else {

        $messages = [
          'type' => 'text',
          'text' => 'ไม่พบสิ่งที่คุณต้องการ โปรดลองใหม่อีกครั้งนะครับ :)'
        ];
      }
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
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

			echo $result . "\r\n";
		}
	}
}
echo "OK";
