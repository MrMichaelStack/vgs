function StoreRedacted(rdata=null,debug=false){
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


$(document).ready(function(){
    $('.BTN').on("click",function(){
        switch(this.id){
            case "ButtonRemoveRedaction":
                var data ={
                    card_holder:$('#InputCH').val(),
                    card_number:$('#InputCN').val(),
                    card_exp:$('#InputCEXP').val(),
                    card_cvc:$('#InputCCVC').val() 
                }
                RemoveRedaction(data,true);
            break;

        }
    });

});