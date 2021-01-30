<?php
date_default_timezone_set("America/Los_Angeles");

/*
//Receive passed values and process 
//data however is needed and return 
//redaction cleared information
*/
function RemoveRedacted($card_cvc=null,$card_exp=null,$card_holder=null,$card_number=null){
  include_once '../env.php';

  $url = $_ENV['url'];
  $proxy = $_ENV['proxy'];
  $proxyauth = $_ENV['User_Name'].':'.$_ENV['Password'];
  $certpath = $_ENV['certpath'];
  $data = json_encode(
    array(
      'card_cvc' => $card_cvc,
      'card_exp' => $card_exp,
      'card_holder' => $card_holder,
      'card_number' => $card_number
    )
  );

/*Un-edited code from VGS*/
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
/*End of Un-edited code from VGS*/

  if($errors){
    return $errors;
  }else{
    return $result;//Return Results
  }
    
}

/*
//Call function: RemoveRedacted()
//Pass Posted Data from the Following KEY VAL
//card_cvc,card_exp,card_holder,card_number
*/
$result = RemoveRedacted(
  $_POST['card_cvc'],
  $_POST['card_exp'],
  $_POST['card_holder'],
  $_POST['card_number']
);

echo $result;//Return a JSON formatted object back to the Client.







