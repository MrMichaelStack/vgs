<?php
date_default_timezone_set("America/Los_Angeles");
/*Functions*/

/*
//Receive passed values and process 
//data however is needed and return 
//redacted information
*/
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

/*End Functions*/

/*
//Call function: StoreRedacted()
//Pass Posted Data from the Following KEY VAL
//card_cvc,card_exp,card_holder,card_number
*/
$result = StoreRedacted(
    $_POST['card_cvc'],
    $_POST['card_exp'],
    $_POST['card_holder'],
    $_POST['card_number']
);

echo json_encode($result);//Return a JSON formatted object back to the Client.



