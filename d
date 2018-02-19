$zx=0;

if(substr_count($text, ',')>3){
  $zx=1;
}

if(substr_count($text, '+')>=1){
  $zx=1;
}

if(substr_count($text, '-')>4){
  $zx=1;
}

if(substr_count($text, '*')>=1){
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

if($zx!=1) {




}else{
  $messages = [
    'type' => 'text',
    'text' =>  '❌ รูปแบบการสรุปผลไม่ถูกต้อง ❌ ตัวอย่าง S1-1,2-1,3-1,4-1 (+2 +1 +0 -1 -2)'
  ];
  }
