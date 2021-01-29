<?php
date_default_timezone_set("America/Los_Angeles");


//Store Redacted Information
$result = StoreRedacted($_POST['card_cvc'],$_POST['card_exp'],$_POST['card_holder'],$_POST['card_number']);//Get info from POST and send to StoreFunction
echo json_encode($_POST);

//echo json_encode($result);//Send to Client

function StoreRedacted($card_cvc=null,$card_exp=null,$card_holder=null,$card_number=null){
    //do what ever you need to do for storage.... 
        $dbres['Store_Status'] = 1;
        $dbres['ErrorMsg']     = null;
        $dbres['card_cvc']     = $card_cvc;
        $dbres['card_exp']     = $card_exp;
        $dbres['card_holder']  = $card_holder;
        $dbres['card_number']  = $card_number;
    
    return $dbres;//Return Results
}
$url = 'https://echo.apps.verygood.systems/post';
$data = json_encode(array('account_number' => 'ALIAS'));
$proxy = 'http://tnthgey3yhb.SANDBOX.verygoodproxy.com:8080';
$proxyauth = 'USERNAME:PASSWORD';
$certpath = 'path/to/sandbox.pem';

$cURL = curl_init();
$options = array(
  CURLOPT_URL => $url,
  CURLOPT_PROXY => $proxy,
  CURLOPT_PROXYUSERPWD => $proxyauth,
  CURLOPT_FOLLOWLOCATION => 1,
  CURLOPT_POSTFIELDS => $data,
  CURLOPT_HTTPHEADER => array (
    'Accept: application/json',
    'Content-Type: application/json'
  ),
  CURLOPT_SSL_VERIFYPEER => true,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CAINFO => $certpath,
  CURLOPT_POST => true
);

curl_setopt_array($cURL, $options);
$result = curl_exec($cURL);
$errors = curl_error($cURL);
curl_close($cURL);

echo $result;
echo $errors;