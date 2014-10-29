$(function(){

var data = [];
var non_member_bought = [];


    $.fetch_inbasket();
//    $.fetch_inbasket_nonmember();
    check_non_member_bought();

    $('.getitem').click(function(e){

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
        $("#addtobasket_img").html('<img class="img-responsive" style="width: 500px;" src="'+img+'">');
        $("#addtobasket_name").html(name);
        $("#addtobasket_unit").html(price+" บาท");
        $("#addtobasket_price").html(unit+" ชิ้น");

    });

    $('.getdetail').click(function(){


        var grandpa = $(this).parents().eq(3);
        var productid = grandpa.find('.productid').html();
        var name = grandpa.find('.product_name').html();
        var price = grandpa.find('.product_price').html();
        var unit = grandpa.find('.product_unit').html();
        var img = $(this).parents().eq(3).find('img').attr('src');
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


        $("#detail_img").html('<img class="img-responsive" style="width: 500px;" src="'+img+'">');
        $("#detail_name").html(name);
        $("#detail_unit").html(price+" บาท");
        $("#detail_price").html(unit+" ชิ้น");
        $("#detail_detail").html(detail);

    });

    $("#addtobasket").click(function(e){

        e.preventDefault();
        var addunit = $("#add_unit").val();
//        alert(addunit + ' = ' + data.unit);
        if(parseInt(addunit) > data.unit){
            alert('คุณใส่สินค้าเกิน');
        }else{
            if(!isNaN(addunit) && addunit !== "" && addunit.indexOf(" ")){
                data['want'] = addunit;
                sendData(data);
                $('#myModal').modal('hide');
            }else{
                alert('กรอกข้อมูลผิดพลาด');
            }
        }

    });

    $('#addtobasket_nonmember').click(function(e){

        var add_unit = $("#add_unit").val();
        var unit_added = 0;
        var unit_added_chk = false;

//        alert(data.unit);
        if(parseInt(add_unit) > data.unit){

            alert('คุณใส่สินค้าเกิน');

        }else{

            var duplicate = true;

            for(var i in non_member_bought){

                if(non_member_bought[i]['productid'] == data['productid']){
                    non_member_bought[i]['want'] = parseInt(non_member_bought[i]['want'])+parseInt(add_unit);
                    unit_added = non_member_bought[i]['want'];
                    if(unit_added >data.unit){
                        unit_added_chk = true;
                        non_member_bought[i]['want'] -= parseInt(add_unit);
                    }
                    duplicate = false;
                    break;
                }else{
                    duplicate = true;
                }

            }

            if(duplicate == true){
                non_member_bought.push({
                    productid : data['productid'],
                    want : add_unit
                });
            }

            if(!unit_added_chk){
                $.ajax({
                    url: $.autoFindDir('basket/basketnonmember').url,
                    type:'POST',
                    data:{
                        'non_member_bought' :  non_member_bought
                    },
                    success:function(data){

        //                alert(data);
                        location.reload();

                    }
                });
            }else{

                alert('สินค้าคุณเกินแล้ว');

            }

        }

    });

    $(document).on('click','.delete_basket_item_nonmember',function(){

        var a = $(this).parent().find(".product_id_inbasket").html();
        if(confirm('คุณต้องการลบออกจากตะกร้า?')){
            return $.ajax({

                url: $.autoFindDir('basket/deleteiteminbasketnonmember').url,
                type:'POST',
                data:{
                    itemid : a
                },
                success:function(data){
//                    console.log(data);
                    location.reload();

                }
            });
        }else{
            return false;
        }


    });

    $(document).on('click','.delete_basket_item',function(){

        var a = $(this).parent().find(".product_id_inbasket").html();
        if(confirm('คุณต้องการลบออกจากตะกร้า?')){
            return delete_item_inbasket(a);
        }else{
            return false;
        }

    });

    $(document).on('click','.delete_basket_item_promotion',function(){

        var a = $(this).parent().find(".promotion_id_inbasket").html();
//        alert(a);
        if(confirm('คุณต้องการลบออกจากตะกร้า?')){
            return $.ajax({

                url: $.autoFindDir('basket/deleteiteminbasketpromotion').url,
                type:'POST',
                data:{
                    itemid:a
                },
                success:function(data){

                    location.reload();

                }


            });
        }else{
            return false;
        }

    });

    function sendData(data){

        $.ajax({
            url:$.autoFindDir('basket/basket').url,
            type:'POST',
            data:{
                'productid' : data['productid'],
                'want' : data['want']
            },
            success:function(data){
                console.log(data);
                if(data !== null && data !== "" && data.indexOf(' ')) alert(data);
                else $.fetch_inbasket();
            }
        });

    }

    function delete_item_inbasket(itemid){

        $.ajax({
            url: $.autoFindDir('basket/deleteiteminbasket').url,
            type:'POST',
            data:{
                'itemid':itemid
            },
            success:function(){
                $.fetch_inbasket();
                $.fetchListData();
                if(location.pathname == "/peter/takeitem")location.reload();
            }
        });
    }

    function check_non_member_bought(){

        $.ajax({
            url: $.autoFindDir('basket/checknonmemberbought').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){

                if(data != null){

                    for(var i in data){

                        non_member_bought.push(data[i]);

                    }

                }


            }
        });

    }

});
