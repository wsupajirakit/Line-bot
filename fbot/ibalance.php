<?php
  $url = 'https://api.line.me/v2/bot/message/push';

  $data = {
               "to": "Ccab41b434c5bffb33de6b56baa03f642",
               "messages":[
                    {
                         "type":"text",
                         "text":"Hello, user"
                    },
                    {
                         "type":"text",
                         "text":"May I help you?"
                    }
                ]
              };

  /*$data = array(
        'fn' => "login"
    );*/


  try{
    $ch = curl_init();
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
    curl_setopt( $ch, CURLOPT_POST, true );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
    "authorization: Bearer QyHSaarki7OaukcmDqWBZJD88fJb5N4evyOobmL7QyJOPpfV9YQz+gDgIvGXVXAEU6ouir3bOeDcpShjwTOJib4P6jWHYh31pVMM2CAwUeVFq5PVGR/AHd5Ze80zm5YFBcjYGRUDqMHIDs9qSaLzLQdB04t89/1O/w1cDnyilFU=",
    "cache-control: no-cache",
    "postman-token: 171d827a-bfb1-625a-03ae-5f59427c61bd"
  ));
    $content = curl_exec( $ch );
    curl_close($ch);

    print_r($content);

  }catch(Exception $ex){

    echo $ex;
  }

?>
