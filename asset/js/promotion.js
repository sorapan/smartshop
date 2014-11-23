$(function(){

    $('.buy_promotion').click(function(){

        var promotion_name = $(this).parents().eq(1).find('.promotion_name').html();
        var promotion_id = $(this).parents().eq(1).find('.promotion_id').html();
        var promotion_price = $(this).parents().eq(1).find('.promotion_price').html();

//        if(confirm('การซื้อสินค้าแบบโปรโมชั่นจะทำให้สินค้าภายฝนตะกร้าหายไปหมด ต้องการดำเนินการต่อ ใช่หรือไม่?')){

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

//        }

    });

    $('.buy_promotion_nonmember').click(function(){

        var promotion_name = $(this).parents().eq(1).find('.promotion_name').html();
        var promotion_id = $(this).parents().eq(1).find('.promotion_id').html();
        var promotion_price = $(this).parents().eq(1).find('.promotion_price').html();


//        if(confirm('การซื้อสินค้าแบบโปรโมชั่นจะทำให้สินค้าภายฝนตะกร้าหายไปหมด ต้องการดำเนินการต่อ ใช่หรือไม่?')){
//
            $.ajax({

                url:$.autoFindDir('promotion/buypromotionnonmember').url,
                type:'POST',
                data:{
                    'promotion_id' : promotion_id
                },
                success:function(data){

                    location.reload();

                }

            });

//        }

    });

    $('.getdetail_inpromotion').click(function(){


        var grandpa = $(this).parent();
        var productid = grandpa.find('.productid').html();
        var name = grandpa.find('.product_name').html();
        var price = grandpa.find('.product_price').html();
        var unit = grandpa.find('.product_unit').html();
        var img = $(this).parents().eq(1).find('img').attr('src');
        var detail;


        $.ajax({
            url: $.autoFindDir('basket/productdetail').url,
            type:'POST',
            data:{
                'productid':productid
            },
            dataType:'JSON',
            success:function(data){

                $("#detail_detail").html(data[0]['detail']);

            }
        });


        $("#detail_img").html('<img class="img-responsive" style="width:auto;margin:0 auto" src="'+img+'">');
        $("#detail_name").html(name);
        $("#detail_price").html($.addcommas_number(price)+" บาท");
//        $("#detail_unit").html(unit+" ชิ้น");
//        $("#detail_detail").html(detail);

    });

});