$(function(){


    $('.view-msg-button').click(function(){

        var msg_id = $(this).parents().eq(1).find('.msg_id').html();

        $.ajax({
            url: $.autoFindDir('admin/fetchmessage').url,
            type:'POST',
            data:{
                msg_id : msg_id
            },
            dataType:'JSON',
            success:function(data){

                $('.user_send_view').html(data[0]['user_name']);
                $('.message_view').html(data[0]['message']);

            }
        })

    });

    var replydata = {};

    $('.reply-button').click(function(){

        replydata.msg_id = $(this).parents().eq(1).find('.msg_id').html();
        replydata.user_name = $(this).parents().eq(1).find('.user_name').html();
        replydata.user_id = $(this).parents().eq(1).find('.user_id').html();
        $('.sendto').html(replydata.user_name);

    });

    $('.sendmsg').click(function(){

        $.ajax({
            url: $.autoFindDir('admin/adminreply').url,
            type:'POST',
            data:{
                to : replydata.user_id,
                msg : $(this).parents().eq(1).find('.msgreply').val()
            },
            success:function(data){

                location.reload();

            }
        });

    });



});