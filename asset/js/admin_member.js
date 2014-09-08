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

        var $modal = $('#modal_edituser');

        $.ajax({
            url:$.autoFindDir('admin/memberfetchdetail').url,
            type:'POST',
            data:{
                'userid' : $(this).parents().eq(1).find('.userid').html()
            },
            dataType:'JSON',
            success:function(data){

                for(var q in data){

                    $modal.find('.id').html(data[q]['id']);
                    $modal.find('.username').html(data[q]['username']);
                    $modal.find('.password').val(data[q]['password']);
                    $modal.find('.class').val(data[q]['class']);
                    $modal.find('.email').val(data[q]['email']);
                    $modal.find('.realname').val(data[q]['realname']);
                    $modal.find('.lastname').val(data[q]['lastname']);
                    $modal.find('.tel').val(data[q]['tel']);
                    $modal.find('.address').val(data[q]['address']);
                    $modal.find('.province').val(data[q]['province']);
                    $modal.find('.zipcode').val(data[q]['zipcode']);

                }

            }
        });

    });

    $(document).on('click','.ok_edit',function(){


//        $('#modal_edituser').modal('hide');

        var $modal = $('#modal_edituser');

        $.ajax({
            url:$.autoFindDir('admin/editmember').url,
            type:'POST',
            data:{
                'id' : $modal.find('.id').html(),
                'password': $modal.find('.password').val(),
                'class': $modal.find('.class').val(),
                'email': $modal.find('.email').val(),
                'realname': $modal.find('.realname').val(),
                'lastname': $modal.find('.lastname').val(),
                'tel': $modal.find('.tel').val(),
                'address': $modal.find('.address').val(),
                'province': $modal.find('.province').val(),
                'zipcode': $modal.find('.zipcode').val()
            },
            success:function(data){

                location.reload();

            }
        })

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