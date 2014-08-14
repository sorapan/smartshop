$(function(){

var $getitem = $('.getitem');
var $item_unit = $("#item_buyed_unit");
var $price = $("#item_buyed_price");
var data = [];


    fetch_inbasket();

    $getitem.click(function(e){

        e.preventDefault();

        var grandpa = $(this).parents().eq(2);
        var productid = grandpa.find('.productid').html();
        var name = grandpa.find('.product_name').html();
        var price = grandpa.find('.product_price').html();
        var unit = grandpa.find('.product_unit').html();
        var img = $(this).parents().eq(3).find('img').attr('src');

        data = {
          'name' : name,
          'productid' : productid,
          'price' : price,
          'unit' : unit
        };

        $("#add_unit").val('');
        $("#addtobasket_img").html('<img class="img-responsive" src="'+img+'">');
        $("#addtobasket_name").html(name);
        $("#addtobasket_unit").html(price);
        $("#addtobasket_price").html(unit);

    });

    $("#addtobasket").click(function(e){

        e.preventDefault();
        var addunit = $("#add_unit").val();
        if(!isNaN(addunit) && addunit !== "" && addunit.indexOf(" ")){
            data['want'] = addunit;
            sendData(data);
        }else{
            alert('กรอกข้อมูลผิดพลาด');
        }

    });

    $(document).on('click','.delete_basket_item',function(e){

        e.preventDefault();
        var a = $(this).parent().find(".product_id_inbasket").html();
        if(confirm('คุณต้องการลบออกจากตะกร้า?')){
            return delete_item_inbasket(a);
        }else{
            return false;
        }


    });

    function sendData(data){

        $.ajax({
            url:'basket/basket',
            type:'POST',
            data:{
                'productid' : data['productid'],
                'want' : data['want']
            },
            success:function(data){
                if(data !== null && data !== "" && data.indexOf(' ')) alert(data);
                else fetch_inbasket();
            }
        });
    }

    function delete_item_inbasket(itemid){

        $.ajax({
            url:'basket/deleteiteminbasket',
            type:'POST',
            data:{
                'itemid':itemid
            },
            success:function(){
                fetch_inbasket();
            }
        });

    }

    function fetch_inbasket(){

        $.ajax({
            url:'basket/inbasket',
            type:'POST',
            dataType:'JSON',
            success:function(data){

                var $in_basket = $('#in_basket');
                $in_basket.html('');
                for(var q in data){

                    $in_basket.append('<div class="col-md-12 basket_list"><div class="row">' +
                        '<button class="close close-sm"><span>&times;</span></button>'+
                        '<div class="col-md-6 text-overflow">'+data[q].name+'</div> : '+data[q].unit+' ชิ้น '+
                        '<div class="product_id_inbasket hidden">'+data[q].id+'</div>'+
                        '</div></div>');

                }
            }
        });
    }


});
