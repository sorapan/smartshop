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

});