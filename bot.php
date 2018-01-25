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
      $sectext = strtoupper(substr($text, 0, 2));
      $alltext= strtoupper(strstr($text, '-', true));
      $newtext = substr($alltext, 1);

      $lentext = strlen($newtext);

        $n1 = 'P'.substr($newtext,0,1);
        $n2 = 'P'.substr($newtext,1,1);
        $n3 = 'P'.substr($newtext,2,1);
        $n4 = 'P'.substr($newtext,3,1);
        $nn1 = substr($newtext,0,1);
        $nn2 = substr($newtext,1,1);
        $nn3 = substr($newtext,2,1);
        $nn4 = substr($newtext,3,1);

        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x539';";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $gameStatus = $response->body->result[0]->games_tks_gameid;

      if(strtoupper($ftext) == "P"){

        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$userID."'%20;";
        $response = \Httpful\Request::get($uri)->send();
        $choice = $response->body->result[0]->cf_964;
        $choicebet = $response->body->result[0]->cf_956;
        $usernamex = $response->body->result[0]->cf_958;
        $newchoice = str_replace("|##|", "", $choice);
        $newchoice2 = str_replace("P", "", $newchoice);
        $newchoice3 = str_replace(" ", "", $newchoice2);
        $lenchoice = strlen($newchoice);

        $player= strtoupper(strstr($text, '-', true));
        $money  = substr($text, (strpos($text, '-') ?: -1) + 1);
        $ix= '';

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

      if(strlen($usernamex)>0){
            if ($ix != 1) {
                    if($gameStatus == 1) {

                  if($money <= 200 && $money >=20) {
                  $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$userID."'%20;";
                  $response = \Httpful\Request::get($uri)->send();
                  // echo $response;
                  $username = $response->body->result[0]->cf_958;
                  $vid = $response->body->result[0]->id;
                  $balance = $response->body->result[0]->balance_tks_balance;
                  $moneyx = $money*2;


                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$balance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:56\",\n            \"modifiedtime\": \"2018-01-22 09:50:55\",\n
                            \"cf_956\": \"$money\",\n            \"cf_958\": \"$username\",\n    \"cf_970\": \"1\",\n   \"cf_966\": \"0\",\n    \"cf_968\": \"0\",\n    \"cf_960\": \"0\",\n            \"cf_964\": \"$n1 |##| $n2 |##| $n3 |##| $n4\",\n            \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                          CURLOPT_HTTPHEADER => array(
                            "Cache-Control: no-cache",
                            "Postman-Token: c2bcfb7c-6bff-0d04-9232-39fdc17796d0",
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


                    if($lenchoice >=2)
                    {
                      $messages = [
                        'type' => 'text',
                        // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                        'text' => '  '.$username.' เปลี่ยนแปลงการแทงจาก P'.$newchoice3.' จำนวน'.$choicebet.'->เป็น '.$player.' จำนวน'.$money
                      ];
                    }else {
                      $messages = [
                        'type' => 'text',
                        // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                        'text' => '  '.$username.' แทงพนันผู้เล่น '.$player.' จำนวน '.$money.'   ยอดคงเหลือปัจจุบัน(ก่อนหัก) '.$balance.'  '
                      ];
                    }


                }  else {
                  $messages = [
                    'type' => 'text',
                    // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                    'text' => 'แทงได้แค่ P1 - P4 เท่านั้น ต่ำสุด 20 สูงสุด 200  '
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
                  'text' => 'แทงได้แค่ P1 - P4 เท่านั้น ต่ำสุด 20 สูงสุด 200  '
                ];
              }
            }else {

              $dname= '';
              $curl = curl_init();

              curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.line.me/v2/bot/profile/".$userID,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                  "authorization: Bearer oOuhFrVkrCn3ngWNcdA96wED/ZtTR3Y8xEozvIP0zdAfamJCNsuZZHDAByWu70/7U6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVVUpnDm09h8C0VmOEcKNsi9RHTFNbBv5V5EA3FaugRewdB04t89/1O/w1cDnyilFU=",
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
              'text' => $dname.'ไม่ได้เป็นสมาชิก'
            ];

            }

      }

      else if(strtoupper($ftext) == "S"){


        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x539';";
        $response = \Httpful\Request::get($uri)->send();

        $adminID = $response->body->result[0]->games_tks_password;


          if(strcmp($adminID,$userID) == 0){


        $extext = explode(",", $text);
        // echo $extext[0]; // piece1
        // echo $extext[1]; // piece2
        // echo $extext[2]; // piece2
        // echo $extext[3]; // piece2

        $uri3x = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x543';";
        $response3x = \Httpful\Request::get($uri3x)->send();
        // echo $response;
        $xround = $response3x->body->result[0]->games_tks_username;
        $xround = $xround-1;


        $listname= 'สรุปผล : รอบที่ # '.$xround;
        $resultlist= 'สรุปผล : รอบที่ # '.$xround;

        $x1 = substr($extext[0], 2);

        if ($x1=="-1"){
           $msg1 = 'ขา 1 เสียให้เจ้ามือ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

         //   $data = json_decode($response,true);
         //   $total = 0;
         //   foreach ($data["result"] as $value) {
         //           $total = $total+1;
         //   }
         //
         //   for( $i=0; $i<$total; $i++ ) {
         //
         //
         //     $username = $response->body->result[$i]->cf_958;
         //     $userID = $response->body->result[$i]->balance_tks_userid;
         //     $vid = $response->body->result[$i]->id;
         //     $balance = $response->body->result[$i]->balance_tks_balance;
         //     $bet = $response->body->result[$i]->cf_956;
         //     $player = $response->body->result[$i]->cf_960;
         //     $newbalance = $balance - $bet;
         //
         //     $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';
         //
         // }



// **************

              $data = json_decode($response,true);
              $total = 0;
              foreach ($data["result"] as $value) {
                      $total = $total+1;
              }

              foreach($data["result"] as $item) { //foreach element in $arr

                   $username = $item['cf_958'];
                   $userID = $item['balance_tks_userid'];
                   $vid = $item['id'];
                   $balance = $item['balance_tks_balance'];
                   $bet = $item['cf_956'];
                   $player = $item['cf_960'];
                   $expend = $item['cf_966']+$bet;
                   $income = $item['cf_968'];
                   $playerbet = $item['cf_964'];
                   $newbalance = $balance;

                $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                       $curl = curl_init();
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                            \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                          CURLOPT_HTTPHEADER => array(
                            "Cache-Control: no-cache",
                            "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                          ),
                        ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {

                      }
                         curl_close($curl);





                }

//

        } else if  ($x1=="+1"){
           $msg1 = 'ขา 1 ได้ 1 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+$bet;
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }

        }else if  ($x1=="+0"){
           $msg1 = 'เจ๊า';

      $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }

        }else if  ($x1=="-2"){
           $msg1 = 'ขา 1 ได้ 2 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $betx = ($bet+$bet);
                $expend = $item['cf_966']+$betx;
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"1\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x1=="+2"){
           $msg1 = 'ขา 1 ได้ 2 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+($bet*2);
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }
        $x2 = substr($extext[1], 1);
        if ($x2=="-1"){
          $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P2%'%20;";
          $response = \Httpful\Request::get($uri)->send();

          $data = json_decode($response,true);
          $total = 0;
          foreach ($data["result"] as $value) {
                  $total = $total+1;
          }

          foreach($data["result"] as $item) { //foreach element in $arr

               $username = $item['cf_958'];
               $userID = $item['balance_tks_userid'];
               $vid = $item['id'];
               $balance = $item['balance_tks_balance'];
               $bet = $item['cf_956'];
               $player = $item['cf_960'];
               $expend = $item['cf_966']+$bet;
               $income = $item['cf_968'];
               $playerbet = $item['cf_964'];
               $newbalance = $balance;

            $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                   $curl = curl_init();
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                        \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "Cache-Control: no-cache",
                        "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                      ),
                    ));

                  $response = curl_exec($curl);
                  $err = curl_error($curl);

                  if ($err) {
                    echo "cURL Error #:" . $err;
                  } else {

                  }
                     curl_close($curl);





            }

        } else if  ($x2=="+1"){

           $msg2 = 'ขา 2 ได้ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+$bet;
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }


        }else if  ($x2=="+0"){
           $msg2 = 'เจ๊า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;
             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }

        }else if  ($x2=="-2"){
           $msg2 = 'ขา 2 เสียให้เจ้ามือ 2 เท่า';
          $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966']+($bet*2);
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;
             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }

        }else if  ($x2=="+2"){
           $msg2 = 'ขา 2 ได้ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+($bet*2);
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }

        $x3 = substr($extext[2], 1);
        if ($x3=="-1"){
           $msg3 = 'ขา3 เสียให้เจ้ามือ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966']+$bet;
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }

        } else if  ($x3=="+1"){
           $msg3 = 'ขา 3 ได้ 1 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+$bet;
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x3=="+0"){
           $msg3 = 'เจ๊า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x3=="-2"){
           $msg3 = 'ขา 3 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966']+($bet*2);
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x3=="+2"){
           $msg3 = 'ขา 3 ได้ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+($bet*2);
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }

        $x4 = substr($extext[3], 1);
        if ($x4=="-1"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 1 เท่า';

                      $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P4%'%20;";
                      $response = \Httpful\Request::get($uri)->send();

                      $data = json_decode($response,true);
                      $total = 0;
                      foreach ($data["result"] as $value) {
                              $total = $total+1;
                      }

                      foreach($data["result"] as $item) { //foreach element in $arr

                           $username = $item['cf_958'];
                           $userID = $item['balance_tks_userid'];
                           $vid = $item['id'];
                           $balance = $item['balance_tks_balance'];
                           $bet = $item['cf_956'];
                           $player = $item['cf_960'];
                           $expend = $item['cf_966']+$bet;
                           $income = $item['cf_968'];
                           $playerbet = $item['cf_964'];
                           $newbalance = $balance;

                        $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                               $curl = curl_init();
                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => "",
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 30,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => "POST",
                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                                    \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                  CURLOPT_HTTPHEADER => array(
                                    "Cache-Control: no-cache",
                                    "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                                  ),
                                ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {

                              }
                                 curl_close($curl);





                        }
        } else if  ($x4=="+1"){
           $msg4 = 'ขา 4 ได้ 1 เท่า';
             $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+$bet;
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x4=="+0"){
           $msg4 = 'เจ๊า';
             $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x4=="-2"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966']+($bet*2);
                $income = $item['cf_968'];
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }
        }else if  ($x4=="+2"){
           $msg4 = 'ขา 4 ได้ 2 เท่า';
             $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_964%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $expend = $item['cf_966'];
                $income = $item['cf_968']+($bet*2);
                $playerbet = $item['cf_964'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"$bet\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"$expend\",\n  \"cf_964\": \"$playerbet\",\n   \"cf_968\": \"$income\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"1\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);
             }
        }

          $urix = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_970%20LIKE%20'1'%20;";
          $responsex = \Httpful\Request::get($urix)->send();

          $datax = json_decode($responsex,true);

          foreach($datax["result"] as $itemx) {
              $username = $itemx['cf_958'];
              $userID = $itemx['balance_tks_userid'];
              $vid = $itemx['id'];
              $balance = $itemx['balance_tks_balance'];
              $bet = $itemx['cf_956'];
              $xmoneyx = $itemx['cf_960'];
              $expend = $itemx['cf_966'];
              $income = $itemx['cf_968'];
              $sum = $income - $expend;
              $playerbet = $itemx['cf_964'];

                      if($income == 0){
                          $sum = substr($sum,1);
                        $newbalance = $balance - $sum;
                         $resultlist = $resultlist."\n@".$username." เสีย-".$sum."เหลือ=".$newbalance."";
                         $curl = curl_init();
                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                              \"cf_956\": \"\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"\",\n  \"cf_964\": \"\",\n   \"cf_968\": \"\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                              "Cache-Control: no-cache",
                              "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                            ),
                          ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        if ($err) {
                          echo "cURL Error #:" . $err;
                        } else {

                        }
                           curl_close($curl);

                      }
                      else if($sum < 0){
                          $sum = substr($sum,1);
                        $newbalance = $balance - $sum;
                         $resultlist = $resultlist."\n@".$username." เสีย-".$sum."เหลือ=".$newbalance."";

                         $curl = curl_init();
                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                              \"cf_956\": \"\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"\",\n  \"cf_964\": \"\",\n   \"cf_968\": \"\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                              "Cache-Control: no-cache",
                              "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                            ),
                          ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        if ($err) {
                          echo "cURL Error #:" . $err;
                        } else {

                        }
                           curl_close($curl);

                      }else if ($sum >= 0){
                        $newbalance = $balance + $sum;
                       $resultlist = $resultlist."\n@".$username." ได้+".$sum."เหลือ=".$newbalance."";


                       $curl = curl_init();
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                            \"cf_956\": \"\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"\",\n  \"cf_964\": \"\",\n   \"cf_968\": \"\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                          CURLOPT_HTTPHEADER => array(
                            "Cache-Control: no-cache",
                            "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                          ),
                        ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {

                      }
                         curl_close($curl);
                      }



            }



          // // $total = 0;
          // // foreach ($data["result"] as $value) {
          // //        $total = $total+1;
          // // }
          //
          // foreach($datax["result"] as $itemx) { //foreach element in $arr
          //
          //     $username = $itemx['cf_958'];
          //     $userID = $itemx['balance_tks_userid'];
          //     $vid = $itemx['id'];
          //     $balance = $itemx['balance_tks_balance'];
          //     $bet = $itemx['cf_956'];
          //     $player = $itemx['cf_960'];
          //     $expend = $itemx['cf_966'];
          //     $income = $itemx['cf_968']+($bet*2);
          //     $playerbet = $itemx['cf_964'];
          //     $newbalance = $balance - $bet;
          //
          //
          //     $resultlist= $resultlist."\n".$username."==".$income-$expend
          //
          //         $curl = curl_init();
          //          curl_setopt_array($curl, array(
          //            CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
          //            CURLOPT_RETURNTRANSFER => true,
          //            CURLOPT_ENCODING => "",
          //            CURLOPT_MAXREDIRS => 10,
          //            CURLOPT_TIMEOUT => 30,
          //            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          //            CURLOPT_CUSTOMREQUEST => "POST",
          //            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
          //              \"cf_956\": \"0\",\n            \"cf_958\": \"$username\",\n      \"cf_966\": \"0\",\n  \"cf_964\": \"0\",\n   \"cf_968\": \"0\",\n    \"cf_960\": \"\",\n     \"cf_970\": \"0\",\n       \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
          //            CURLOPT_HTTPHEADER => array(
          //              "Cache-Control: no-cache",
          //              "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
          //              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
          //            ),
          //          ));
          //
          //        $response = curl_exec($curl);
          //        $err = curl_error($curl);
          //
          //        if ($err) {
          //          echo "cURL Error #:" . $err;
          //        } else {
          //
          //        }
          //           curl_close($curl);
          //  }



        $messages = [
          'type' => 'text',
          'text' =>  $resultlist
        ];

      }else {

      }

    }

      else if(strtoupper($ftext) == "zz"){

        $extext = explode(",", $text);
        // echo $extext[0]; // piece1
        // echo $extext[1]; // piece2
        // echo $extext[2]; // piece2
        // echo $extext[3]; // piece2

        $listname= 'สรุปผล :';
        $resultlist= 'สรุปผล :';

        $x1 = substr($extext[0], 2);

        if ($x1=="-1"){
           $msg1 = 'ขา 1 เสียให้เจ้ามือ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P1'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['cf_958'];
                $userID = $item['balance_tks_userid'];
                $vid = $item['id'];
                $balance = $item['balance_tks_balance'];
                $bet = $item['cf_956'];
                $player = $item['cf_960'];
                $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                    $curl = curl_init();
                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n244bae35a6579977f668\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"$newbalance\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-22 04:44:00\",\n            \"modifiedtime\": \"2018-01-22 05:50:35\",\n
                         \"cf_956\": \"\",\n            \"cf_958\": \"$username\",\n            \"cf_960\": \"\",\n            \"id\": \"$vid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "Cache-Control: no-cache",
                         "Postman-Token: 8cf07109-175f-5368-08c6-63279568d118",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                       ),
                     ));

                   $response = curl_exec($curl);
                   $err = curl_error($curl);

                   if ($err) {
                     echo "cURL Error #:" . $err;
                   } else {

                   }
                      curl_close($curl);





             }



        } else if  ($x1=="+1"){
           $msg1 = 'ขา 1 ได้ 1 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P1'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }

        }else if  ($x1=="+0"){
           $msg1 = 'เจ๊า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P1'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + 0;

             $listname = $listname."\n ".$username."  + 0 = ".$newbalance.' ';

         }

        }else if  ($x1=="-2"){
           $msg1 = 'ขา 1 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P1'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

         }


        }else if  ($x1=="+2"){
           $msg1 = 'ขา 1 ได้ 2 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P1'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }
        }
        $x2 = substr($extext[1], 1);
        if ($x2=="-1"){
          $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P2'%20;";
          $response = \Httpful\Request::get($uri)->send();

          $data = json_decode($response,true);
          $total = 0;
          foreach ($data["result"] as $value) {
                  $total = $total+1;
          }

          for( $i=0; $i<$total; $i++ ) {


            $username = $response->body->result[$i]->cf_958;
            $userID = $response->body->result[$i]->balance_tks_userid;
            $vid = $response->body->result[$i]->id;
            $balance = $response->body->result[$i]->balance_tks_balance;
            $bet = $response->body->result[$i]->cf_956;
            $player = $response->body->result[$i]->cf_960;
            $newbalance = $balance - $bet;

            $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

         }

        } else if  ($x2=="+1"){

           $msg2 = 'ขา 2 ได้ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P2'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';
           }

        }else if  ($x2=="+0"){
           $msg2 = 'เจ๊า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P2'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + 0;

             $listname = $listname."\n ".$username."  + 0 = ".$newbalance.' ';
           }

        }else if  ($x2=="-2"){
           $msg2 = 'ขา 2 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P2'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

         }
        }else if  ($x2=="+2"){
           $msg2 = 'ขา 2 ได้ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P2'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }
        }


        $x3 = substr($extext[2], 1);
        if ($x3=="-1"){
           $msg3 = 'ขา3 เสียให้เจ้ามือ 1 เท่า';

           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P3'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';
           }

        } else if  ($x3=="+1"){
           $msg3 = 'ขา 3 ได้ 1 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P3'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';
           }
        }else if  ($x3=="+0"){
           $msg3 = 'เจ๊า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P3'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + 0;

             $listname = $listname."\n ".$username."  + 0 = ".$newbalance.' ';

         }
        }else if  ($x3=="-2"){
           $msg3 = 'ขา 3 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P3'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

         }
        }else if  ($x3=="+2"){
           $msg3 = 'ขา 3 ได้ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P3'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }

        }

        $x4 = substr($extext[3], 1);
        if ($x4=="-1"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 1 เท่า';

                      $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P4'%20;";
                      $response = \Httpful\Request::get($uri)->send();

                      $data = json_decode($response,true);
                      $total = 0;
                      foreach ($data["result"] as $value) {
                              $total = $total+1;
                      }

                      for( $i=0; $i<$total; $i++ ) {


                        $username = $response->body->result[$i]->cf_958;
                        $userID = $response->body->result[$i]->balance_tks_userid;
                        $vid = $response->body->result[$i]->id;
                        $balance = $response->body->result[$i]->balance_tks_balance;
                        $bet = $response->body->result[$i]->cf_956;
                        $player = $response->body->result[$i]->cf_960;
                        $newbalance = $balance - $bet;

                        $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

                    }
        } else if  ($x4=="+1"){
           $msg4 = 'ขา 4 ได้ 1 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P4'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }
        }else if  ($x4=="+0"){
           $msg4 = 'เจ๊า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P4'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + 0;

             $listname = $listname."\n ".$username."  + 0 = ".$newbalance.' ';

         }
        }else if  ($x4=="-2"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P4'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance - $bet;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.' ';

         }
        }else if  ($x4=="+2"){
           $msg4 = 'ขา 4 ได้ 2 เท่า';
           $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20cf_960='P4'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           for( $i=0; $i<$total; $i++ ) {


             $username = $response->body->result[$i]->cf_958;
             $userID = $response->body->result[$i]->balance_tks_userid;
             $vid = $response->body->result[$i]->id;
             $balance = $response->body->result[$i]->balance_tks_balance;
             $bet = $response->body->result[$i]->cf_956*2;
             $player = $response->body->result[$i]->cf_960;
             $newbalance = $balance + $bet;

             $listname = $listname."\n ".$username."  +".$bet." = ".$newbalance.' ';

         }
        }

        $messages = [
          'type' => 'text',
          'text' =>  $listname
        ];

      }
			else if($ftext == "@"){

        $myid = substr($text,1);

        if(strcmp($myid,"id") == 0){

          $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$userID."'%20;";
          $response = \Httpful\Request::get($uri)->send();
          // echo $response;
          $username = $response->body->result[0]->cf_958;
          $vid = $response->body->result[0]->id;
          $balance = $response->body->result[0]->balance_tks_balance;

          $userlen = strlen($vid);
          if($vid > 2) {

                      $messages = [
                        'type' => 'text',
                        'text' =>  $username.' ID คือ '.$vid.' ยอดเงินคงเหลือ '.$balance
                      ];
          } else {

                      $messages = [
                        'type' => 'text',
                        'text' =>  'คุณไม่ได้เป็นสมาชิกโปรดสมัครด้วย คำสั่ง " Register "'
                      ];
          }


        } else {

          $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x539';";
          $response = \Httpful\Request::get($uri)->send();

          $adminID = $response->body->result[0]->games_tks_password;


            if(strcmp($adminID,$userID) == 0){

                          $cont= '';
                          if (strpos($text, '+') !== false) {
                            $forwardtext = strstr($text, '+', true);
                            $money  = substr($text, (strpos($text, '+') ?: -1) + 1);
                            $cont=1;
                          }
                          if (strpos($text, '-') !== false) {
                            $forwardtext = strstr($text, '-', true);
                            $money  = substr($text, (strpos($text, '-') ?: -1) + 1);
                            $cont=2;
                          }




                            $id = substr($forwardtext, 1);
                  					$uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20id=%27".$id."%27%20;";
                  			    $response = \Httpful\Request::get($uri)->send();
                  			    // echo $response;
                  			    $sum = $response->body->result[0]->balance_tks_balance;


                            if($cont==1){
                              					$sum = $sum+$money;
                            }else {
                              					$sum = $sum-$money;
                            }



                            $usernamex = $response->body->result[0]->cf_958;
                            $userIDx = $response->body->result[0]->balance_tks_userid;
                            $vid = $response->body->result[0]->id;


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
                  					}


                  					curl_close($curl);


                          $messages = [
                            'type' => 'text',
                            'text' => 'ปรับยอดเงินสำเร็จ'.$usernamex.'มียอดเงินคงเหลือ : '.$sum
                          ];

                        } else {

                        }
      }
    }
      else if(strtoupper($text) == "REGISTER"){

        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Balance%20where%20balance_tks_userid='".$userID."'%20;";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $exid = $response->body->result[0]->balance_tks_userid;
        if(strcmp($exid,$userID) == 0){
          $messages = [
            'type' => 'text',
            'text' => 'คุณเป็นสมาชิกอยู่แล้ว'
          ];
        } else {
                      $dname= '';
                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.line.me/v2/bot/profile/".$userID,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET",
                        CURLOPT_HTTPHEADER => array(
                          "authorization: Bearer oOuhFrVkrCn3ngWNcdA96wED/ZtTR3Y8xEozvIP0zdAfamJCNsuZZHDAByWu70/7U6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVVUpnDm09h8C0VmOEcKNsi9RHTFNbBv5V5EA3FaugRewdB04t89/1O/w1cDnyilFU=",
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

                                  $curl = curl_init();

                                  curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n41fd14e15a617f672c0fd\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"balanceno\": \"\",\n            \"balance_tks_userid\": \"$userID\",\n            \"balance_tks_balance\": \"95900\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-23 09:53:40\",\n            \"modifiedtime\": \"2018-01-23 15:15:10\",\n            \"cf_956\": \"\",\n
                                      \"cf_958\": \"$dname\",\n            \"cf_960\": \"\",\n            \"cf_964\": \"\",\n            \"cf_966\": \"\",\n            \"cf_968\": \"\",\n            \"cf_970\": \"\",\n            \"id\": \"47x540\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalance\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                    CURLOPT_HTTPHEADER => array(
                                      "cache-control: no-cache",
                                      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                      "postman-token: dbaad94c-740c-257e-10b7-15c262154ba1"
                                    ),
                                  ));

                                  $response = curl_exec($curl);
                                  $err = curl_error($curl);

                                  curl_close($curl);

                                  if ($err) {
                                    echo "cURL Error #:" . $err;
                                  } else {
                                    echo $response;

                                    $messages = [
                                      'type' => 'text',
                                      'text' => 'สมัครสมาชิกสำเร็จ '.$dname
                                    ];

                                  }

                      }

        }


      }

      else if(strtoupper($context) == "OP"){

        $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x539';";
        $response = \Httpful\Request::get($uri)->send();

        $adminID = $response->body->result[0]->games_tks_password;


          if(strcmp($adminID,$userID) == 0){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n34888a365a670207dd6aa\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"gamesno\": \"\",\n            \"games_tks_username\": \"1\",\n            \"games_tks_password\": \"x\",\n            \"games_tks_gamename\": \"1\",\n            \"games_tks_gameid\": \"round\",\n            \"games_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-23 13:05:02\",\n            \"modifiedtime\": \"2018-01-23 13:05:13\",\n            \"cf_948\": \"\",\n            \"id\": \"43x543\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
            "postman-token: 504ff875-281d-57cd-eb79-acde564c4bdf"
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
        $messages = [
          'type' => 'text',
          'text' => 'กำลังเริ่มรอบแรกเตรียมตัว ...'
        ];
      } else {
      }


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
      else if($gameStatus==0) {

        // $messages = [
        //   'type' => 'text',
        //   'text' => 'ขณะนี้ ไม่ใช่เวลาแทง เปิดรอรอบใหม่อีกครั้ง'
        // ];
      }
      // else if($gameStatus==0) {
      //
      //   $messages = [
      //     'type' => 'text',
      //     'text' => 'ขณะนี้ ไม่ใช่เวลาแทง เปิดรอรอบใหม่อีกครั้ง'
      //   ];
      // }
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
		} 	else if ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {

      $pid = $event['message']['packageId'];
      $sid = $event['message']['stickerId'];
        $userID = $event['source']['userId'];
			$replyToken = $event['replyToken'];

      $uri = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x539';";
      $response = \Httpful\Request::get($uri)->send();
      // echo $response;
      $adminID = $response->body->result[0]->games_tks_password;
      $gameStatus = $response->body->result[0]->games_tks_gameid;

      $uri2x = "http://redfoxdev.com/vtiger/webservice.php?operation=query&sessionName=41fd14e15a617f672c0fd&query=select%20*%20from%20%20Games%20Where%20id%20=%20'43x543';";
      $response2x = \Httpful\Request::get($uri2x)->send();
      // echo $response;
      $cround = $response2x->body->result[0]->games_tks_username;


        if(strcmp($adminID,$userID) == 0){

                  if($gameStatus ==0){

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n34888a365a670207dd6aa\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"gamesno\": \"\",\n            \"games_tks_username\": \"are\",\n            \"games_tks_password\": \"$adminID\",\n            \"games_tks_gamename\": \"are\",\n            \"games_tks_gameid\": \"1\",\n            \"games_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-23 09:17:53\",\n            \"modifiedtime\": \"2018-01-23 09:35:24\",\n            \"cf_948\": \"\",\n            \"id\": \"43x539\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: 18e9d752-7db1-7306-210b-2216aa4e7a39"
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


                    $messages = [
                      'type' => 'text',
                      'text' => 'เริ่มรอบที่ # '.$cround
                    ];
                  }else{

                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n34888a365a670207dd6aa\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"gamesno\": \"\",\n            \"games_tks_username\": \"are\",\n            \"games_tks_password\": \"$adminID\",\n            \"games_tks_gamename\": \"are\",\n            \"games_tks_gameid\": \"0\",\n            \"games_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-23 09:17:53\",\n            \"modifiedtime\": \"2018-01-23 09:35:24\",\n            \"cf_948\": \"\",\n            \"id\": \"43x539\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: 18e9d752-7db1-7306-210b-2216aa4e7a39"
                      ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      $cround2 = $cround+1;
                      $curl = curl_init();

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n34888a365a670207dd6aa\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"gamesno\": \"\",\n            \"games_tks_username\": \"$cround2\",\n            \"games_tks_password\": \"x\",\n            \"games_tks_gamename\": \"1\",\n            \"games_tks_gameid\": \"\",\n            \"games_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-01-23 13:05:02\",\n            \"modifiedtime\": \"2018-01-23 13:05:13\",\n            \"cf_948\": \"\",\n            \"id\": \"43x543\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                              "cache-control: no-cache",
                              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                              "postman-token: 504ff875-281d-57cd-eb79-acde564c4bdf"
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
                    }

                    $messages = [
                      'type' => 'text',
                      'text' => 'ปิดรอบที่ # '.$cround
                    ];

                  }


      }else {

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
