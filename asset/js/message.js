$(function(){

    $(' .sendmessage').click(function(e){

        e.preventDefault();
        var msg = $(this).parent(1).find('.message').val();
        var ind = msg.indexOf(' ');

        if( msg !== ""){

            $.ajax({
                url: $.autoFindDir('message/send').url,
                type:'POST',
                data:{
                    message: msg
                },
                success:function(data){

                    alert('ส่งข้อความสำเร็จ');


                },
                complete:function(){

                    location.reload();

                }
            });

        }else{

            alert('ข้อความว่างเปล่า');

        }

    });

    var username = $('.username').html();
    readedTrigger();

    function readedTrigger(){

        $.ajax({
            url: $.autoFindDir('message/readtrigger').url,
            type:'POST',
            data:{
                username:username
            },
            success:function(){

                $.unreadMessageChecker();

            }
        });

    }

});