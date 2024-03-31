$('#find').click(function(e){
    e.preventDefault();

    let input_text = $.trim($('.name').val()); 

    $.ajax({
        url:'http://localhost/booking/admin.php',
        method:'GET',
        datatype:'string',
        data:{
            input_text:input_text
        },
        success:function(data){
            $('.card-content').html(data);
        }
    })

})