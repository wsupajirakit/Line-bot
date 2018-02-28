<?php
date_default_timezone_set('Asia/Bangkok');
  include('./httpful.phar');
$access_token =
'QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=';

$sidname='709c1a7e5a83bd434de8f';
$vturl='http://redfoxdev.com/vtiger/';
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
      $fourtext = substr($text, 0, 4);
      $fivetext = substr($text, 0, 5);
			$ftext = substr($text, 0, 1);
      $sectext = strtoupper(substr($text, 0, 2));
      $alltext= strtoupper(strstr($text, '-', true));
      $newtext = substr($alltext, 1);
      $ostr = substr($text,1);

      // $lentext = strlen($newtext);
      //
      //   $n1 = 'P'.substr($newtext,0,1);
      //   $n2 = 'P'.substr($newtext,1,1);
      //   $n3 = 'P'.substr($newtext,2,1);
      //   $n4 = 'P'.substr($newtext,3,1);
      //   $txc='';
      //
      //
      //   $nn1 = substr($newtext,0,1);
      //   $nn2 = substr($newtext,1,1);
      //   $nn3 = substr($newtext,2,1);
      //   $nn4 = substr($newtext,3,1);


        //gamestatus
        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $gameStatus = $response->body->result[0]->bgame_tks_gamestatus;

      if(strtoupper($ftext) == "T"){


        $uris = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $responses = \Httpful\Request::get($uris)->send();

        $gameStatus = $responses->body->result[0]->bgame_tks_gamestatus;

        if($gameStatus==1){

        $nn1 = substr($newtext,0,1);
        $nn2 = substr($newtext,1,1);
        $nn3 = substr($newtext,2,1);
        $money  = substr($text, (strpos($text, '-') ?: -1) + 1);

        $nx = 0;


        if(is_numeric($newtext) || is_numeric($money)){
          $nx = 0;
        } else {
          $nx = 1;
        }

        if(substr_count($text, '-')>1){
          $nx=1;
        }

        if(substr_count($text, '*')>0){
          $nx=1;
        }

        if(substr_count($text, '/')>0){
          $nx=1;
        }

        if(substr_count($text, '+')>0){
          $nx=1;
        }
        if(substr_count($text, '=')>0){
          $nx=1;
        }


        if(strlen($newtext)==1){
          if($nn1 > 6){
              $nx = 1;
          }
          if($nn1 <= 0){
              $nx = 1;
          }
        }

        if(strlen($newtext)==2){
          if($nn1 > 6 || $nn2 > 6){
              $nx = 1;
          }

          if($nn1 <= 0 || $nn2 <= 0){
              $nx = 1;
          }

        }

        if(strlen($newtext)==3){
          if($nn1 > 6 || $nn2 > 6 || $nn3 > 6){
              $nx = 1;
          }

          if($nn1 <= 0 || $nn2 <= 0 || $nn3 <= 0){
              $nx = 1;
          }

        }




        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_userid='".$userID."';";
        $response = \Httpful\Request::get($uri)->send();
        $muserid = $response->body->result[0]->nmember_tks_userid;
        $mbalance = $response->body->result[0]->nmember_tks_balance;
        $mbet = $response->body->result[0]->nmember_tks_bet;
        $musername = $response->body->result[0]->nmember_tks_username;
        $mplayer = $response->body->result[0]->nmember_tks_player;
        $mexpend = $response->body->result[0]->nmember_tks_expend;
        $mincome = $response->body->result[0]->nmember_tks_income;
        $mid = $response->body->result[0]->id;
        $betx = $money *3;
        $nt = 1;


          if($mbalance<$betx){
              $nt = 2;
          }

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
                        "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
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

              // if($nx != 1 && $nt != 2 && strlen($newtext)==3 && $money > 0){
              if($nx != 1 && $nt != 2 && strlen($newtext)<=3 && $money >= 20 && $money <=200 ){


                $c1="";
                $c2="";
                $c3="";


                  if($nn1 == "1"){
                    $c1="น้ำเต้า 💧";
                  }else if($nn1 == "2"){
                    $c1="ปู 🦀";
                  }else if($nn1 == "3"){
                    $c1="ปลา 🐠";
                  }else if($nn1 == "4"){
                    $c1="กุ้ง 🦐";
                  }else if($nn1 == "5"){
                    $c1="เสือ 🐯";
                  }else if($nn1 == "6"){
                    $c1="ไก่ 🐔";
                  }

                  if($nn2 == "1"){
                    $c2="น้ำเต้า 💧";
                  }else if($nn2 == "2"){
                    $c2="ปู 🦀";
                  }else if($nn2 == "3"){
                    $c2="ปลา 🐠";
                  }else if($nn2 == "4"){
                    $c2="กุ้ง 🦐";
                  }else if($nn2 == "5"){
                    $c2="เสือ 🐯";
                  }else if($nn2 == "6"){
                    $c2="ไก่ 🐔";
                  }


                  if($nn3 == "1"){
                    $c3="น้ำเต้า 💧";
                  }else if($nn3 == "2"){
                    $c3="ปู 🦀";
                  }else if($nn3 == "3"){
                    $c3="ปลา 🐠";
                  }else if($nn3 == "4"){
                    $c3="กุ้ง 🦐";
                  }else if($nn3 == "5"){
                    $c3="เสือ 🐯";
                  }else if($nn3 == "6"){
                    $c3="ไก่ 🐔";
                  }

                  if(strlen($newtext)==1){
                      $nn2=0;
                      $nn3=0;
                  }

                    if(strlen($newtext)==2){
                      $nn3=0;
                    }

                    $alln = $nn1.$nn2.$nn3;

                    $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nbet%20Where%20nbet_tks_userid='".$userID."'%20AND%20nbet_tks_allchoice='".$alln."';";
                    $responseq = \Httpful\Request::get($uriq)->send();
                    $allchoice = $responseq->body->result[0]->nbet_tks_allchoice;
                    $nbet = $responseq->body->result[0]->nbet_tks_bet;
                    $nid = $responseq->body->result[0]->id;


                    if(strcmp($allchoice,$alln) == 0){

                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n3f98341d5a851e7a30336\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"nbetno\": \"\",\n
                          \"nbet_tks_userid\": \"$userID\",\n            \"nbet_tks_fchoice\": \"$nn1\",\n            \"nbet_tks_schoice\": \"$nn2\",\n            \"nbet_tks_tchoice\": \"$nn3\",\n
                          \"nbet_tks_bet\": \"$money\",\n            \"nbet_tks_income\": \"0\",\n            \"nbet_tks_expend\": \"0\",\n            \"nbet_tks_allchoice\": \"$alln\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-23 04:18:20\",\n            \"modifiedtime\": \"2018-02-23 04:18:20\",\n
                          \"id\": \"$nid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNbet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                          "postman-token: 81acaa99-e0eb-d290-6b5d-e75245e3e73d"
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
                          'text' => $dname." ✏️ เปลี่ยนแปลงการแทงพนัน \nขา ".$c1.$c2.$c3."\n จำนวนเดิม ".$nbet." \n เป็น ".$money
                        ];
                      }
                      // เปลี่ยนแปลงจำนวนเงินการแทง จากค่าเดิม
                    }else{

                      $listbet = '';

                      $uria = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nbet%20Where%20nbet_tks_userid='".$userID."';";
                      $responseq = \Httpful\Request::get($uria)->send();
                      $data = json_decode($responseq,true);

                      foreach($data["result"] as $item) {
                        $xfchoice = $item['nbet_tks_fchoice'];
                        $xschoice = $item['nbet_tks_schoice'];
                        $xtchoice = $item['nbet_tks_tchoice'];
                        $xnbet = $item['nbet_tks_bet'];

                        $tt1="";
                        $tt2="";
                        $tt3="";


                          if($xfchoice == "1"){
                            $tt1="น้ำเต้า";
                          }else if($xfchoice == "2"){
                            $tt1="ปู";
                          }else if($xfchoice == "3"){
                            $tt1="ปลา";
                          }else if($xfchoice == "4"){
                            $tt1="กุ้ง";
                          }else if($xfchoice == "5"){
                            $tt1="เสือ";
                          }else if($xfchoice == "6"){
                            $tt1="ไก่";
                          }

                          if($xschoice == "1"){
                            $tt2="น้ำเต้า";
                          }else if($xschoice == "2"){
                            $tt2="ปู";
                          }else if($xschoice == "3"){
                            $tt2="ปลา";
                          }else if($xschoice == "4"){
                            $tt2="กุ้ง";
                          }else if($xschoice == "5"){
                            $tt2="เสือ";
                          }else if($xschoice == "6"){
                            $tt2="ไก่";
                          }


                          if($xtchoice == "1"){
                            $tt3="น้ำเต้า";
                          }else if($xtchoice == "2"){
                            $tt3="ปู";
                          }else if($xtchoice == "3"){
                            $tt3="ปลา";
                          }else if($xtchoice == "4"){
                            $tt3="กุ้ง";
                          }else if($xtchoice == "5"){
                            $tt3="เสือ";
                          }else if($xtchoice == "6"){
                            $tt3="ไก่";
                          }

                          $listbet = $listbet."\n ▶️ แทง ".$tt1." ".$tt2." ".$tt3." ขาละ ".$xnbet;

                      }




                      $curl = curl_init();

                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n3f98341d5a851e7a30336\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"nbetno\": \"\",\n
                          \"nbet_tks_userid\": \"$userID\",\n            \"nbet_tks_fchoice\": \"$nn1\",\n            \"nbet_tks_schoice\": \"$nn2\",\n            \"nbet_tks_tchoice\": \"$nn3\",\n
                          \"nbet_tks_bet\": \"$money\",\n            \"nbet_tks_income\": \"0\",\n            \"nbet_tks_expend\": \"0\",\n            \"nbet_tks_allchoice\": \"$alln\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-23 04:18:20\",\n            \"modifiedtime\": \"2018-02-23 04:18:20\",\n            \"id\": \"53x889\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNbet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                          "postman-token: 81acaa99-e0eb-d290-6b5d-e75245e3e73d"
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
                          'text' => $dname.' ผู้เล่นเพิ่มแทงพนัน '.$c1.'   '.$c2.'   '.$c3.'   ตัวละ '.$money.' ยอดคงเหลือก่อนแทง '.$mbalance."\n".$listbet
                        ];
                      }
                    }


