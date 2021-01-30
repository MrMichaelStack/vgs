

// Add Redaction function
// Set options and data to send to php server
// Place returned data in results text boxes.
function StoreRedacted(rdata=null,debug=null){
    if(debug==true){
        alert("Function 'StoreRedacted' rdata: " + JSON.parse(rdata));
    }
    var AUrl='php/storeRedacted.php';
    var ASync= false;
    var AType='POST';
    var ADataType="json";
    var AData = JSON.parse(rdata); 
    try{
        var res = AJAX(ASync,AUrl,AType,AData,ADataType,debug);
        if(debug==true){
            alert("Result" + JSON.stringify(res));
        }
        $('#InputCH').val(res.card_holder);
        $('#InputCN').val(res.card_number);
        $('#InputCEXP').val(res.card_exp);
        $('#InputCCVC').val(res.card_cvc);
    }catch(e){
        alert(e);
    } 
    
}

// Remove Redaction function
// Set options and data to send to php server
// Place returned data in results text boxes.
function RemoveRedaction(rdata=null,debug=false){
    if(debug==true){
        alert("Function 'RemoveRedacted' data: " + JSON.stringify(rdata));
    }
    var AUrl='php/removeRedacted.php';
    var ASync= false;
    var AType='POST';
    var ADataType="json";
    var AData = JSON.stringify(rdata); 

    try{
        var res = AJAX(ASync,AUrl,AType,AData,ADataType,debug);
        if(debug==true){
            alert("Remove Redaction Result" + JSON.stringify(res,null,4));
        }
        $('#RMInputCHClear').val(res.json.card_holder);
        $('#RMInputCNClear').val(res.json.card_number);
        $('#RMInputCEXPClear').val(res.json.card_exp);
        $('#RMInputCCVCClear').val(res.json.card_cvc);
    }catch(e){
        alert(e);
    } 
}

//Create an event listener for the button event
// on.Click for the reveal html.
// grab the informatino from the input boxes to 
// send to vgs echo server
$(document).ready(function(){
    $('.BTN').on("click",function(){
        switch(this.id){
            case "ButtonRemoveRedaction":
                var data ={
                    card_holder:$('#RMInputCH').val(),
                    card_number:$('#RMInputCN').val(),
                    card_exp:$('#RMInputCEXP').val(),
                    card_cvc:$('#RMInputCCVC').val() 
                }
                RemoveRedaction(data,false);
            break;

        }
    });

});