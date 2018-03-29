<?php
date_default_timezone_set('Asia/Bangkok');
  include('./httpful.phar');
$access_token =
'pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=';

$cdate = date("d-m-Y");
$ctime = date("H:i:s");

$sidname='636dbd215a9cebe09e04e';
$vturl='http://redfoxdev.com/newbackend/';
$walletur='http://redfoxdev.com/vtiger/';

$swallet='636dbd215a9cebe09e04e';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {

    $mmuri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&sessionName=636dbd215a9cebe09e04e&query=select%20*%20from%20Minmax%20where%20id=%2749x166%27;";
    $mmresponse = \Httpful\Request::get($mmuri)->send();
    $min = $mmresponse->body->result[0]->minmax_tks_min;
    $max = $mmresponse->body->result[0]->minmax_tks_max;

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
    $part = $responsegame->body->result[0]->game_tks_part;

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
      $mygroup = "pdk1";


      $xuuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
      $xuresponse = \Httpful\Request::get($xuuri)->send();
      $wuserid = $xuresponse->body->result[0]->wallet_tks_userid;
      $wid = $xuresponse->body->result[0]->id;
      $wstatus = $xuresponse->body->result[0]->wallet_tks_status;
      $wkey = $xuresponse->body->result[0]->wallet_tks_key;
      $wbalance = $xuresponse->body->result[0]->wallet_tks_balance;


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
        $n5 = 'P'.substr($newtext,4,1);
        $n6 = 'P'.substr($newtext,5,1);
        $txc='';


        $nn1 = substr($newtext,0,1);
        $nn2 = substr($newtext,1,1);
        $nn3 = substr($newtext,2,1);
        $nn4 = substr($newtext,3,1);
        $nn5 = substr($newtext,4,1);
        $nn6 = substr($newtext,5,1);



      if(strtoupper($ftext) == "T"){

        $uname= '';
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
            "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
        $uname =  $data['displayName'];
      }


        //

        $urim = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
        $responsem = \Httpful\Request::get($urim)->send();

        $choice = $responsem->body->result[0]->tmember_tks_playerbet;
        $choicebet = $responsem->body->result[0]->tmember_tks_bet;
        $usernamex = $responsem->body->result[0]->tmember_tks_userid;
        $newchoice = str_replace("|##|", "", $choice);
        $newchoice2 = str_replace("P", "", $newchoice);
        $newchoice3 = str_replace(" ", "", $newchoice2);
        $lenchoice = strlen($newchoice);
        $nowbet = '';

        $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
        $uresponse = \Httpful\Request::get($uuri)->send();

        $mbalance =  $uresponse->body->result[0]->wallet_tks_balance;

        $countcheck = 0;
        if(substr_count($text,"-")){
          $countcheck=1;
        }else{
          $countcheck=2;
        }

        $player = strtoupper(strstr($text, '-', true));
        $cplay = substr($player,1);
        $money  = substr($text, (strpos($text, '-') ?: -1) + 1);
        $moneylen = strlen($money);

        // $money = substr($money,0,3);


        // $money = preg_replace('/[^0-9]/', '', $money);

        $ix= '';
        $tx= '';


        if(is_numeric($money)){

        }else {
          $ix=1;
        }

        if(is_numeric($cplay)){

        }else {
          $ix=1;
        }

        if(substr_count($text, '-')>1){
          $ix=1;
        }

        if($nn1>6){
          $ix=1;
        }
        if($nn2>6){
          $ix=1;
        }
        if($nn3>6){
          $ix=1;
        }
        if($nn4>6){
          $ix=1;
        }
        if($nn5>6){
          $ix=1;
        }
        if($nn6>6){
          $ix=1;
        }

        if(strlen($player)>7){
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
        if(substr_count($alltext,5)>1){
          $tx=1;
        }
        if(substr_count($alltext,6)>1){
          $tx=1;
        }


if($countcheck==1){
      if(strlen($usernamex)>0){
        if($wstatus!=1 || strcmp($wkey,$mygroup) == 0){
            if ($ix != 1 && $tx!=1) {
                    if($gameStatus == 1) {

                  if($money <= $max && $money >= $min) {

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
                              }else if ($lentext==5){
                                $moneyx = $money*10;
                                if($moneyx<=$mbalance){
                                    $nowbet = 1;
                                }else {
                                  $nowbet = 0;
                                }
                              }else if ($lentext==6){
                                $moneyx = $money*12;
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
                                      \"tmember_tks_playerbet\": \"$n1 |##| $n2 |##| $n3 |##| $n4 |##| $n5 |##| $n6\",\n
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
                                      "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
                                    'text' => '  '.$username.' ✏️ เปลี่ยนแปลงการแทงจาก T'.$newchoice3.' ขาละ '.$choicebet.'  ▶️ '.' เป็น '.$player.' ขาละ '.$money
                                  ];


                                  $wuri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tbetlog%20Where%20tbetlog_tks_part=%27".$gamepart."%27%20AND%20tbetlog_tks_round=%27".$gameround."%27%20AND%20tbetlog_tks_userid=%27".$userID."%27;";
                                  $wresponse = \Httpful\Request::get($wuri)->send();
                                  // echo $response;
                                  $wid = $wresponse->body->result[0]->id;

                                  $curl = curl_init();

                                    curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"tbetlogno\": \"\",\n            \"tbetlog_tks_bet\": \"$money\",\n            \"tbetlog_tks_userid\": \"$userID\",\n            \"tbetlog_tks_playerbet\": \"$n1 |##| $n2 |##| $n3 |##| $n4 |##| $n5 |##| $n6\",\n
                                      \"tbetlog_tks_part\": \"$part\",\n
                                      \"tbetlog_tks_round\": \"$round\",\n            \"tbetlog_tks_date\": \"$cdate\",\n            \"tbetlog_tks_time\": \"$ctime\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-05 10:05:17\",\n            \"modifiedtime\": \"2018-03-05 10:05:17\",\n            \"id\": \"$wid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nTbetlog\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                    CURLOPT_HTTPHEADER => array(
                                      "cache-control: no-cache",
                                      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                      "postman-token: d954cc0e-cc50-7aa2-4ab6-9f5981beb8ba"
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



                                }else {



                                  $curl = curl_init();

                                  curl_setopt_array($curl, array(
                                    CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                    CURLOPT_RETURNTRANSFER => true,
                                    CURLOPT_ENCODING => "",
                                    CURLOPT_MAXREDIRS => 10,
                                    CURLOPT_TIMEOUT => 30,
                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                    CURLOPT_CUSTOMREQUEST => "POST",
                                    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"walletno\": \"\",\n            \"wallet_tks_userid\": \"$wuserid\",\n            \"wallet_tks_balance\": \"$wbalance\",\n            \"wallet_tks_status\": \"1\",\n
                                      \"wallet_tks_key\": \"$mygroup\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-14 07:01:30\",\n            \"modifiedtime\": \"2018-03-14 07:01:30\",\n            \"id\": \"$wid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nWallet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                    CURLOPT_HTTPHEADER => array(
                                      "cache-control: no-cache",
                                      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                      "postman-token: 3812dfcb-e865-6431-bfa2-97a04220f6f0"
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


                                  $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
                                  $uresponse = \Httpful\Request::get($uuri)->send();

                                  $xbalance = $uresponse->body->result[0]->wallet_tks_balance;


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
                                      "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
                                    'text' => '  '.$username.' ▶️ '.'แทงขา '.$player.' ขาละ '.$money.'  💰 ยอดคงเหลือก่อนแทง '.$xbalance.'  '
                                  ];


                                    ///ttt



                                    $curl = curl_init();

                                      curl_setopt_array($curl, array(
                                      CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                      CURLOPT_RETURNTRANSFER => true,
                                      CURLOPT_ENCODING => "",
                                      CURLOPT_MAXREDIRS => 10,
                                      CURLOPT_TIMEOUT => 30,
                                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                      CURLOPT_CUSTOMREQUEST => "POST",
                                      CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n{\n            \"tbetlogno\": \"\",\n            \"tbetlog_tks_bet\": \"$money\",\n            \"tbetlog_tks_userid\": \"$userID\",\n            \"tbetlog_tks_playerbet\": \"$n1 |##| $n2 |##| $n3 |##| $n4\",\n
                                        \"tbetlog_tks_part\": \"$part\",\n
                                        \"tbetlog_tks_round\": \"$round\",\n            \"tbetlog_tks_date\": \"$cdate\",\n            \"tbetlog_tks_time\": \"$ctime\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-05 10:05:17\",\n            \"modifiedtime\": \"2018-03-05 10:05:17\",\n            \"id\": \"42x8\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nTbetlog\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                      CURLOPT_HTTPHEADER => array(
                                        "cache-control: no-cache",
                                        "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                        "postman-token: d954cc0e-cc50-7aa2-4ab6-9f5981beb8ba"
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


                                    ////






                                }

                      }                     //////*
                      else if ($nowbet==0){

                        $xbalance=0;

                        $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
                        $uresponse = \Httpful\Request::get($uuri)->send();

                        $xbalance = $uresponse->body->result[0]->wallet_tks_balance;

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
                            "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
                          'text' => $username.'💰 ยอดเงินคงเหลือ '.$xbalance.' ไม่พอสำหรับการแทง กรุณาเติมเงินด้วยคะ'
                        ];

                      }
                }  else {
                  $messages = [
                    'type' => 'text',
                    // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                    'text' => "รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด ".$min." สูงสุด ".$max." ตัวอย่าง : T1234-50 หรือ T1-200"
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
                  'text' => "รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด ".$min." สูงสุด ".$max." ตัวอย่าง : T1234-50 หรือ T1-200"
                ];
              }


                      }else{
                        $messages = [
                          'type' => 'text',
                          // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                          'text' => $uname." คุณไม่สามารถแทงได้ เนื่องจาก คุณกำลังเล่นอยู่ในโต๊ะอื่นๆ"
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
                  "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
            'text' => "รูปแบบการแทงไม่ถูกต้อง แทงได้แค่ T1 - T4 เท่านั้น ต่ำสุด ".$min." สูงสุด ".$max." ตัวอย่าง : T1234-50 หรือ T1-200"
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

        if(substr_count($text, ',')>5){
          $zx=1;
        }

        if(substr_count($text, ',')<5){
          $zx=1;
        }

        if(substr_count($text, '+')>4){
          $zx=1;
        }

        if(substr_count($text, '-')>6){
          $zx=1;
        }

        if(substr_count($text, '-')<6){
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

        if(strlen($zxtext)!=19){
          $zx=1;
        }

        $extext = explode(",", $text);

        $yx1 = substr($extext[0], 2);
        $yx2 = substr($extext[1], 1);
        $yx3 = substr($extext[2], 1);
        $yx4 = substr($extext[3], 1);
        $yx5 = substr($extext[4], 1);
        $yx6 = substr($extext[5], 1);

        $yo1 = substr($yx1,1);
        $yo2 = substr($yx2,1);
        $yo3 = substr($yx3,1);
        $yo4 = substr($yx4,1);
        $yo5 = substr($yx5,1);
        $yo6 = substr($yx6,1);


        if(strlen($yx1) != 2){
          $zx=1;
        }
        if(strlen($yx2) != 2){
          $zx=1;
        }
        if(strlen($yx3) != 2){
          $zx=1;
        }

        if(strlen($yx4) != 2){
          $zx=1;
        }

        if(strlen($yx5) != 2){
          $zx=1;
        }

        if(strlen($yx6) != 2){
          $zx=1;
        }

        if($yo1>2 || $yo2>2 || $yo3>2 || $yo4>2 || $yo5>2 || $yo6>2){
          $zx=1;
        }


        if($onresult!=1 && $onok !=1){

        if($zx!=1) {


        //find admin

          if(strcmp($adminID,$userID) == 0 && $gameStatus == 0){



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

        $x5 = substr($extext[4], 1);
        if ($x5=="-1"){
           $msg4 = 'ขา 5 เสียให้เจ้ามือ 1 เท่า';

                       $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P5%'%20;";
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
        } else if  ($x5=="+1"){
           $msg4 = 'ขา 5 ได้ 1 เท่า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P5%'%20;";
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
        }else if  ($x5=="+0"){
           $msg4 = 'เจ๊า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P5%'%20;";
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
        }else if  ($x5=="-2"){
           $msg4 = 'ขา 5 เสียให้เจ้ามือ 2 เท่า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P5%'%20;";
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
        }else if  ($x5=="+2"){
           $msg4 = 'ขา 5 ได้ 2 เท่า';
             $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P5%'%20;";
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
        //สิ้นสุดx5
        $x6 = substr($extext[5], 1);
        if ($x6=="-1"){
           $msg4 = 'ขา 6 เสียให้เจ้ามือ 1 เท่า';

                       $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P6%'%20;";
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
        } else if  ($x6=="+1"){
           $msg4 = 'ขา 6 ได้ 1 เท่า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P6%'%20;";
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
        }else if  ($x6=="+0"){
           $msg4 = 'เจ๊า';
           $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P6%'%20;";
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
        }else if  ($x6=="-2"){
           $msg4 = 'ขา 4 เสียให้เจ้ามือ 2 เท่า';
            $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P6%'%20;";
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
        }else if  ($x6=="+2"){
           $msg4 = 'ขา 4 ได้ 2 เท่า';
             $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20%20Tmember%20where%20tmember_tks_playerbet%20LIKE%20'%P6%'%20;";
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

            $xxr= $round-1;

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "POST",
              CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"resulthistoryno\": \"\",\n            \"resulthistory_tks_result\": \"$text\",\n            \"resulthistory_tks_part\": \"$part\",\n            \"resulthistory_tks_round\": \"$xxr\",\n
                \"resulthistory_tks_date\": \"$cdate\",\n            \"resulthistory_tks_time\": \"$ctime\",\n            \"resulthistory_tks_comment\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-06 04:51:12\",\n            \"modifiedtime\": \"2018-03-06 04:51:12\",\n            \"id\": \"48x45\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nResulthistory\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
              CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                "postman-token: ee5d7bd1-ab32-6167-767f-17ae6659aa73"
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
                'text' =>  'ยืนยันการสรุปผลหรือไม่ ?'
              ];
            }


          }


      }else {
        $messages = [
          'type' => 'text',
          'text' =>  'ไม่สามารถสรุปยอดได้ สถานะรอบยังไม่ถูกปิด หรือ โปรดเช็คสถานะแอดมิน'
        ];
      }

    }else{
      $messages = [
        'type' => 'text',
        'text' =>  '❌ รูปแบบการสรุปผลไม่ถูกต้อง ❌ ตัวอย่าง S1-1,2-1,3-1,4-1,5-1,6-1 (+2 +1 +0 -1 -2)'
      ];
      }
    }else{
      $messages = [
        'type' => 'text',
        'text' =>  '❌  คุณสรุปผล หรือ ยืนยันผลไปแล้ว ❌   ในกรณีที่คุณยังไม่ยืนยัน หากต้องการแก้ไข พิมพ์ Clear'
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
                              "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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

        $xround = $round-1;
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
              "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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

          $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
          $uresponse = \Httpful\Request::get($uuri)->send();
          $myid = $uresponse->body->result[0]->id;
          $mybalance =  $uresponse->body->result[0]->wallet_tks_balance;

          $userlen = strlen($vid);
          if($vid > 2) {


                      $messages = [
                        'type' => 'text',
                        'text' =>  $dname.' ID คือ '.$myid.'💰 ยอดเงินคงเหลือ '.$mybalance
                      ];
          } else {

                      $messages = [
                        'type' => 'text',
                        'text' =>  'คุณไม่ได้เป็นสมาชิกโปรดสมัครด้วย คำสั่ง " Play "'
                      ];
          }



        } else if (strcmp(strtoupper($teststr),"OK") == 0 && strcmp($adminID,$userID) == 0){



            if(strcmp($adminID,$userID) == 0 && $onresult == 1){

              if($onok ==0){

                $xincome = 0;
                $xexpend = 0;

              $urix = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20Where%20tmember_tks_status='1';";
              $responsex = \Httpful\Request::get($urix)->send();

              $datax = json_decode($responsex,true);

              foreach($datax["result"] as $itemx) {
                  $username = '';
                  $userID = $itemx['tmember_tks_userid'];

                  $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
                  $uresponse = \Httpful\Request::get($uuri)->send();
                  $myid = $uresponse->body->result[0]->id;
                  $balance =  $uresponse->body->result[0]->wallet_tks_balance;


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
                      "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
                  $bet = $itemx['tmember_tks_bet'];
                  $played = $itemx['tmember_tks_played'];
                  $expend = $itemx['tmember_tks_expend'];
                  $income = $itemx['tmember_tks_income'];
                  $sum = $income - $expend;
                  $playerbet = $itemx['tmember_tks_playerbet'];


                  $adminincome = $adminincome+$expend;
                  //รายรับจ้าวมือ = รายรับของผู้เล่น
                  $adminexpend = $adminexpend+$income;

                  $xincome = $xincome+$expend;
                  $xexpend = $xexpend+$income;




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

                                                 $around = $round-1;
                                                 $curl = curl_init();

                                                curl_setopt_array($curl, array(
                                                  CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                                                  CURLOPT_RETURNTRANSFER => true,
                                                  CURLOPT_ENCODING => "",
                                                  CURLOPT_MAXREDIRS => 10,
                                                  CURLOPT_TIMEOUT => 30,
                                                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                  CURLOPT_CUSTOMREQUEST => "POST",
                                                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"balanceflowno\": \"\",\n            \"balanceflow_tks_userid\": \"$userID\",\n            \"balanceflow_tks_income\": \"0\",\n            \"balanceflow_tks_expend\": \"1\",\n            \"balanceflow_tks_balance\": \"$sum\",\n
                                                    \"balanceflow_tks_part\": \"$part\",\n            \"balanceflow_tks_round\": \"$around\",\n
                                                    \"balanceflow_tks_date\": \"$cdate\",\n            \"balanceflow_tks_time\": \"$ctime\",\n            \"balanceflow_tks_comment\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-06 04:33:44\",\n            \"modifiedtime\": \"2018-03-06 04:33:44\",\n            \"id\": \"46x31\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalanceflow\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                  CURLOPT_HTTPHEADER => array(
                                                    "cache-control: no-cache",
                                                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                    "postman-token: 4f11e81e-7fff-faba-7aaf-874dbfa1fcef"
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


                                               $curl = curl_init();

                                               curl_setopt_array($curl, array(
                                                 CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                                                 CURLOPT_RETURNTRANSFER => true,
                                                 CURLOPT_ENCODING => "",
                                                 CURLOPT_MAXREDIRS => 10,
                                                 CURLOPT_TIMEOUT => 30,
                                                 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                 CURLOPT_CUSTOMREQUEST => "POST",
                                                 CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"walletno\": \"\",\n            \"wallet_tks_userid\": \"$userID\",\n            \"wallet_tks_balance\": \"$newbalance\",\n            \"wallet_tks_status\": \"0\",\n
                                                   \"wallet_tks_key\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-14 07:01:30\",\n            \"modifiedtime\": \"2018-03-14 07:01:30\",\n            \"id\": \"$myid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nWallet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                                                 CURLOPT_HTTPHEADER => array(
                                                   "cache-control: no-cache",
                                                   "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                                                   "postman-token: 3812dfcb-e865-6431-bfa2-97a04220f6f0"
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
                         $curl = curl_init();
                           $bround = $round-1;
                        curl_setopt_array($curl, array(
                          CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_TIMEOUT => 30,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"balanceflowno\": \"\",\n            \"balanceflow_tks_userid\": \"$userID\",\n            \"balanceflow_tks_income\": \"1\",\n            \"balanceflow_tks_expend\": \"0\",\n            \"balanceflow_tks_balance\": \"$sum\",\n
                            \"balanceflow_tks_part\": \"$part\",\n            \"balanceflow_tks_round\": \"$bround\",\n
                            \"balanceflow_tks_date\": \"$cdate\",\n            \"balanceflow_tks_time\": \"$ctime\",\n            \"balanceflow_tks_comment\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-06 04:33:44\",\n            \"modifiedtime\": \"2018-03-06 04:33:44\",\n            \"id\": \"46x31\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalanceflow\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                          CURLOPT_HTTPHEADER => array(
                            "cache-control: no-cache",
                            "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                            "postman-token: 4f11e81e-7fff-faba-7aaf-874dbfa1fcef"
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

                       $curl = curl_init();

                       curl_setopt_array($curl, array(
                         CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                         CURLOPT_RETURNTRANSFER => true,
                         CURLOPT_ENCODING => "",
                         CURLOPT_MAXREDIRS => 10,
                         CURLOPT_TIMEOUT => 30,
                         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                         CURLOPT_CUSTOMREQUEST => "POST",
                         CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"walletno\": \"\",\n            \"wallet_tks_userid\": \"$userID\",\n            \"wallet_tks_balance\": \"$newbalance\",\n            \"wallet_tks_status\": \"0\",\n
                           \"wallet_tks_key\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-14 07:01:30\",\n            \"modifiedtime\": \"2018-03-14 07:01:30\",\n            \"id\": \"$myid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nWallet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                         CURLOPT_HTTPHEADER => array(
                           "cache-control: no-cache",
                           "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                           "postman-token: 3812dfcb-e865-6431-bfa2-97a04220f6f0"
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
                       $curl = curl_init();
                               $cround = $round-1;
                      curl_setopt_array($curl, array(
                        CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"balanceflowno\": \"\",\n            \"balanceflow_tks_userid\": \"$userID\",\n            \"balanceflow_tks_income\": \"1\",\n            \"balanceflow_tks_expend\": \"0\",\n            \"balanceflow_tks_balance\": \"$sum\",\n
                          \"balanceflow_tks_part\": \"$part\",\n            \"balanceflow_tks_round\": \"$cround\",\n
                          \"balanceflow_tks_date\": \"$cdate\",\n            \"balanceflow_tks_time\": \"$ctime\",\n            \"balanceflow_tks_comment\": \"1\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-06 04:33:44\",\n            \"modifiedtime\": \"2018-03-06 04:33:44\",\n            \"id\": \"46x31\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nBalanceflow\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                        CURLOPT_HTTPHEADER => array(
                          "cache-control: no-cache",
                          "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                          "postman-token: 4f11e81e-7fff-faba-7aaf-874dbfa1fcef"
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
                     $curl = curl_init();

                     curl_setopt_array($curl, array(
                       CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                       CURLOPT_RETURNTRANSFER => true,
                       CURLOPT_ENCODING => "",
                       CURLOPT_MAXREDIRS => 10,
                       CURLOPT_TIMEOUT => 30,
                       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                       CURLOPT_CUSTOMREQUEST => "POST",
                       CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\nupdate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"walletno\": \"\",\n            \"wallet_tks_userid\": \"$userID\",\n            \"wallet_tks_balance\": \"$newbalance\",\n            \"wallet_tks_status\": \"0\",\n
                         \"wallet_tks_key\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-14 07:01:30\",\n            \"modifiedtime\": \"2018-03-14 07:01:30\",\n            \"id\": \"$myid\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nWallet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                       CURLOPT_HTTPHEADER => array(
                         "cache-control: no-cache",
                         "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                         "postman-token: 3812dfcb-e865-6431-bfa2-97a04220f6f0"
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

                $rround = $gameround-1;
                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"roundlogno\": \"\",\n            \"roundlog_tks_part\": \"$part\",\n            \"roundlog_tks_round\": \"$rround\",\n            \"roundlog_tks_income\": \"$xincome\",\n
                    \"roundlog_tks_expend\": \"$xexpend\",\n            \"roundlog_tks_date\": \"$cdate\",\n
                  \"roundlog_tks_time\": \"$ctime\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-05 10:15:49\",\n            \"modifiedtime\": \"2018-03-05 10:15:49\",\n            \"id\": \"41x13\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nRoundlog\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                  CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                    "postman-token: cc265954-a419-9a40-3463-71b4723badb0"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {



                            $around = $gameround-1;

                            $quri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Roundlog%20where%20roundlog_tks_part=%27".$gamepart."%27%20AND%20roundlog_tks_round=%27".$around."%27;";
                            $qresponse = \Httpful\Request::get($quri)->send();
                            $myi1 = $qresponse->body->result[0]->roundlog_tks_income;
                            $myi2 = $qresponse->body->result[0]->roundlog_tks_expend;


                            $ruri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Roundlog%20where%20roundlog_tks_part=%27".$gamepart."%27;";
                            $rresponse = \Httpful\Request::get($ruri)->send();

                            $datare = json_decode($rresponse,true);

                            $incomeall = 0;
                            $expendall = 0;

                            foreach ($datare ["result"] as $item) {
                               $incomeall = $incomeall+$item['roundlog_tks_income'];
                               $expendall = $expendall+$item['roundlog_tks_expend'];
                            }

                            $guri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tbetlog%20Where%20tbetlog_tks_part=%27".$gamepart."%27%20AND%20tbetlog_tks_round=%27".$around."%27;";
                            $gresponse = \Httpful\Request::get($guri)->send();


                                $databet = json_decode($gresponse,true);

                                $totalbet = 0;



                                       foreach ($databet ["result"] as $value) {
                                               $bet = $value['tbetlog_tks_bet'];
                                               $playerbet= $value['tbetlog_tks_playerbet'];
                                               $playerbet = str_replace("|##|", "", $playerbet);
                                               $playerbet = str_replace("P", "", $playerbet);
                                               $playerbet = str_replace(" ", "", $playerbet);

                                               if(strlen($playerbet)==1){
                                                  $bet=$bet*1;

                                               }
                                               if(strlen($playerbet)==2){
                                                  $bet=$bet*2;
                                               }
                                               if(strlen($playerbet)==3){
                                                  $bet=$bet*3;
                                               }
                                               if(strlen($playerbet)==4){
                                                 $bet=$bet*4;

                                               }

                                               $totalbet=$totalbet+$bet;
                                       }

                                       $sumi = $myi1-$myi2;
                                       if($sumi>=0){
                                         $sumi="+".$sumi;
                                       }

                                       $totaluri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tbetlog%20Where%20tbetlog_tks_part=%27".$gamepart."%27;";
                                       $totalresponse = \Httpful\Request::get($totaluri)->send();


                                           $datatotal = json_decode($totalresponse,true);

                                           $alltotal = 0;



                                                  foreach ($datatotal ["result"] as $valuetotal) {

                                                          $allbet = $valuetotal['tbetlog_tks_bet'];
                                                          $pb = $valuetotal['tbetlog_tks_playerbet'];

                                                          if(strlen($pb)==23){
                                                             $allbet=$allbet*1;

                                                          }
                                                          if(strlen($pb)==24){
                                                             $allbet=$allbet*2;
                                                          }
                                                          if(strlen($pb)==25){
                                                             $allbet=$allbet*3;
                                                          }
                                                          if(strlen($pb)==26){
                                                            $allbet=$allbet*4;

                                                          }



                                                          $alltotal=$alltotal+$allbet;
                                                  }

                                                  $sumall = $incomeall-$expendall;
                                                  if($sumall>=0){
                                                    $sumall="+".$sumall;
                                                  }


                            $messagesx = [
                              'type' => 'text',
                              // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                              'text' => "สรุปยอด รอบที่".$around."\n ▶️ ลค แทงมา ".$totalbet."\n 💰 เจ้ารับ ".$myi1." \n 📤 เจ้าจ่าย ".$myi2." \n 🔹 กำไร(ขาดทุน)/รอบ ".$sumi."\n ************* \n ยอดรวม \n ▶️ ลค แทงมา ".$alltotal."\n 💰 เจ้ารับ ".$incomeall."\n 📤 เจ้าจ่าย ".$expendall." \n 🔹 กำไร(ขาดทุน) รวม ".$sumall
                            ];


                            $url = 'https://api.line.me/v2/bot/message/push';
                            $datax = [
                              'to' => 'C56e01e820787ba9a4723af64f01455b7',
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


        $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
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
                          "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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


                        $uuri = $walletur."webservice.php?operation=query&sessionName=".$swallet."&query=select%20*%20from%20Wallet%20where%20wallet_tks_userid='".$userID."';";
                        $uresponse = \Httpful\Request::get($uuri)->send();

                        $myid = $uresponse->body->result[0]->id;

                        if($myid<2){

                          $curl = curl_init();

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://redfoxdev.com/vtiger/webservice.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"walletno\": \"\",\n            \"wallet_tks_userid\": \"$userID\",\n            \"wallet_tks_balance\": \"0\",\n            \"wallet_tks_status\": \"0\",\n            \"wallet_tks_key\": \"\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-14 07:01:30\",\n            \"modifiedtime\": \"2018-03-14 07:01:30\",\n            \"id\": \"55x1281\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nWallet\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                              "cache-control: no-cache",
                              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                              "postman-token: 3812dfcb-e865-6431-bfa2-97a04220f6f0"
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

      else if(strtoupper($text) == "EDDDDSDSD"){

              $messages = [
                'type' => 'text',
                'text' =>  "สรุปผล ณ เวลา ".date("d-m-Y H:i:s")."\nรายรับ : ".$allincome."\nรายจ่าย : ".$allexpend."\nยอดถอน : 0 \nยอดฝาก : 0"
              ];
      }
      else if(strtoupper($context) == "OP" && strlen($text)==2 && strcmp($adminID,$userID) == 0){



          if(strcmp($adminID,$userID) == 0 && $onop == 0){

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


                  }


                }
            }


        $messages = [
          'type' => 'text',
          'text' => 'เกมกำลังเริ่มรอบแรกเตรียมตัว ...'
        ];


      } else {
        $messages = [
          'type' => 'text',
          'text' => 'ไม่สามารถเปิดเกมซ้ำได้'
        ];
      }


      }


      else if(strtoupper($ttrdtext) == "END" && strlen($text)==3 && strcmp($adminID,$userID) == 0){


          if(strcmp($adminID,$userID) == 0 && $onop ==1 && $gameStatus==0){

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

                          $curl = curl_init();

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => "http://redfoxdev.com/newbackend/webservice.php",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"operation\"\r\n\r\ncreate\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"sessionName\"\r\n\r\n636dbd215a9cebe09e04e\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"element\"\r\n\r\n        {\n            \"partlogno\": \"\",\n            \"partlog_tks_part\": \"$gamepart\",\n            \"partlog_tks_allround\": \"$gameround\",\n            \"partlog_tks_income\": \"$adminincome\",\n
                              \"partlog_tks_expend\": \"$adminexpend\",\n            \"partlog_tks_date\": \"$cdate\",\n            \"partlog_tks_time\": \"$ctime\",\n            \"assigned_user_id\": \"19x1\",\n            \"createdtime\": \"2018-03-06 04:02:40\",\n            \"modifiedtime\": \"2018-03-06 04:02:40\",\n            \"id\": \"40x24\"\n        }\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"elementType\"\r\n\r\nPartlog\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                            CURLOPT_HTTPHEADER => array(
                              "cache-control: no-cache",
                              "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                              "postman-token: 7163493b-3d4e-9c63-5e87-e18427676c01"
                            ),
                          ));

                          $response = curl_exec($curl);
                          $err = curl_error($curl);

                          curl_close($curl);

                          if ($err) {
                            echo "cURL Error #:" . $err;
                          } else {

                            $dpx=0;
                            $wdx=0;

                            $quri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Partlog%20where%20partlog_tks_part=%27".$gamepart."%27;";
                            $qresponse = \Httpful\Request::get($quri)->send();
                            $myi1 = $qresponse->body->result[0]->partlog_tks_income;
                            $myi2 = $qresponse->body->result[0]->partlog_tks_expend;
                            $myi3 = $qresponse->body->result[0]->partlog_tks_allround;
                            $myi3=$myi3-1;

                            $xquri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Alltransaction%20where%20alltransaction_tks_comment=%27".$gamepart."%27;";
                            $xresponse = \Httpful\Request::get($xquri)->send();

                            $datar = json_decode($xresponse,true);

                            foreach($datar["result"] as $itemx) {
                                $isd = $itemx['alltransaction_tks_isd'];
                                $isw = $itemx['alltransaction_tks_isw'];

                                if($isd>0){
                                  $dpx = $dpx+$itemx['alltransaction_tks_balance'];

                                }
                                if($isw>0){
                                  $wdx = $wdx+$itemx['alltransaction_tks_balance'];
                                }

                              }

                              $sumi = $myi1-$myi2;
                              if($sumi>=0){
                                $sumi="+".$sumi;
                              }

                              $totaluri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tbetlog%20Where%20tbetlog_tks_part=%27".$gamepart."%27;";
                              $totalresponse = \Httpful\Request::get($totaluri)->send();


                                  $datatotal = json_decode($totalresponse,true);

                                  $alltotal = 0;



                                         foreach ($datatotal ["result"] as $valuetotal) {

                                                 $allbet = $valuetotal['tbetlog_tks_bet'];
                                                 $pb = $valuetotal['tbetlog_tks_playerbet'];

                                                 if(strlen($pb)==23){
                                                    $allbet=$allbet*1;

                                                 }
                                                 if(strlen($pb)==24){
                                                    $allbet=$allbet*2;
                                                 }
                                                 if(strlen($pb)==25){
                                                    $allbet=$allbet*3;
                                                 }
                                                 if(strlen($pb)==26){
                                                   $allbet=$allbet*4;

                                                 }



                                                 $alltotal=$alltotal+$allbet;
                                         }

                                         $cashd = $dpx-$wdx;
                                         $cashx = $cashd+500;


                            $messagesx = [
                              'type' => 'text',
                              // 'text' => 'แทงผู้เล่น'.$player.'จำนวน'.$money.'ชื่อผู้เล่น'.$username.'ยอดคงเหลือ'.$balance.'vid:'.$vid
                              'text' => "สรุปยอด เกมที่".$gamepart."\n จำนวนรอบทั้งหมด ".$myi3."\n ▶️ ลค แทงมา".$alltotal."\n 💰 เจ้ารับ ".$myi1." \n 📤 เจ้าจ่าย ".$myi2."\n 🔹 กำไร(ขาดทุน) ".$sumi." \n\n 🔵 ฝากเงิน ".$dpx." \n 🔴 ถอนเงิน ".$wdx." \n 💎 บัญชีเงินสด ".$cashd." \n 💎 บัญชีเครดิตคงเหลือ ".$cashx
                            ];


                            $url = 'https://api.line.me/v2/bot/message/push';
                            $datax = [
                              'to' => 'C56e01e820787ba9a4723af64f01455b7',
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
              }


        $messages = [
          'type' => 'text',
          'text' => 'จบการเล่นในเกมนี้'
        ];


      } else {

        $messages = [
          'type' => 'text',
          'text' => 'ไม่สมารถปิดเกมซ้ำได้ หรือ สถานะรอบไม่ถูกต้อง'
        ];
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



        if(strcmp($adminID,$userID) == 0){
        }else{

          $uri = $vturl."webservice.php?operation=query&sessionName=".$sidname."&query=select%20*%20from%20Tmember%20where%20tmember_tks_userid='".$userID."';";
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
                "authorization: Bearer pW/W5NUapxZ7PEenbsf3f9Dmw744MH46dhGfL8F/OxcSOCDADbGt/9O3kqYq8hP8v6TR2tMKk/5MlJ3ZGQPqlZbtqVs5FitAXrP3bIqGyBSwzqKJwQC7Bn2dGa7qIRmIbPt7hvzoO5K/3YONdeWxEgdB04t89/1O/w1cDnyilFU=",
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
                        'text' =>  $username.' ID คือ '.$vid.'💰 ยอดเงินคงเหลือ '.$balance
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

                  if($gameStatus ==0 && $onop == 1){


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


                    $messages = [
                      'type' => 'text',
                      'text' => 'เริ่มรอบที่ # '.$cround
                    ];



                  }else if ($gameStatus == 1){




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
                        'to' => 'C598858ae557caf00e1ec43dee4d9a699',
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
                      'text' => 'รอบยังไม่จบโดยสมบูรณ์โปรดเช็คสถานะการสรุปผล หรือเปิด ปิด เกมไม่ถูกต้อง'
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