//


//







              }
              else if ($nt == 2) {

                if (strlen($mid) < 2) {
                      $messages = [
                        'type' => 'text',
                        'text' => $dname.' คุณไม่ได้เป็นสมาชิก สมัครสมาชิกด้วยคำสั่ง PLAY'
                      ];
                }else{
                    $messages = [
                      'type' => 'text',
                      'text' => $dname.' ยอดเงินไม่พอสำหรับการแทง ยอดคงเหลือคือ '.$mbalance
                    ];
                  }
              }

              else{
                    $messages = [
                      'type' => 'text',
                      'text' => $dname.' รูปแบบการแทงไม่ถูกต้อง ตัวอย่าง พิมพ์ T ตามด้วย สัตว์ที่ต้องการแทง น้ำเต้า ปู ปลา กุ้ง เสือ ไก่ และ - (ขีด) ตามด้วยจำนวนเงิน เช่น T123-100 (ขั้นต่ำ 20 สูงสุด 200)'
                    ];
              }


            }else {
              $messages = [
                'type' => 'text',
                'text' => 'ขณะนี้ไม่ใช่เวลาแทง โปรดรอเปิดรอบอีกครั้ง'
              ];
            }
      }

      else if(strtoupper($ftext) == "X"){
        //ยกเลิกแทง

        $nx = 0;
        if(strlen($text)>4 || strlen($text)<2){
            $nx=1;
        }
        $newtext = substr($text, 1);

        $nn1 = substr($newtext,0,1);
        $nn2 = substr($newtext,1,1);
        $nn3 = substr($newtext,2,1);

        $alln = $nn1.$nn2.$nn3;



        if(strlen($newtext)>3 || strlen($newtext)==0){
          $nx=1;
        }


        if(is_numeric($newtext)){
          $nx = 0;
        } else {
          $nx = 1;
        }

        if(substr_count($newtext, '-')>0){
          $nx=1;
        }

        if(substr_count($newtext, '*')>0){
          $nx=1;
        }

        if(substr_count($newtext, '/')>0){
          $nx=1;
        }

        if(substr_count($newtext, '+')>0){
          $nx=1;
        }
        if(substr_count($newtext, '=')>0){
          $nx=1;
        }


        if(strlen($newtext)==1){
          if($nn1 > 6){
              $nx = 1;
          }
          if($nn1 <= 0){
              $nx = 1;
          }
        }

        if(strlen($newtext)==2){
          if($nn1 > 6 || $nn2 > 6){
              $nx = 1;
          }

          if($nn1 <= 0 || $nn2 <= 0){
              $nx = 1;
          }

        }

        if(strlen($newtext)==3){
          if($nn1 > 6 || $nn2 > 6 || $nn3 > 6){
              $nx = 1;
          }

          if($nn1 <= 0 || $nn2 <= 0 || $nn3 <= 0){
              $nx = 1;
          }

        }


        if($nx==0 && is_numeric($newtext) && strlen($newtext)<=3 && strlen($newtext) >=1 ){


          $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nbet%20Where%20nbet_tks_userid='".$userID."'%20AND%20nbet_tks_allchoice='".$alln."';";
          $responseq = \Httpful\Request::get($uriq)->send();
          $nid = $responseq->body->result[0]->id;

          if(strlen($nid)>3){
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ndelete\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n32b49cd45a9626a2df371\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"id\"\r\n\r\n$nid\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: f4740d0e-9ace-dbd0-a0d5-847309057070"
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
                        'text' => 'ลบข้อมูลแล้ว '$nn1.$nn2.$nn3
                      ];
                    }

          }else{
            $messages = [
              'type' => 'text',
              'text' => 'ไม่พบข้อมูลที่ต้องการลบ'
            ];
          }
        }else{
          $messages = [
            'type' => 'text',
            'text' => 'รูปแบบไม่ถูกต้อง'
          ];
        }

  }
      else if(strtoupper($ftext) == "S"){
        $fftext = substr($fourtext, 1);

        $ns1 = substr($fftext,0,1);
        $ns2 = substr($fftext,1,1);
        $ns3 = substr($fftext,2,1);

        $ctext1="";
        $ctext2="";
        $ctext3="";

        $dos = 0;

        if(is_numeric($ostr)){
        } else {
          $dos = 2;
        }


        if($ns1 > 6 || $ns1 < 1){
          $dos = 2;
        }else{
          $dos = 1;
        }
        if($ns2 > 6 || $ns2 < 1){
          $dos = 2;
        }else{
          $dos = 1;
        }
        if($ns3 > 6 || $ns3 < 1){
          $dos = 2;
        }else{
          $dos = 1;
        }


          if($ns1 == "1"){
            $ctext1="น้ำเต้า 💧";
          }else if($ns1 == "2"){
            $ctext1="ปู 🦀";
          }else if($ns1 == "3"){
            $ctext1="ปลา 🐠";
          }else if($ns1 == "4"){
            $ctext1="กุ้ง 🦐";
          }else if($ns1 == "5"){
            $ctext1="เสือ 🐯";
          }else if($ns1 == "6"){
            $ctext1="ไก่ 🐔";
          }else{
            $dos = 2;
          }

          if($ns2 == "1"){
            $ctext2="น้ำเต้า 💧";
          }else if($ns2 == "2"){
            $ctext2="ปู 🦀";
          }else if($ns2 == "3"){
            $ctext2="ปลา 🐠";
          }else if($ns2 == "4"){
            $ctext2="กุ้ง 🦐";
          }else if($ns2 == "5"){
            $ctext2="เสือ 🐯";
          }else if($ns2 == "6"){
            $ctext2="ไก 🐔่";
          }else{
            $dos = 2;
          }


          if($ns3 == "1"){
            $ctext3="น้ำเต้า 💧";
          }else if($ns3 == "2"){
            $ctext3="ปู 🦀";
          }else if($ns3 == "3"){
            $ctext3="ปลา 🐠";
          }else if($ns3 == "4"){
            $ctext3="กุ้ง 🦐";
          }else if($ns3 == "5"){
            $ctext3="เสือ 🐯";
          }else if($ns3 == "6"){
            $ctext3="ไก่ 🐔";
          }else{
            $dos = 2;
          }

        $uris = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $responses = \Httpful\Request::get($uris)->send();

        $adminID = $responses->body->result[0]->bgame_tks_adminid;
        // $gameStatus = $responses->body->result[0]->bgame_tks_gamestatus;
        // $allincome = $responses->body->result[0]->bgame_tks_allincome;
        // $allexpend = $responses->body->result[0]->bgame_tks_allexpend;
        // $cround = $response->body->result[0]->bgame_tks_round;
        // $cround2 = $cround+1;



                  if(strcmp($adminID,$userID) == 0 && $dos !=2 && strlen($ostr) ==3){

                          if($ns1==1){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=1%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=1%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns1==2){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=2%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=2%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }


                          if($ns1==3){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=3%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=3%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }
                          if($ns1==4){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=4%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=4%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns1==5){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=5%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=5%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns1==6){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice=6%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_fchoice!=6%20AND%20nmember_tks_status=1;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }


                          if($ns2==1){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=1%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=1%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns2==2){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=2%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=2%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }


                          if($ns2==3){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=3%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=3%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }
                          if($ns2==4){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=4%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=4%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns2==5){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=5%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=5%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns2==6){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice=6%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_schoice!=6%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }
                          if($ns3==1){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=1%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=1%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns3==2){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=2%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=2%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }


                          if($ns3==3){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=3%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=3%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }
                          if($ns3==4){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=4%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=4%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns3==5){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=5%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=5%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

                          if($ns3==6){
                            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice=6%20AND%20nmember_tks_status=1;";
                            $response = \Httpful\Request::get($uri)->send();
                            $data = json_decode($response,true);

                            foreach($data["result"] as $item) {

                              $muserid = $item['nmember_tks_userid'];
                              $mbalance = $item['nmember_tks_balance'];
                              $mbet = $item['nmember_tks_bet'];
                              $musername = $item['nmember_tks_username'];
                              $mplayer = $item['nmember_tks_player'];
                              $mexpend = $item['nmember_tks_expend'];
                              $mincome = $item['nmember_tks_income']+$mbet;
                              $mid = $item['id'];
                              $mfchoice = $item['nmember_tks_fchoice'];
                              $mschoice = $item['nmember_tks_schoice'];
                              $mtchoice = $item['nmember_tks_tchoice'];

                              $curl = curl_init();

                              curl_setopt_array($curl, array(
                                CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                CURLOPT_RETURNTRANSFER => true,
                                CURLOPT_ENCODING => "",
                                CURLOPT_MAXREDIRS => 10,
                                CURLOPT_TIMEOUT => 30,
                                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                CURLOPT_CUSTOMREQUEST => "POST",
                                CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
                                  \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"$mexpend\",\n            \"nmember_tks_income\": \"$mincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                  \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                CURLOPT_HTTPHEADER => array(
                                  "cache-control: no-cache",
                                  "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                  "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                ),
                              ));

                              $response = curl_exec($curl);
                              $err = curl_error($curl);

                              curl_close($curl);

                              if ($err) {
                                echo "cURL Error #:" . $err;
                              } else {
                                  //
                                    ///
                              }

                            }


                                                              $uriq = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_tchoice!=6%20AND%20nmember_tks_status=1%20AND%20nmember_tks_schoice!=0;";
                                                              $responseq = \Httpful\Request::get($uriq)->send();
                                                              $dataq = json_decode($responseq,true);

                                                              foreach($dataq["result"] as $itemq) {

                                                                $quserid = $itemq['nmember_tks_userid'];
                                                                $qbalance = $itemq['nmember_tks_balance'];
                                                                $qbet = $itemq['nmember_tks_bet'];
                                                                $qusername = $itemq['nmember_tks_username'];
                                                                $qplayer = $itemq['nmember_tks_player'];
                                                                $qexpend = $itemq['nmember_tks_expend']+$qbet;
                                                                $qincome = $itemq['nmember_tks_income'];
                                                                $qid = $itemq['id'];
                                                                $qfchoice = $itemq['nmember_tks_fchoice'];
                                                                $qschoice = $itemq['nmember_tks_schoice'];
                                                                $qtchoice = $itemq['nmember_tks_tchoice'];

                                                                $curlq = curl_init();

                                                                curl_setopt_array($curlq, array(
                                                                  CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                                  CURLOPT_RETURNTRANSFER => true,
                                                                  CURLOPT_ENCODING => "",
                                                                  CURLOPT_MAXREDIRS => 10,
                                                                  CURLOPT_TIMEOUT => 30,
                                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$quserid\",\n            \"nmember_tks_balance\": \"$qbalance\",\n            \"nmember_tks_bet\": \"$qbet\",\n            \"nmember_tks_username\": \"001\",\n
                                                                    \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$qfchoice\",\n            \"nmember_tks_schoice\": \"$qschoice\",\n            \"nmember_tks_tchoice\": \"$qtchoice\",\n            \"nmember_tks_expend\": \"$qexpend\",\n            \"nmember_tks_income\": \"$qincome\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                                                                    \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$qid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                                  CURLOPT_HTTPHEADER => array(
                                                                    "cache-control: no-cache",
                                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                                    "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                                                                  ),
                                                                ));

                                                                $responseq = curl_exec($curlq);
                                                                $errq = curl_error($curlq);

                                                                curl_close($curlq);

                                                                if ($errq) {
                                                                  echo "cURL Error #:" . $errq;
                                                                } else {

                                                                }

                                                              }

                          }

/////////****--++---++-//////

                          $messages = [
                            'type' => 'text',
                            'text' => $ctext1."\n".$ctext2."\n".$ctext3."\n".'ยืนยันการสรุปผลหรือไม่ ?'
                          ];

                    } else {
                      $messages = [
                        'type' => 'text',
                        'text' => 'รูปแบบการสรุปผลไม่ถูกต้อง'
                      ];

                    }



    }

      //แก้ไขผล
    else if(strtoupper($fivetext) == "CLEAR"){

      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
      $response = \Httpful\Request::get($uri)->send();

      $adminID = $response->body->result[0]->bgame_tks_adminid;
        if(strcmp($adminID,$userID) == 0){

      $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20Where%20nmember_tks_status='1';";
      $responsex = \Httpful\Request::get($urix)->send();

      $datax = json_decode($responsex,true);

      foreach($datax["result"] as $itemx) {
        $muserid = $itemx['nmember_tks_userid'];
        $mbalance = $itemx['nmember_tks_balance'];
        $mbet = $itemx['nmember_tks_bet'];
        $musername = $itemx['nmember_tks_username'];
        $mplayer = $itemx['nmember_tks_player'];
        $mexpend = $itemx['nmember_tks_expend'];
        $mincome = $itemx['nmember_tks_income'];
        $mid = $itemx['id'];
        $mfchoice = $itemx['nmember_tks_fchoice'];
        $mschoice = $itemx['nmember_tks_schoice'];
        $mtchoice = $itemx['nmember_tks_tchoice'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$mbalance\",\n            \"nmember_tks_bet\": \"$mbet\",\n            \"nmember_tks_username\": \"001\",\n
            \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"$mfchoice\",\n            \"nmember_tks_schoice\": \"$mschoice\",\n            \"nmember_tks_tchoice\": \"$mtchoice\",\n            \"nmember_tks_expend\": \"0\",\n            \"nmember_tks_income\": \"0\",\n            \"nmember_tks_status\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
            \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
            "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
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
              'text' =>  'เคลียร์ผลสรุปแล้ว สรุปผลใหม่อีกครั้ง'
            ];
          }


        }

        }

    }
    //สิ้นสุดแก้ไขผล



			else if($ftext == "@"){

        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $response = \Httpful\Request::get($uri)->send();
        $xround = $response->body->result[0]->bgame_tks_round-1;


        $listname= 'สรุปผล : รอบที่ # '.$xround;
        $resultlist= 'สรุปผล : รอบที่ # '.$xround;


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
              "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
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


          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_userid='".$userID."';";
          $response = \Httpful\Request::get($uri)->send();
          // echo $response;
          // $username = $response->body->result[0]->nmember_tks_username;
          $vid = $response->body->result[0]->id;
          $balance = $response->body->result[0]->nmember_tks_balance;

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


          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
          $response = \Httpful\Request::get($uri)->send();

          $adminID = $response->body->result[0]->bgame_tks_adminid;


            if(strcmp($adminID,$userID) == 0){

              $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20Where%20nmember_tks_status='1';";
              $responsex = \Httpful\Request::get($urix)->send();

              $datax = json_decode($responsex,true);

              foreach($datax["result"] as $itemx) {
                  $username = '';
                  $userID = $itemx['nmember_tks_userid'];

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
                      "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
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

                  // $vid = $itemx['id'];
                  // $balance = $itemx['bmember_tks_balance'];
                  // $bet = $itemx['bmember_tks_bet'];
                  // $xmoneyx = $itemx['bmember_tks_player'];
                  // $expend = $itemx['bmember_tks_expend'];
                  // $income = $itemx['bmember_tks_income'];
                  // $sum = $income - $expend;
                  // $playerbet = $itemx['bmember_tks_playerbet'];

                  $muserid = $itemx['nmember_tks_userid'];
                  $mbalance = $itemx['nmember_tks_balance'];
                  $mbet = $itemx['nmember_tks_bet'];
                  $musername = $itemx['nmember_tks_username'];
                  $mplayer = $itemx['nmember_tks_player'];
                  $expend = $itemx['nmember_tks_expend'];
                  $income = $itemx['nmember_tks_income'];


                  $multiplebonus =  $income/$mbet;
                  $extrabonus = '';
                  if($multiplebonus==2){
                      $income = $mbet*5;
                      $extrabonus = ' โบนัส 5 เท่า';
                  }else if($multiplebonus==3){
                      $income = $mbet*20;
                      $extrabonus = ' โบนัส 20 เท่า';
                  }

                  $sum = $income - $expend;

                  $mid = $itemx['id'];
                  $mfchoice = $itemx['nmember_tks_fchoice'];
                  $mschoice = $itemx['nmember_tks_schoice'];
                  $mtchoice = $itemx['nmember_tks_tchoice'];
                  // เริ่ม

                  $urit = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
                  $responset = \Httpful\Request::get($urit)->send();

                //รายรับจ้าวมือ
                  $allincome = $responset->body->result[0]->bgame_tks_allincome;
                  $adminID = $responset->body->result[0]->bgame_tks_adminid;
                  $xxround = $responset->body->result[0]->bgame_tks_round;

                //รายจ่ายจ้าวมือ
                  $allexpend = $responset->body->result[0]->bgame_tks_allexpend;
                    //รายรับจ้าวมือ = รายจ่ายของผู้เล่น
                  $newincome = $allincome+$expend;
                  //รายรับจ้าวมือ = รายรับของผู้เล่น
                  $newexpend = $allexpend+$income;






                  $curl = curl_init();

                  curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"bgameno\": \"\",\n            \"bgame_tks_adminid\": \"$adminID\",\n            \"bgame_tks_gamestatus\": \"0\",\n            \"bgame_tks_round\": \"$xxround\",\n
                      \"bgame_tks_allincome\": \"$newincome\",\n            \"bgame_tks_allexpend\": \"$newexpend\",\n
                      \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 06:06:23\",\n            \"modifiedtime\": \"2018-02-02 06:06:23\",\n            \"id\": \"50x872\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                    CURLOPT_HTTPHEADER => array(
                      "cache-control: no-cache",
                      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                      "postman-token: ae7060b7-5521-c599-c9e6-e7e630892a76"
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
                      $newbalance = $mbalance - $sum;
                       $resultlist = $resultlist."\n".$username." -".$sum."=".$newbalance."";



                       $curl = curl_init();

                       curl_setopt_array($curl, array(
                         CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                         CURLOPT_RETURNTRANSFER => true,
                         CURLOPT_ENCODING => "",
                         CURLOPT_MAXREDIRS => 10,
                         CURLOPT_TIMEOUT => 30,
                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                         CURLOPT_CUSTOMREQUEST => "POST",
                         CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$newbalance\",\n            \"nmember_tks_bet\": \"$money\",\n            \"nmember_tks_username\": \"001\",\n
                           \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"\",\n            \"nmember_tks_schoice\": \"\",\n            \"nmember_tks_tchoice\": \"\",\n            \"nmember_tks_expend\": \"0\",\n            \"nmember_tks_income\": \"0\",\n            \"nmember_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                           \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                         CURLOPT_HTTPHEADER => array(
                           "cache-control: no-cache",
                           "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                           "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                         ),
                       ));

                       $response = curl_exec($curl);
                       $err = curl_error($curl);

                       curl_close($curl);

                       if ($err) {
                         echo "cURL Error #:" . $err;
                       } else {
                       }


                    }
                    else if($sum < 0){
                        $sum = substr($sum,1);
                      $newbalance = $mbalance - $sum;
                       $resultlist = $resultlist."\n".$username." -".$sum."=".$newbalance."";

                       $curl = curl_init();

                       curl_setopt_array($curl, array(
                         CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                         CURLOPT_RETURNTRANSFER => true,
                         CURLOPT_ENCODING => "",
                         CURLOPT_MAXREDIRS => 10,
                         CURLOPT_TIMEOUT => 30,
                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                         CURLOPT_CUSTOMREQUEST => "POST",
                         CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$newbalance\",\n            \"nmember_tks_bet\": \"$money\",\n            \"nmember_tks_username\": \"001\",\n
                           \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"\",\n            \"nmember_tks_schoice\": \"\",\n            \"nmember_tks_tchoice\": \"\",\n            \"nmember_tks_expend\": \"0\",\n            \"nmember_tks_income\": \"0\",\n            \"nmember_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                           \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                         CURLOPT_HTTPHEADER => array(
                           "cache-control: no-cache",
                           "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                           "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                         ),
                       ));

                       $response = curl_exec($curl);
                       $err = curl_error($curl);

                       curl_close($curl);

                       if ($err) {
                         echo "cURL Error #:" . $err;
                       } else {
                       }

                    }else if ($sum >= 0){
                      $newbalance = $mbalance + $sum;
                     $resultlist = $resultlist."\n".$username." +".$sum."=".$newbalance." ".$extrabonus;

                     $curl = curl_init();

                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n   {\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$muserid\",\n            \"nmember_tks_balance\": \"$newbalance\",\n            \"nmember_tks_bet\": \"$money\",\n            \"nmember_tks_username\": \"001\",\n
                         \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"\",\n            \"nmember_tks_schoice\": \"\",\n            \"nmember_tks_tchoice\": \"\",\n            \"nmember_tks_expend\": \"0\",\n            \"nmember_tks_income\": \"0\",\n            \"nmember_tks_status\": \"0\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 05:19:54\",\n
                         \"modifiedtime\": \"2018-02-14 07:01:26\",\n            \"id\": \"$mid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "cache-control: no-cache",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                         "postman-token: 2f7345c0-b598-025d-6584-37bac3668230"
                       ),
                     ));

                     $response = curl_exec($curl);
                     $err = curl_error($curl);

                     curl_close($curl);

                     if ($err) {
                       echo "cURL Error #:" . $err;
                     } else {
                     }

                    }

                  }

                }
                $messages = [
                  'type' => 'text',
                  'text' =>  $resultlist
                ];

              }

        } else {

        }


      }
      else if(strtoupper($text) == "PLAY"){


        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Nmember%20where%20nmember_tks_userid='".$userID."';";
        $response = \Httpful\Request::get($uri)->send();
        // echo $response;
        $exid = $response->body->result[0]->nmember_tks_userid;
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
                          "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
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
                              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"nmemberno\": \"\",\n            \"nmember_tks_userid\": \"$userID\",\n            \"nmember_tks_balance\": \"5000\",\n            \"nmember_tks_bet\": \"\",\n            \"nmember_tks_username\": \"001\",\n            \"nmember_tks_player\": \"\",\n            \"nmember_tks_fchoice\": \"\",\n            \"nmember_tks_schoice\": \"\",\n            \"nmember_tks_tchoice\": \"\",\n
                                \"nmember_tks_expend\": \"0\",\n            \"nmember_tks_income\": \"0\",\n            \"nmember_tks_status\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-14 04:47:17\",\n            \"modifiedtime\": \"2018-02-14 04:47:17\",\n            \"id\": \"52x866\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nNmember\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                              CURLOPT_HTTPHEADER => array(
                                "cache-control: no-cache",
                                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                "postman-token: 56b5423a-b298-8856-72d9-b6262009c954"
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
        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $response = \Httpful\Request::get($uri)->send();

        $adminID = $response->body->result[0]->bgame_tks_adminid;


          if(strcmp($adminID,$userID) == 0){

            $urit = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
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
      else if(strtoupper($context) == "OP"){

        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
        $response = \Httpful\Request::get($uri)->send();

        $adminID = $response->body->result[0]->bgame_tks_adminid;


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
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n     {\n            \"bgameno\": \"\",\n            \"bgame_tks_adminid\": \"$adminID\",\n            \"bgame_tks_gamestatus\": \"0\",\n            \"bgame_tks_round\": \"1\",\n            \"bgame_tks_allincome\": \"\",\n            \"bgame_tks_allexpend\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 06:06:23\",\n            \"modifiedtime\": \"2018-02-02 06:06:23\",\n            \"id\": \"50x872\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: 2854d113-098a-2091-f3a5-bc42427bc062"
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
		}
    else if ($event['type'] == 'message' && $event['message']['type'] == 'sticker') {

      $pid = $event['message']['packageId'];
      $sid = $event['message']['stickerId'];
        $userID = $event['source']['userId'];
			$replyToken = $event['replyToken'];

      $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Bgame%20Where%20id%20='50x872';";
      $response = \Httpful\Request::get($uri)->send();

      $adminID = $response->body->result[0]->bgame_tks_adminid;
      $gameStatus = $response->body->result[0]->bgame_tks_gamestatus;
      $allincome = $response->body->result[0]->bgame_tks_allincome;
      $allexpend = $response->body->result[0]->bgame_tks_allexpend;
      $cround = $response->body->result[0]->bgame_tks_round;
      $cround2 = $cround+1;


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
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n     {\n            \"bgameno\": \"\",\n            \"bgame_tks_adminid\": \"$adminID\",\n            \"bgame_tks_gamestatus\": \"1\",\n            \"bgame_tks_round\": \"$cround\",\n            \"bgame_tks_allincome\": \"$allincome\",\n
                        \"bgame_tks_allexpend\": \"$allexpend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 06:06:23\",\n            \"modifiedtime\": \"2018-02-02 06:06:23\",\n            \"id\": \"50x872\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: 2dbc0309-4e61-c7f5-776f-3b2a14f71c55"
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
                        'text' => '🍺 กติกา  🍭

พิมพ์ T ตามด้วย สัตว์ที่ต้องการแทง น้ำเต้า ปู ปลา
และ - (ขีด) ตามด้วยจำนวนเงิน เช่น T123-100

1 คือ น้ำเต้า 💧
2 คือ ปู 🦀
3 คือ ปลา 🐠
4 คือ  กุ้ง 🦐
5 คือ เสือ 🐯
6 คือ ไก่ 🐔'
                      ];


                      $url = 'https://api.line.me/v2/bot/message/push';
                      $datax = [
                        'to' => 'C460c62552ff61a39ccaa8e085335f969',
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
                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n709c1a7e5a83bd434de8f\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n     {\n            \"bgameno\": \"\",\n            \"bgame_tks_adminid\": \"$adminID\",\n            \"bgame_tks_gamestatus\": \"0\",\n            \"bgame_tks_round\": \"$cround2\",\n            \"bgame_tks_allincome\": \"$allincome\",\n
                        \"bgame_tks_allexpend\": \"$allexpend\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-02-02 06:06:23\",\n            \"modifiedtime\": \"2018-02-02 06:06:23\",\n            \"id\": \"50x872\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                      CURLOPT_HTTPHEADER => array(
                        "cache-control: no-cache",
                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                        "postman-token: 2dbc0309-4e61-c7f5-776f-3b2a14f71c55"
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
                        'text' => '🍺 กติกา  🍭

พิมพ์ T ตามด้วย สัตว์ที่ต้องการแทง น้ำเต้า ปู ปลา
และ - (ขีด) ตามด้วยจำนวนเงิน เช่น T123-100

1 คือ น้ำเต้า 💧
2 คือ ปู 🦀
3 คือ ปลา 🐠
4 คือ  กุ้ง 🦐
5 คือ เสือ 🐯
6 คือ ไก่ 🐔
  '
                      ];


                      $url = 'https://api.line.me/v2/bot/message/push';
                      $datax = [
                        'to' => 'C460c62552ff61a39ccaa8e085335f969',
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
