function AJAX(Async=null,Aurl=null,Atype=null,Adata=null,AdataType=null,debug=false){
    if(debug==true){
        alert('AJAX Received Data:' + Adata);
    }
    var result;
    $.ajax({
        async: Async,
        url: Aurl,
        type: Atype,
        data: JSON.parse(Adata),
        dataType: AdataType,
        success: function(data){
            if(debug==true){
                alert('Return from PHP:' + JSON.stringify(data));
            }
            result = data;
        },//end Success function
        error: function(data){
            if(debug==true){
                alert(JSON.stringify(data));
            }
        }

    });
    return result;
}// end AJAX function

function ReturnSucces(data){

}
function ReturnError(data){

}