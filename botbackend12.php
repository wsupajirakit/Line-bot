<?php
date_default_timezone_set('Asia/Bangkok');
  include('./httpful.phar');
$access_token =
'ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=';

$sidname='636dbd215a9cebe09e04e';
$vturl='http://redfoxdev.com/newbackend/';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
    $controluri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Control%20Where%20id%20='38x3';";
    $responsecontrol = \Httpful\Request::get($controluri)->send();

    $onop = $responsecontrol->body->result[0]->control_tks_onop;
    $onresult = $responsecontrol->body->result[0]->control_tks_onresult;
    $onok = $responsecontrol->body->result[0]->control_tks_onok;
    $onend = $responsecontrol->body->result[0]->control_tks_onend;


    $adminuri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Admin%20Where%20id%20='36x2';";
    $responseadmin = \Httpful\Request::get($adminuri)->send();

    $adminID = $responseadmin->body->result[0]->admin_tks_adminid;


    $gameuri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Game%20Where%20id%20='39x4';";
    $responsegame = \Httpful\Request::get($gameuri)->send();

    $gamepart = $responsegame->body->result[0]->game_tks_part;
    $gameround = $responsegame->body->result[0]->game_tks_round;
    $gameStatus = $responsegame->body->result[0]->game_tks_gamestatus;
    $round = $responsegame->body->result[0]->game_tks_round;
    $adminincome= $responsegame->body->result[0]->game_tks_allincome;
    $adminexpend = $responsegame->body->result[0]->game_tks_allexpend;

		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
      $text = str_replace(' ', '', $text);
      $text = preg_replace('~[\r\n]+~', '', $text);
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
      $fivetext = substr($text, 0, 5);
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


      if(strtoupper($ftext) == "T"){

        $urim = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
        $responsem = \Httpful\Request::get($urim)->send();

        $mbalance = $responsem->body->result[0]->tmember_tks_balance;
        $choice = $responsem->body->result[0]->tmember_tks_playerbet;
        $choicebet = $responsem->body->result[0]->tmember_tks_bet;
        $usernamex = $responsem->body->result[0]->tmember_tks_userid;
        $newchoice = str_replace("|##|", "", $choice);
        $newchoice2 = str_replace("P", "", $newchoice);
        $newchoice3 = str_replace(" ", "", $newchoice2);
        $lenchoice = strlen($newchoice);
        $nowbet = '';

        $countcheck = 0;
        if(substr_count($text,"-")){
          $countcheck=1;
        }else{
          $countcheck=2;
        }

        $player= strtoupper(strstr($text, '-', true));
        $money  = substr($text, (strpos($text, '-') ?: -1) + 1);
        $moneylen = strlen($money);
        $money = substr($money,0,3);


        $money = preg_replace('/[^0-9]/', '', $money);

        $ix= '';
        $tx= '';


        if($moneylen>3){
          $ix=1;
        }

        if(is_numeric($nn1)){

        }else {
          $ix=1;
        }

        if(substr_count($text, ' ')>0){
          $ix=1;
        }
        if(substr_count($text, '-')>1){
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

          // if(strcmp($nn1,$nn2) == 0){
          //   $tx=1;
          //
          // }
          // if(strcmp($nn1,$nn3) == 0){
          //   $tx=1;
          // }
          // if(strcmp($nn1,$nn4) == 0){
          //   $tx=1;
          // }
          // if(strcmp($nn2,$nn3) == 0){
          //   $tx=1;
          // }
          // if(strcmp($nn2,$nn4) == 0){
          //   $tx=1;
          // }
          //
          // if(strcmp($nn3,$nn4) == 0){
          //   $tx=1;
          // }

          // if($moneylen >3){
          //   $tx=1;
          // }
if($countcheck==1){
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
                              $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
                              $response = \Httpful\Request::get($uri)->send();
                              // echo $response;
                              $username = $response->body->result[0]->tmember_tks_username;
                              $vid = $response->body->result[0]->id;
                              $balance = $response->body->result[0]->tmember_tks_balance;
                              $played = $response->body->result[0]->tmember_tks_played;

                              if($lenchoice >=2){

                              }else{
                                  $played=$played+1;
                              }

                              $curl = curl_init();

                                curl_setopt_array($curl, array(
                                  CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                  CURLOPT_RETURNTRANSFER => true,
                                  CURLOPT_ENCODING => "",
                                  CURLOPT_MAXREDIRS => 10,
                                  CURLOPT_TIMEOUT => 30,
                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                  CURLOPT_CUSTOMREQUEST => "POST",
                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"tmemberno\": \"\",\n            \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$balance\",\n            \"tmember_tks_bet\": \"$money\",\n
                                     \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$played\",\n
                                      \"tmember_tks_playerbet\": \"$n1 |##| $n2 |##| $n3 |##| $n4\",\n
                                      \"tmember_tks_expend\": \"0\",\n            \"tmember_tks_income\": \"0\",\n            \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-05 04:25:30\",\n            \"modifiedtime\": \"2018-03-05 04:25:30\",\n            \"id\": \"$vid\"\n}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nTmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                  CURLOPT_HTTPHEADER => array(
                                    "cache-control: no-cache",
                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                    "postman-token: 69324505-5059-b6a9-e1d7-ffe572b57cc7"
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
                                      "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
                                    'text' => '  '.$username.' เปลี่ยนแปลงการแทงจาก T'.$newchoice3.' ขาละ'.$choicebet.'->เป็น '.$player.' ขาละ'.$money
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
                                      "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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

                        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
                        $response = \Httpful\Request::get($uri)->send();
                        // echo $response;
                        $xbalance = $response->body->result[0]->tmember_tks_balance;

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
                            "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
                    'text' => 'รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด 20 สูงสุด 200  ตัวอย่าง : T1234-50 หรือ T1-200'
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
                  'text' => 'รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด 20 สูงสุด 200  ตัวอย่าง : T1234-50 หรือ T1-200'
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
                  "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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

          }else if($countcheck == 2){


          $messages = [
            'type' => 'text',
            // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
            'text' => 'รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด 20 สูงสุด 200  ตัวอย่าง : T1234-50 หรือ T1-200'
          ];

          }

          ////
          ////
      }

      else if($ftext == "1" && strlen($text)==1){
        $messages = [
          'type' => 'text',
          // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
          'text' => 'สวัสดีค่ะ กลุ่มนี้เป็นห้องป๊อกเด้งนะคะ
หากท่านใดสนใจ
สามารถสอบถามรายละเอียดหรือกติกาได้ค่ะ
♠️♥️มาเล่นบ้านJackpot1♦️♣️
 เรามีโบนัสแจกให้ด้วยนะคะ😊'
        ];
      }


      else if(strtoupper($ftext) == "S" && strcmp($adminID,$userID) == 0){

        $zx=0;

        if(substr_count($text, ',')>3){
          $zx=1;
        }

        if(substr_count($text, '+')>4){
          $zx=1;
        }

        if(substr_count($text, '-')>4){
          $zx=1;
        }

        if(substr_count($text, '*')>=1){
          $zx=1;
        }

        if(substr_count($text, '=')>=1){
          $zx=1;
        }

        if(substr_count($text, '/')>=1){
          $zx=1;
        }
        $zxtext = str_replace(",","",$text);

        if(strlen($zxtext)!=13){
          $zx=1;
        }

        $extext = explode(",", $text);

        $yx1 = substr($extext[0], 2);
        $yx2 = substr($extext[1], 1);
        $yx3 = substr($extext[2], 1);
        $yx3 = substr($extext[3], 1);

        $yo1 = substr($yx1,1);
        $yo2 = substr($yx2,1);
        $yo3 = substr($yx3,1);
        $yo4 = substr($yx4,1);

        if($yo1>2 || $yo2>2 || $yo3>2 || $yo4>2){
          $zx=1;
        }


        if($onresult!=1){

        if($zx!=1) {


        //find admin

          if(strcmp($adminID,$userID) == 0 && $gamestatus == 0){



        $x1 = substr($extext[0], 2);

        if ($x1=="-1"){
           $msg1 = 'ขา 1 เสียให้เจ้ามือ 1 เท่า';

           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();



// **************

              $data = json_decode($response,true);
              $total = 0;
              foreach ($data["result"] as $value) {
                      $total = $total+1;
              }

              foreach($data["result"] as $item) { //foreach element in $arr

                   $username = $item['tmember_tks_username'];
                   $userID = $item['tmember_tks_userid'];
                   $vid = $item['id'];
                   $balance = $item['tmember_tks_balance'];
                   $bet = $item['tmember_tks_bet'];
                   $expend = $item['tmember_tks_expend']+$bet;
                   $income = $item['tmember_tks_income'];
                   $playerbet = $item['tmember_tks_playerbet'];
                   $player = $item['tmember_tks_played'];
                   $newbalance = $balance;

                $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                    \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                    \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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


                }

//

        } else if  ($x1=="+1"){
           $msg1 = 'ขา 1 ได้ 1 เท่า';
                      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+$bet;
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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




             }

        }else if  ($x1=="+0"){
           $msg1 = 'เจ๊า';

                 $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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




             }

        }else if  ($x1=="-2"){
           $msg1 = 'ขา 1 ได้ 2 เท่า';

                      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $betx = ($bet+$bet);
                $expend = $item['tmember_tks_expend']+$betx;
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $player = $item['tmember_tks_played'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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




             }
        }else if  ($x1=="+2"){
           $msg1 = 'ขา 1 ได้ 2 เท่า';

                      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P1%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+($bet*2);
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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



             }
        }
        $x2 = substr($extext[1], 1);
        if ($x2=="-1"){
                     $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P2%'%20;";
          $response = \Httpful\Request::get($uri)->send();

          $data = json_decode($response,true);
          $total = 0;
          foreach ($data["result"] as $value) {
                  $total = $total+1;
          }

          foreach($data["result"] as $item) { //foreach element in $arr

               $username = $item['tmember_tks_username'];
               $userID = $item['tmember_tks_userid'];
               $vid = $item['id'];
               $balance = $item['tmember_tks_balance'];
               $bet = $item['tmember_tks_bet'];
               $player = $item['tmember_tks_played'];
               $expend = $item['tmember_tks_expend']+$bet;
               $income = $item['tmember_tks_income'];
               $playerbet = $item['tmember_tks_playerbet'];
               $newbalance = $balance;

            $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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




            }

        } else if  ($x2=="+1"){

           $msg2 = 'ขา 2 ได้ 1 เท่า';

           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+$bet;
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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


             }


        }else if  ($x2=="+0"){
           $msg2 = 'เจ๊า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;
             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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





             }

        }else if  ($x2=="-2"){
           $msg2 = 'ขา 2 เสียให้เจ้ามือ 2 เท่า';
          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend']+($bet*2);
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;
             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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



             }

        }else if  ($x2=="+2"){
           $msg2 = 'ขา 2 ได้ 2 เท่า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P2%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+($bet*2);
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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




             }
        }

        $x3 = substr($extext[2], 1);
        if ($x3=="-1"){
           $msg3 = 'ขา3 เสียให้เจ้ามือ 1 เท่า';

           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend']+$bet;
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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



             }

        } else if  ($x3=="+1"){
           $msg3 = 'ขา 3 ได้ 1 เท่า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+$bet;
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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



             }
        }else if  ($x3=="+0"){
           $msg3 = 'เจ๊า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

             }
        }else if  ($x3=="-2"){
           $msg3 = 'ขา 3 เสียให้เจ้ามือ 2 เท่า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend']+($bet*2);
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;

             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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


             }
        }else if  ($x3=="+2"){
           $msg3 = 'ขา 3 ได้ 2 เท่า';
         $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P3%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+($bet*2);
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

             }
        }

        $x4 = substr($extext[3], 1);
        if ($x4=="-1"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 1 เท่า';

                       $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P4%'%20;";
                      $response = \Httpful\Request::get($uri)->send();

                      $data = json_decode($response,true);
                      $total = 0;
                      foreach ($data["result"] as $value) {
                              $total = $total+1;
                      }

                      foreach($data["result"] as $item) { //foreach element in $arr

                           $username = $item['tmember_tks_username'];
                           $userID = $item['tmember_tks_userid'];
                           $vid = $item['id'];
                           $balance = $item['tmember_tks_balance'];
                           $bet = $item['tmember_tks_bet'];
                           $player = $item['tmember_tks_played'];
                           $expend = $item['tmember_tks_expend']+$bet;
                           $income = $item['tmember_tks_income'];
                           $playerbet = $item['tmember_tks_playerbet'];
                           $newbalance = $balance;

                        $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                            \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                            \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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



                        }
        } else if  ($x4=="+1"){
           $msg4 = 'ขา 4 ได้ 1 เท่า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+$bet;
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;

             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

             }
        }else if  ($x4=="+0"){
           $msg4 = 'เจ๊า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n\n".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;


             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

             }
        }else if  ($x4=="-2"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 2 เท่า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend']+($bet*2);
                $income = $item['tmember_tks_income'];
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;



             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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


             }
        }else if  ($x4=="+2"){
           $msg4 = 'ขา 4 ได้ 2 เท่า';
             $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P4%'%20;";
           $response = \Httpful\Request::get($uri)->send();

           $data = json_decode($response,true);
           $total = 0;
           foreach ($data["result"] as $value) {
                   $total = $total+1;
           }

           foreach($data["result"] as $item) { //foreach element in $arr

                $username = $item['tmember_tks_username'];
                $userID = $item['tmember_tks_userid'];
                $vid = $item['id'];
                $balance = $item['tmember_tks_balance'];
                $bet = $item['tmember_tks_bet'];
                $player = $item['tmember_tks_played'];
                $expend = $item['tmember_tks_expend'];
                $income = $item['tmember_tks_income']+($bet*2);
                $playerbet = $item['tmember_tks_playerbet'];
                $newbalance = $balance;

             $listname = $listname."\n ".$username."  -".$bet." = ".$newbalance.'  Loop +:'.$i.'total'.$total;

             $curl = curl_init();

             curl_setopt_array($curl, array(
               CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_ENCODING => "",
               CURLOPT_MAXREDIRS => 10,
               CURLOPT_TIMEOUT => 30,
               CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
               CURLOPT_CUSTOMREQUEST => "POST",
               CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                 \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"$bet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                 \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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
             }
        }

        /// สิ้นสุด x4

        $curl = curl_init();

          curl_setopt_array($curl, array(
          CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"$onop\",\n            \"control_tks_onresult\": \"1\",\n            \"control_tks_onok\": \"$onok\",\n            \"control_tks_onend\": \"$onend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
            "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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
          'text' =>  'ยืนยันการสรุปผลหรือไม่ ?'
        ];

      }else {
        $messages = [
          'type' => 'text',
          'text' =>  'ไม่สามารถสรุปยอดได้ สถานะรอบยังไม่ถูกปิด หรือ โปรดเช็คสถานะแอดมิน'
        ];
      }

    }else{
      $messages = [
        'type' => 'text',
        'text' =>  '❌ รูปแบบการสรุปผลไม่ถูกต้อง ❌ ตัวอย่าง S1-1,2-1,3-1,4-1 (+2 +1 +0 -1 -2)'
      ];
      }
    }else{
      $messages = [
        'type' => 'text',
        'text' =>  '❌  คุณสรุปผลไปแล้ว ❌  หากต้องการแก้ไข พิมพ์ Clear'
      ];

    }

    }

    else if(strtoupper($sectext) == "RE"){

        if(strcmp($adminID,$userID) == 0){


                  if(strlen($text)==2){

                  $retotal = 'สมาชิกที่แทงรอบนี้';

                  $uriz = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20Where%20tmember_tks_status='1';";
                  $responsez = \Httpful\Request::get($uriz)->send();

                  $dataz = json_decode($responsez,true);

                  foreach ($dataz["result"] as $value) {

                          $muserID = $value['tmember_tks_userid'];

                          $dname= '';
                          $curl = curl_init();

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://api.line.me/v2/bot/group/".$groupID."/member/".$muserID,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => array(
                              "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
                          $dname =  $data['displayName'];

                          $retotal = $retotal."\n ▶️  ".$dname;



                          }


                  }

                  $messages = [
                    'type' => 'text',
                    'text' =>  $retotal
                  ];

                  }else{
                    $messages = [
                      'type' => 'text',
                      'text' =>  '❌ คำสั่ง Recheck ไม่ถูกต้อง ❌ พิมพ์ re หรือ Re อีกครั้ง '
                    ];

                  }

            }else{

            }

    }

      //แก้ไขผล
      else if(strtoupper($fivetext) == "CLEAR"){

          if(strcmp($adminID,$userID) == 0){

        $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20Where%20tmember_tks_status='1';";
        $responsex = \Httpful\Request::get($urix)->send();

        $datax = json_decode($responsex,true);

        foreach($datax["result"] as $itemx) {
            $username = '001';
            $userID = $itemx['tmember_tks_userid'];
            $vid = $itemx['id'];
            $balance = $itemx['tmember_tks_balance'];
            $moneybet = $itemx['tmember_tks_bet'];
            $played = $itemx['tmember_tks_played'];
            $expend = 0;
            $income = 0;
            $playerbet = $itemx['tmember_tks_playerbet'];


            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$balance\",\n            \"tmember_tks_bet\": \"$moneybet\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$played\",\n            \"tmember_tks_playerbet\": \"$playerbet\",\n            \"tmember_tks_expend\": \"$expend\",\n            \"tmember_tks_income\": \"$income\",\n
                \"tmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

              $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"$onop\",\n            \"control_tks_onresult\": \"0\",\n            \"control_tks_onok\": \"$onok\",\n            \"control_tks_onend\": \"$onend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                CURLOPT_HTTPHEADER => array(
                  "cache-control: no-cache",
                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                  "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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
                // onresult = 0

              $messages = [
                'type' => 'text',
                'text' =>  'เคลียร์ผลสรุปแล้ว สรุปผลใหม่อีกครั้ง'
              ];
            }


          }

          }

      }
    //สิ้นสุดแก้ไขผล



			else if($ftext == "@"){


        $listname= 'สรุปผล : รอบที่ # '.$round-1;
        $resultlist= 'สรุปผล : รอบที่ # '.$round-1;


        $myid = substr($text,1);
        $teststr = substr($myid,0,2);

        if(strcmp($teststr,"id") == 0){

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
              "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
          $dname =  $data['displayName'];
          }


          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
          $response = \Httpful\Request::get($uri)->send();
          // echo $response;
          $username = $response->body->result[0]->tmember_tks_username;
          $vid = $response->body->result[0]->id;
          $balance = $response->body->result[0]->tmember_tks_balance;

          $userlen = strlen($vid);
          if($vid > 2) {


                      $messages = [
                        'type' => 'text',
                        'text' =>  $dname.' ID คือ '.$vid.' ยอดเงินคงเหลือ '.$balance
                      ];
          } else {

                      $messages = [
                        'type' => 'text',
                        'text' =>  'คุณไม่ได้เป็นสมาชิกโปรดสมัครด้วย คำสั่ง " Play "'
                      ];
          }



        } else if (strcmp(strtoupper($teststr),"OK") == 0){



            if(strcmp($adminID,$userID) == 0 && $onresult == 1){

              if($onok ==0){

              $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20Where%20tmember_tks_status='1';";
              $responsex = \Httpful\Request::get($urix)->send();

              $datax = json_decode($responsex,true);

              foreach($datax["result"] as $itemx) {
                  $username = '';
                  $userID = $itemx['tmember_tks_userid'];

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
                      "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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

                  $vid = $itemx['id'];
                  $balance = $itemx['tmember_tks_balance'];
                  $bet = $itemx['tmember_tks_bet'];
                  $played = $itemx['tmember_tks_played'];
                  $expend = $itemx['tmember_tks_expend'];
                  $income = $itemx['tmember_tks_income'];
                  $sum = $income - $expend;
                  $playerbet = $itemx['tmember_tks_playerbet'];


                  $adminincome = $adminincome+$expend;
                  //รายรับจ้าวมือ = รายรับของผู้เล่น
                  $adminexpend = $adminexpend+$income;






                  $curl = curl_init();

      curl_setopt_array($curl, array(
        CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"gameno\": \"\",\n            \"game_tks_part\": \"$part\",\n            \"game_tks_round\": \"$round\",\n            \"game_tks_gamestatus\": \"$gameStatus\",\n            \"game_tks_allincome\": \"$adminincome\",\n
          \"game_tks_allexpend\": \"$adminexpend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:37:10\",\n            \"modifiedtime\": \"2018-03-05 07:01:03\",\n            \"id\": \"39x4\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nGame\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
          "postman-token: eb297779-c87e-79f7-3044-36610eb5ced9"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {

                    if($income == 0 && $expend >=1){
                        $sum = substr($sum,1);
                      $newbalance = $balance - $sum;
                       $resultlist = $resultlist."\n".$username." -".$sum."=".$newbalance."";



                                               $curl = curl_init();

                                               curl_setopt_array($curl, array(
                                                 CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                                 CURLOPT_RETURNTRANSFER => true,
                                                 CURLOPT_ENCODING => "",
                                                 CURLOPT_MAXREDIRS => 10,
                                                 CURLOPT_TIMEOUT => 30,
                                                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                 CURLOPT_CUSTOMREQUEST => "POST",
                                                 CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                                                   \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"\",\n            \"tmember_tks_username\": \"001\",\n            \"tmember_tks_played\": \"$played\",\n            \"tmember_tks_playerbet\": \"\",\n            \"tmember_tks_expend\": \"\",\n            \"tmember_tks_income\": \"\",\n
                                                   \"tmember_tks_status\": \"\",\n                  \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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


                    }
                    else if($sum < 0){
                        $sum = substr($sum,1);
                      $newbalance = $balance - $sum;
                       $resultlist = $resultlist."\n".$username." -".$sum."=".$newbalance."";

                       $curl = curl_init();

                       curl_setopt_array($curl, array(
                         CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                         CURLOPT_RETURNTRANSFER => true,
                         CURLOPT_ENCODING => "",
                         CURLOPT_MAXREDIRS => 10,
                         CURLOPT_TIMEOUT => 30,
                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                         CURLOPT_CUSTOMREQUEST => "POST",
                         CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                           \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"\",\n            \"tmember_tks_username\": \"001\",\n            \"tmember_tks_played\": \"$played\",\n            \"tmember_tks_playerbet\": \"\",\n            \"tmember_tks_expend\": \"\",\n            \"tmember_tks_income\": \"\",\n
                           \"tmember_tks_status\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

                    }else if ($sum >= 0){
                      $newbalance = $balance + $sum;
                     $resultlist = $resultlist."\n".$username." +".$sum."=".$newbalance."";

                     $curl = curl_init();

                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                         \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$newbalance\",\n            \"tmember_tks_bet\": \"\",\n            \"tmember_tks_username\": \"001\",\n            \"tmember_tks_played\": \"$played\",\n            \"tmember_tks_playerbet\": \"\",\n            \"tmember_tks_expend\": \"\",\n            \"tmember_tks_income\": \"\",\n
                         \"tmember_tks_status\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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
                    }

                  }

                }

                $curl = curl_init();

                  curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"1\",\n            \"control_tks_onresult\": \"0\",\n            \"control_tks_onok\": \"1\",\n            \"control_tks_onend\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                  CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                    "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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

                  /// onresult =1

                $messages = [
                  'type' => 'text',
                  'text' =>  $resultlist
                ];

              }else {
                  $messages = [
                    'type' => 'text',
                    'text' =>  'ไม่สามารถยืนยันผลซ้ำได้'
                  ];
                }

              }

              else {
                $messages = [
                  'type' => 'text',
                  'text' =>  'ยังไม่ได้สรุปผล หรือ โปรดเช็คสถานะแอดมิน'
                ];
              }

        } else {

        }


      }
      else if(strtoupper($text) == "PLAY"){


        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bmember%20where%20tmember_tks_userid='".$userID."';";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $exid = $response->body->result[0]->tmember_tks_userid;
        if(strcmp($exid,$userID) == 0){
          $messages = [
            'type' => 'text',
            'text' => 'คุณเป็นสมาชิกอยู่แล้ว'
          ];
        } else {
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
                          "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
                        CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"tmemberno\": \"\",\n            \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"1000\",\n            \"tmember_tks_bet\": \"\",\n            \"tmember_tks_username\": \"000\",\n            \"tmember_tks_played\": \"$player\",\n            \"tmember_tks_playerbet\": \"\",\n            \"tmember_tks_expend\": \"0\",\n            \"tmember_tks_income\": \"0\",\n            \"tmember_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-05 04:25:30\",\n            \"modifiedtime\": \"2018-03-05 04:25:30\",\n            \"id\": \"44x5\"\n}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nTmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                          "postman-token: 747fb25e-0c1b-ba24-699d-a72fe03a9067"
                        ),
                      ));

                      $response = curl_exec($curl);
                      $err = curl_error($curl);

                      curl_close($curl);

                      if ($err) {
                        echo "cURL Error #:" . $err;
                      } else {
                        $messages = [
                          'type' => 'text',
                          'text' => 'สมัครสมาชิกสำเร็จ '.$dname
                        ];

                      }




                      }

        }


      }

      else if(strtoupper($context) == "OX"){
        $messages = [
          'type' => 'text',
          'text' =>  'groupID : '.$groupID.'  userID :'.$userID
        ];
      }

      else if(strtoupper($context) == "ED"){
        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='37x3';";
        $response = \Httpful\Request::get($uri)->send();

        $adminID = $response->body->result[0]->bgame_tks_adminid;


          if(strcmp($adminID,$userID) == 0){

            $urit = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='37x3';";
            $responset = \Httpful\Request::get($urit)->send();

          //รายรับจ้าวมือ
            $allincome = $responset->body->result[0]->bgame_tks_allincome;
          //รายจ่ายจ้าวมือ
            $allexpend = $responset->body->result[0]->bgame_tks_allexpend;


              $messages = [
                'type' => 'text',
                'text' =>  "สรุปผล ณ เวลา ".date("d-m-Y H:i:s")."\nรายรับ : ".$allincome."\nรายจ่าย : ".$allexpend."\nยอดถอน : 0 \nยอดฝาก : 0"
              ];
            } else {

            }
      }
      else if(strtoupper($context) == "OP" && strlen($text)==2){



          if(strcmp($adminID,$userID) == 0){

            $part = $part+1;

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"gameno\": \"\",\n            \"game_tks_part\": \"$part\",\n            \"game_tks_round\": \"1\",\n            \"game_tks_gamestatus\": \"0\",\n            \"game_tks_allincome\": \"0\",\n            \"game_tks_allexpend\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:37:10\",\n            \"modifiedtime\": \"2018-03-05 07:01:03\",\n            \"id\": \"39x4\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nGame\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 98479700-cbf1-aad4-468b-ab34f357ea72"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20Where%20tmember_tks_status='1';";
              $responsex = \Httpful\Request::get($urix)->send();

              $datax = json_decode($responsex,true);

              foreach($datax["result"] as $itemx) {
                  $username = '001';
                  $userID = $itemx['tmember_tks_userid'];
                  $vid = $itemx['id'];
                  $balance = $itemx['tmember_tks_balance'];
                  $moneybet = $itemx['tmember_tks_bet'];
                  $played = $itemx['tmember_tks_played'];
                  $expend = 0;
                  $income = 0;
                  $playerbet = $itemx['tmember_tks_playerbet'];


                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"tmemberno\": \"\",\n
                      \"tmember_tks_userid\": \"$userID\",\n            \"tmember_tks_balance\": \"$balance\",\n            \"tmember_tks_bet\": \"0\",\n            \"tmember_tks_username\": \"$username\",\n            \"tmember_tks_played\": \"$played\",\n            \"tmember_tks_playerbet\": \"\",\n            \"tmember_tks_expend\": \"0\",\n            \"tmember_tks_income\": \"0\",\n
                      \"tmember_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 05:25:21\",\n
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

                    $curl = curl_init();

                      curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"1\",\n            \"control_tks_onresult\": \"0\",\n            \"control_tks_onok\": \"0\",\n            \"control_tks_onend\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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


                }
            }


        $messages = [
          'type' => 'text',
          'text' => 'เกมกำลังเริ่มรอบแรกเตรียมตัว ...'
        ];


      } else {
      }


      }


      else if(strtoupper($ttrdtext) == "END" && strlen($text)==3){


          if(strcmp($adminID,$userID) == 0){

            $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"0\",\n            \"control_tks_onresult\": \"0\",\n            \"control_tks_onok\": \"0\",\n            \"control_tks_onend\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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
          'text' => 'จบการเล่นในเกมนี้'
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
		}
    else if ($event['type'] == 'message' && $event['message']['type'] == 'image') {

      $userID = $event['source']['userId'];
      $groupID = $event['source']['groupId'];
      $replyToken = $event['replyToken'];


      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='37x3';";
      $response = \Httpful\Request::get($uri)->send();

      $adminID = $response->body->result[0]->bgame_tks_adminid;

        if(strcmp($adminID,$userID) == 0){
        }else{

          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bmember%20where%20tmember_tks_userid='".$userID."';";
          $response = \Httpful\Request::get($uri)->send();
          // echo $response;
          $username = $response->body->result[0]->tmember_tks_username;
          $vid = $response->body->result[0]->id;
          $balance = $response->body->result[0]->tmember_tks_balance;

          $userlen = strlen($vid);
          if($vid > 2) {

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
                "authorization: Bearer ixV71S2vDL1935GrQbSIq7bajIgzolsbFt2zhmXmnetTjETG3XyM6onopT9zGgvDoe3OLNko0Y1SVzKubnxi22+JNRzUQ8BeH34EHlnon8UTvw7BgR2fSn0B3A7F3qvVhfCdsW0A2kQ3HRbH2TtR7gdB04t89/1O/w1cDnyilFU=",
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
                        'text' =>  $username.' ID คือ '.$vid.' ยอดเงินคงเหลือ '.$balance
                      ];
          } else {
          }



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
    else if ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {

      $pid = $event['message']['packageId'];
      $sid = $event['message']['stickerId'];
        $userID = $event['source']['userId'];
			$replyToken = $event['replyToken'];


      $cround = $round;
      $cround2 = $cround+1;


        if(strcmp($adminID,$userID) == 0){

                  if($gameStatus ==0 && $onok == 1){


                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"gameno\": \"\",\n            \"game_tks_part\": \"$part\",\n            \"game_tks_round\": \"$cround\",\n            \"game_tks_gamestatus\": \"1\",\n            \"game_tks_allincome\": \"$adminincome\",\n
                        \"game_tks_allexpend\": \"$adminexpend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:37:10\",\n            \"modifiedtime\": \"2018-03-05 07:01:03\",\n            \"id\": \"39x4\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nGame\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: eb297779-c87e-79f7-3044-36610eb5ced9"
                      ),
                    ));

                    $response = curl_exec($curl);
                    $err = curl_error($curl);

                    curl_close($curl);

                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      $curl = curl_init();

                        curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"controlno\": \"\",\n            \"control_tks_onop\": \"0\",\n            \"control_tks_onresult\": \"0\",\n            \"control_tks_onok\": \"0\",\n            \"control_tks_onend\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:36:58\",\n            \"modifiedtime\": \"2018-03-03 07:36:58\",\n            \"id\": \"38x3\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nControl\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                          "postman-token: f2b7ea7e-5c06-78b0-9e48-d9489ecba383"
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
                      'text' => 'เริ่มรอบที่ # '.$cround
                    ];



                  }else if ($gameStatus ==1){




                                        $curl = curl_init();

                                        curl_setopt_array($curl, array(
                                          CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                          CURLOPT_RETURNTRANSFER => true,
                                          CURLOPT_ENCODING => "",
                                          CURLOPT_MAXREDIRS => 10,
                                          CURLOPT_TIMEOUT => 30,
                                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                          CURLOPT_CUSTOMREQUEST => "POST",
                                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"gameno\": \"\",\n            \"game_tks_part\": \"$part\",\n            \"game_tks_round\": \"$cround2\",\n            \"game_tks_gamestatus\": \"0\",\n            \"game_tks_allincome\": \"$adminincome\",\n
                                            \"game_tks_allexpend\": \"$adminexpend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-03 07:37:10\",\n            \"modifiedtime\": \"2018-03-05 07:01:03\",\n            \"id\": \"39x4\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nGame\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                          CURLOPT_HTTPHEADER => array(
                                            "cache-control: no-cache",
                                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                            "postman-token: eb297779-c87e-79f7-3044-36610eb5ced9"
                                          ),
                                        ));

                                        $response = curl_exec($curl);
                                        $err = curl_error($curl);

                                        curl_close($curl);

                                        if ($err) {
                                          echo "cURL Error #:" . $err;
                                        } else {
                      $messagesx = [
                        'type' => 'text',
                        // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                        'text' => 'สมัครพิมพ์ “play”
♠️♥️กติกา♦️♣️
พิมพ์ T ตามด้วยขาที่จะเล่น แล้ว ขีด (-) จำนวนเงิน  เช่น T12-200 คือ แทงขา 1 และขา 2 ขาละ 200 บาท
😃สมาชิกใหม่
เติมเงิน100 บาทขึ้นไปโบนัสเพิ่ม10% สูงสุด100บาท
ฝากขั้นต่ำ 40 บาท
🏧 ฝากเงิน 24 ชั่วโมง
      กสิกรไทย 0368655678
      พร้อมเพย์ 0958395246
🚩ถอนเงินแจ้งแอดมิน แปะ พพ. ไว้หลังปิด live โอนให้ทุกคน
  '
                      ];


                      $url = 'https://api.line.me/v2/bot/message/push';
                      $datax = [
                        'to' => 'C65fe1fdd1b8aa18d5cde13deb4f5997e',
                        'messages' => [$messagesx],
                      ];
                      $postx = json_encode($datax);
                      $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

                      $ch = curl_init($url);
                      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $postx);
                      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                      $result = curl_exec($ch);
                      curl_close($ch);
                    }


                    $messages = [
                      'type' => 'text',
                      'text' => 'ปิดรอบที่ # '.$cround
                    ];

                  }else{
                    $messages = [
                      'type' => 'text',
                      'text' => 'รอบยังไม่จบโดยสมบูรณ์โปรดเช็คสถานะการสรุปผล'
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
