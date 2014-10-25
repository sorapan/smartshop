$(function(){

    $(' .sendmessage').click(function(){

        var msg = $(this).parent(1).find('.message').val();
        var ind = msg.indexOf(' ');
        if( ind !== -1){

            $.ajax({
                url: $.autoFindDir('message/send').url,
                type:'POST',
                data:{
                    message: msg
                },
                success:function(data){

                    alert('ส่งข้อความสำเร็จ');
                    location.reload();

                }
            });

        }else{
            alert('ข้อความว่างเปล่า');
        }

    });

});