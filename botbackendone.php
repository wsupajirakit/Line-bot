<?php
date_default_timezone_set('Asia/Bangkok');
  include('./httpful.phar');
$access_token =
'kr0/dRJjngoA6G+CdO94xUaR+SqEZia6jBbCUwA7yTQN1Wf/1fPhOuG5JyCQYsEKZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09wYh0iWl3isYfGlwUwb7dIWLmNC6HX/lPvg8cEUr2Vz/gdB04t89/1O/w1cDnyilFU=';

$sidname="47b77eae5a73f6aa08831";
$vturl="http://202.44.54.97/crm/";

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
			// Get replyToken
			$replyToken = $event['replyToken'];


      $text = $event['message']['text'];
      $userID = $event['source']['userId'];
      $groupID = $event['source']['groupId'];
      // Get replyToken
      $resultlist = '';
      $replyToken = $event['replyToken'];

      // Build message to reply back
      // $thirdtext = substr($text, 0, 3);
      // $thirdtext = substr($text, 0, 3);
      $context = substr($text, 0, 2);
      $ttrdtext = substr($text, 0, 3);
      $ftext = substr($text, 0, 1);
      $sectext = strtoupper(substr($text, 0, 2));
      $alltext= strtoupper(strstr($text, '-', true));
      $newtext = substr($alltext, 1);

      $lentext = strlen($newtext);

        $n1 = 'P'.substr($newtext,0,1);
        $n2 = 'P'.substr($newtext,1,1);
        $n3 = 'P'.substr($newtext,2,1);
        $n4 = 'P'.substr($newtext,3,1);
        $txc='';


        $nn1 = substr($newtext,0,1);
        $nn2 = substr($newtext,1,1);
        $nn3 = substr($newtext,2,1);
        $nn4 = substr($newtext,3,1);

        if($nn1>=1){
            $txc=1;
        }

        $uri = "http://202.44.54.97/crm/webservice.php?operation=query&sessionName=47b77eae5a73f6aa08831&query=select%20*%20from%20Bgame%20Where%20id%20='41x328';";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $gameStatus = $response->body->result[0]->bgame_tks_gamestatus;

        if(strtoupper($ftext) == "P" && $txc==1){

          $uri = "http://202.44.54.97/crm/webservice.php?operation=query&sessionName=47b77eae5a73f6aa08831&query=select%20*%20from%20Bmember%20where%20bmember_tks_userid='".$userID."';";
          $response = \Httpful\Request::get($uri)->send();

          $mbalance = $response->body->result[0]->bmember_tks_balance;
          $choice = $response->body->result[0]->bmember_tks_playerbet;
          $choicebet = $response->body->result[0]->bmember_tks_bet;
          $usernamex = $response->body->result[0]->bmember_tks_username;
          $newchoice = str_replace("|##|", "", $choice);
          $newchoice2 = str_replace("P", "", $newchoice);
          $newchoice3 = str_replace(" ", "", $newchoice2);
          $lenchoice = strlen($newchoice);
          $nowbet = '';

          $player= strtoupper(strstr($text, '-', true));
          $money  = substr($text, (strpos($text, '-') ?: -1) + 1);
          $money = substr($money,0,3);
          $moneylen = strlen($money);
          $ix= '';
          $tx= '';

          if(is_numeric($nn1)){

          }else {
            $ix=1;
          }

          if($nn1>4){
            $ix=1;
          }
          if($nn2>4){
            $ix=1;
          }
          if($nn3>4){
            $ix=1;
          }
          if($nn4>4){
            $ix=1;
          }
          if(strlen($player)>5){
            $ix=1;
          }

          if(substr_count($alltext,1)>1){
            $tx=1;
          }
          if(substr_count($alltext,2)>1){
            $tx=1;
          }
          if(substr_count($alltext,3)>1){
            $tx=1;
          }
          if(substr_count($alltext,4)>1){
            $tx=1;
          }


        if(strlen($usernamex)>0){
              if ($ix != 1 && $tx!=1) {
                      if($gameStatus == 1) {

                    if($money <= 200 && $money >=20) {

                                if($lentext==1){

                                  $moneyx = $money*2;
                                  if($moneyx<=$mbalance){
                                      $nowbet = 1;
                                  }else {
                                    $nowbet = 0;
                                  }

                                }else if ($lentext==2){

                                  $moneyx = $money*4;
                                  if($moneyx<=$mbalance){
                                      $nowbet = 1;
                                  }else {
                                    $nowbet = 0;
                                  }

                                }else if ($lentext==3){

                                  $moneyx = $money*6;
                                  if($moneyx<=$mbalance){
                                      $nowbet = 1;
                                  }else {
                                    $nowbet = 0;
                                  }


                                }else if ($lentext==4){
                                  $moneyx = $money*8;
                                  if($moneyx<=$mbalance){
                                      $nowbet = 1;
                                  }else {
                                    $nowbet = 0;
                                  }
                                }

                                if($nowbet==1){
                                $uri = "http://202.44.54.97/crm/webservice.php?operation=query&sessionName=47b77eae5a73f6aa08831&query=select%20*%20from%20Bmember%20where%20bmember_tks_userid='".$userID."';";
                                $response = \Httpful\Request::get($uri)->send();
                                // echo $response;
                                $username = $response->body->result[0]->bmember_tks_username;
                                $vid = $response->body->result[0]->id;
                                $balance = $response->body->result[0]->bmember_tks_balance;
                                $moneyx = $money*2;

                                $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => "http://202.44.54.97/crm/webservice.php",
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => "",
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 30,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => "POST",
                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n47b77eae5a73f6aa08831\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"bmemberno\": \"\",\n
                                    \"bmember_tks_userid\": \"$userID\",\n            \"bmember_tks_balance\": \"$balance\",\n            \"bmember_tks_bet\": \"$money\",\n            \"bmember_tks_username\": \"$username\",\n            \"bmember_tks_player\": \"0\",\n            \"bmember_tks_playerbet\": \"$n1 |##| $n2 |##| $n3 |##| $n4\",\n            \"bmember_tks_expend\": \"0\",\n            \"bmember_tks_income\": \"0\",\n
                                    \"bmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
                                    \"modifiedtime\": \"2018-02-02 05:25:21\",\n            \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                  CURLOPT_HTTPHEADER => array(
                                    "cache-control: no-cache",
                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                    "postman-token: 0dd99b19-60e4-0597-8d0b-76831d38ee2f"
                                  ),
                                ));

                                $response = curl_exec($curl);
                                $err = curl_error($curl);

                                curl_close($curl);

                                if ($err) {
                                  echo "cURL Error #:" . $err;
                                } else {
                                  echo $response;
                                }

                                  if($lenchoice >=2)
                                  {

                                    $dname= '';
                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                      CURLOPT_URL => "https://api.line.me/v2/bot/group/".$groupID."/member/".$userID,
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_ENCODING => "",
                                      CURLOPT_MAXREDIRS => 10,
                                      CURLOPT_TIMEOUT => 30,
                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                      CURLOPT_CUSTOMREQUEST => "GET",
                                      CURLOPT_HTTPHEADER => array(
                                        "authorization: Bearer kYoVuYTXz37wH2Xat3JhqS/pzyVmdEGDI9mlqgCEoxTUnHhjVw+CcztfYNmzDbUyZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09yCZxyWRQ0SwgCBGGAhSO1Y+/WI0C6NuhNEtOc7nWDaEAdB04t89/1O/w1cDnyilFU=",
                                        "cache-control: no-cache",
                                        "postman-token: 6dc09c6b-dd83-81ca-75ed-71ce43b5edd7"
                                      ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                      echo "cURL Error #:" . $err;
                                    } else {

                                    $data = json_decode($response,true);
                                    $username =  $data['displayName'];
                                    }

                                    $messages = [
                                      'type' => 'text',
                                      // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                                      'text' => '  '.$username.' เปลี่ยนแปลงการแทงจาก P'.$newchoice3.' จำนวน'.$choicebet.'->เป็น '.$player.' จำนวน'.$money
                                    ];
                                  }else {

                                    $dname= '';
                                    $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                      CURLOPT_URL => "https://api.line.me/v2/bot/group/".$groupID."/member/".$userID,
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_ENCODING => "",
                                      CURLOPT_MAXREDIRS => 10,
                                      CURLOPT_TIMEOUT => 30,
                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                      CURLOPT_CUSTOMREQUEST => "GET",
                                      CURLOPT_HTTPHEADER => array(
                                        "authorization: Bearer kYoVuYTXz37wH2Xat3JhqS/pzyVmdEGDI9mlqgCEoxTUnHhjVw+CcztfYNmzDbUyZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09yCZxyWRQ0SwgCBGGAhSO1Y+/WI0C6NuhNEtOc7nWDaEAdB04t89/1O/w1cDnyilFU=",
                                        "cache-control: no-cache",
                                        "postman-token: 6dc09c6b-dd83-81ca-75ed-71ce43b5edd7"
                                      ),
                                    ));

                                    $response = curl_exec($curl);
                                    $err = curl_error($curl);

                                    curl_close($curl);

                                    if ($err) {
                                      echo "cURL Error #:" . $err;
                                    } else {

                                    $data = json_decode($response,true);
                                    $username =  $data['displayName'];
                                    }


                                    $messages = [
                                      'type' => 'text',
                                      // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                                      'text' => '  '.$username.' แทงขา '.$player.' ขาละ '.$money.'   ยอดคงเหลือก่อนแทง '.$balance.'  '
                                    ];
                                  }

                        }                     //////*
                        else if ($nowbet==0){

                          $xbalance=0;

                          $uri = "http://202.44.54.97/crm/webservice.php?operation=query&sessionName=47b77eae5a73f6aa08831&query=select%20*%20from%20Bmember%20where%20bmember_tks_userid='".$userID."';";
                          $response = \Httpful\Request::get($uri)->send();
                          // echo $response;
                          $xbalance = $response->body->result[0]->bmember_tks_balance;

                          $dname= '';
                          $curl = curl_init();

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://api.line.me/v2/bot/group/".$groupID."/member/".$userID,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => array(
                              "authorization: Bearer kYoVuYTXz37wH2Xat3JhqS/pzyVmdEGDI9mlqgCEoxTUnHhjVw+CcztfYNmzDbUyZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09yCZxyWRQ0SwgCBGGAhSO1Y+/WI0C6NuhNEtOc7nWDaEAdB04t89/1O/w1cDnyilFU=",
                              "cache-control: no-cache",
                              "postman-token: 6dc09c6b-dd83-81ca-75ed-71ce43b5edd7"
                            ),
                          ));

                          $response = curl_exec($curl);
                          $err = curl_error($curl);

                          curl_close($curl);

                          if ($err) {
                            echo "cURL Error #:" . $err;
                          } else {

                          $data = json_decode($response,true);
                          $username =  $data['displayName'];
                          }

                          $messages = [
                            'type' => 'text',
                            'text' => $username.' ยอดเงินคงเหลือ '.$xbalance.' ไม่พอสำหรับการแทง กรุณาเติมเงินด้วยคะ'
                          ];

                        }
                  }  else {
                    $messages = [
                      'type' => 'text',
                      // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                      'text' => 'แทงได้แค่ P1 - P4 เท่านั้น ต่ำสุด 20 สูงสุด 200  ตัวอย่าง : P1234-50 หรือ P1-200'
                    ];

                  }
                  } else if ($gameStatus ==0){
                    $messages = [
                      'type' => 'text',
                      'text' => 'ขณะนี้ ไม่ใช่เวลาแทง รอเปิดรอบใหม่อีกครั้ง'
                    ];
                  }
                } else {
                  $messages = [
                    'type' => 'text',
                    // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                    'text' => 'แทงได้แค่ P1 - P4 เท่านั้น ต่ำสุด 20 สูงสุด 200  ตัวอย่าง : P1234-50 หรือ P1-200'
                  ];
                }
              }else {

                $dname= '';
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://api.line.me/v2/bot/group/".$groupID."/member/".$userID,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "GET",
                  CURLOPT_HTTPHEADER => array(
                    "authorization: Bearer kYoVuYTXz37wH2Xat3JhqS/pzyVmdEGDI9mlqgCEoxTUnHhjVw+CcztfYNmzDbUyZTuvzSgamawjblXWaKBxIQQfGBE+J6vZDO14WrIA09yCZxyWRQ0SwgCBGGAhSO1Y+/WI0C6NuhNEtOc7nWDaEAdB04t89/1O/w1cDnyilFU=",
                    "cache-control: no-cache",
                    "postman-token: 6dc09c6b-dd83-81ca-75ed-71ce43b5edd7"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                //   echo $response;
                //
                $data = json_decode($response,true);
                $dname =  $data['displayName'];
              }

              $messages = [
                'type' => 'text',
                // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                'text' => $dname.'ไม่ได้เป็นสมาชิกโปรดสมัครด้วย คำสั่ง " Play "'
              ];

              }

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
