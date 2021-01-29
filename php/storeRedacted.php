<?php
date_default_timezone_set("America/Los_Angeles");


//Store Redacted Information
$result = StoreRedacted($_POST['card_cvc'],$_POST['card_exp'],$_POST['card_holder'],$_POST['card_number']);//Get info from POST and send to StoreFunction

echo json_encode($result);//Send to Client

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
