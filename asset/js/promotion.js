$(function(){

    $('.buy_promotion').click(function(){

        var promotion_name = $(this).parents().eq(1).find('.promotion_name').html();
        var promotion_id = $(this).parents().eq(1).find('.promotion_id').html();
        var promotion_price = $(this).parents().eq(1).find('.promotion_price').html();

        if(confirm('การซื้อสินค้าแบบโปรโมชั่นจะทำให้สินค้าภายฝนตะกร้าหายไปหมด ต้องการดำเนินการต่อ ใช่หรือไม่?')){

            $.ajax({

                url:$.autoFindDir('promotion/buypromotion').url,
                type:'POST',
                data:{
                    'promotion_id' : promotion_id
                },
                success:function(data){

                    location.reload();

                }

            });

        }

    });

});