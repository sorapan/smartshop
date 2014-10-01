$(function(){

    var promotion_list = [];
    var hide = false;

    $(document).on('click','.checkproduct',function(){

        var productid = $(this).parents().eq(1).find('.productid').html();
        var productname = $(this).parents().eq(1).find('.productname').html();
        promotion_list.push(productid);
        $('.promotion_list').append('<span class="col-xs-12 row">#<span class="productid">'+productid+'</span> /'+productname+' / '+'<a class="del_from_promotion_list" href="">ลบ</a></span>');

//        console.log(promotion_list);

        hidemenu();

    });

    function hidemenu(){

        if(promotion_list.length == 0){
            $('.menuFromDown').animate({'bottom':'-220px'},300);
        }else{
            $('.menuFromDown').animate({'bottom':0},300);
        }
        if(hide) hide = false;
        else hide = false;

//        console.log(hide);

    }

//    console.log(hide);

    $(document).on('click','.hide_menu',function(){

        if(!hide){
            $('.menuFromDown').animate({'bottom':'-150px'},300);
            hide = true;
        }else{
            $('.menuFromDown').animate({'bottom':0},300);
            hide = false;
        }

//        console.log(hide);

    });

    $(document).on('click','.del_from_promotion_list',function(e){

        e.preventDefault();

        var productid  = $(this).parent().find('.productid').html();
        var key = promotion_list.indexOf(productid);

        promotion_list.splice(key,1);
        $(this).parent().remove();
        hidemenu();


    });

    $(document).on('click','.product_detail',function(e){

        e.preventDefault();
        var thisproductid = $(this).parents().eq(1).find('.productid').html();

        $.ajax({
            url: $.autoFindDir('admin/fetchproductdataforpromotion').url,
            type:'POST',
            data:{
                'productid':thisproductid
            },
            dataType: 'JSON',
            success: function(data){

                if(data[0]['img'] !== ""){

                    $(' #showimg').html('<img class="col-xs-8 col-xs-push-2" src="../productImg/'+data[0]['img']+'">' +
                        '<div style="margin-top:10px" class="col-md-12">');

                }else{

                    $(' #showimg').html(''+
                        '<div class="col-md-4 col-md-push-4" id="uploadimgbox">+</div>' +
                        '<input type="file" class="uploadbyclick hide">'+
                        '');

                }

                $('#name').html(data[0]['name']);
                $('.productid').val(data[0]['id']);
                $('#maintype').html(data[0]['maintype']);
                $('#subtype').html(data[0]['subtype']);
                $('#price').html(data[0]['price']);
                $('#unit').html(data[0]['unit']);
                $('#unitnot').html(data[0]['unitnot']);
                $('#detail').html(data[0]['detail']);

            }

        })


    });

    $('.search_product_textbox').on('keyup',function(){

        $.ajax({
            url: $.autoFindDir('admin/search').url,
            type:'POST',
            data:{
                'word': $(this).val()
            },
            dataType:'JSON',
            success:function(data){

                $('tbody').html('');
                for(var q in data){

                    $('tbody').append('<tr>'+
                        '<td class="productid">'+data[q]['id']+'</td>'+
                        '<td class="productname">'+data[q]['name']+'</td>'+
                        '<td>'+data[q]['price']+'</td>'+
                        '<td>'+data[q]['unit']+'</td>'+
                        '<td><a class="product_detail" data-toggle="modal" data-target="#detailModal">click</a></td>'+
                        '<td><button class="checkproduct btn bluebutton" >เพิ่มในโปรโมชั่น</button>'+
                        '</tr>');

                }

            }
        });

    });

    $(document).on('click','.takepromotion',function(){

        $.ajax({
            url : $.autoFindDir('admin/addpromotion').url,
            type :'POST',
            data :{
                'promotion_list' : promotion_list,
                'name' : $('.promotion_name').val(),
                'price' : $('.promotion_price').val(),
                'detail' : $('.promotion_detail').val()
            },
            success :function(data){

//                alert(data);
                location.reload();

            }
        });
    });
});
