$(function(){

    var $modal = $("#modal_userdetail");
    $('.userdetail').click(function(){

        $.ajax({
            url: $.autoFindDir('admin/memberfetchdetail').url,
            type:'POST',
            data:{
                'userid' : $(this).parents().eq(1).find('.userid').html()
            },
            dataType:'JSON',
            success:function(data){

                for(var q in data){

                    $modal.find('.header_username').html('รายละเอียดสมาชิก : '+data[q]['username']);
                    $modal.find('.id').html(data[q]['id']);
                    $modal.find('.username').html(data[q]['username']);
                    $modal.find('.password').html(data[q]['password']);
                    $modal.find('.class').html(data[q]['class']);
                    $modal.find('.email').html(data[q]['email']);
                    $modal.find('.realname').html(data[q]['realname']);
                    $modal.find('.lastname').html(data[q]['lastname']);
                    $modal.find('.tel').html(data[q]['tel']);
                    $modal.find('.address').html(data[q]['address']);
                    $modal.find('.province').html(data[q]['province']);
                    $modal.find('.zipcode').html(data[q]['zipcode']);

                }

            }
        });

    });

    $('.edit_button').click(function(){

        var userid = $(this).parents().eq(1).find('.userid').html();

        $.ajax({
            url:$.autoFindDir('admin/editmember').url,
            type:'POST',
            data:{
                'userid' : userid
            },
            success:function(data){

            }
        });

    });

    $('.del_button').click(function(){

        var userid = $(this).parents().eq(1).find('.userid').html();
        if(confirm('คุณต้องการลบบัญชีสมาชิกนี้ ใช้หรือไม่')){

            $.ajax({
                url:$.autoFindDir('admin/deletemember').url,
                type:'POST',
                data:{
                    'userid' : userid
                },
                success:function(data){
                    location.reload();
                }
            });

        }

    });

});