$(function(){

    $('.deletepromotion').click(function(){

        if(confirm('ลบโปรโมชั่นนี้')){
            var promotionid = $(this).parents().eq(1).find('.promotionid').html();
            $.ajax({
                url: $.autoFindDir('admin/deletepromotion').url,
                type:'POST',
                data:{
                    promotionid:promotionid
                },
                success:function(data){

                    location.reload();

                }
            });
        }

    });

    $('.editpromotion').click(function(){

        var promotionid = $(this).parents().eq(1).find('.promotionid').html();

        $.ajax({

            url: $.autoFindDir('admin/fetchpromotiondata').url,
            type:'POST',
            data:{
                promotionid:promotionid
            },
            dataType:'JSON',
            success:function(data){

                $('.editdetail').html(data[0]['detail']);
                $('.editpromotionid').html(data[0]['id']);

            }
        });
    });

    $('.editthispromotion').click(function(){

        var data_detail = $(this).parents().eq(1).find('.editdetail').html();
        var data_id = $(this).parents().eq(1).find('.editpromotionid').html();

        $.ajax({

            url: $.autoFindDir('admin/editproduct').url,
            type:'POST',
            data:{
                id:data_id,
                detail:data_detail
            },
            success:function(data){

                location.reload();

            }

        });

    });

});