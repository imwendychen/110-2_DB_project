var start = 0;
var limit = 5;
var reachedMax = false; 

$(window).scroll(function(){
    if($(window).scrollTop() >= $(document).height() - $(window).height()){
        getData();
    }
});

$(document).ready(function(){
    getData();
});

function getData() {
    if(reachedMax)
       return;
    $.ajax({
        url:'get_data.php',
        method:'POST',
        type:'text',
        data:{
            getData:1,
            start: start,
            limit: limit,
        },
        success: function(response){
            
            if(response == "reachedMax"){
                reachedMax = false;
            }else{
                start = start + limit;
                $(".info").append(response);
            }
        }
    });
}
