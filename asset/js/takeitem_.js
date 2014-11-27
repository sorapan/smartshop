$(function(){

    var $all_price = $('.all_price');
    var $ems_msg = $('.ems_msg');
    var $itemprice = $('#item_price');
    var radio_val = parseInt($('input[name=howtosend]:checked').val());

    $all_price.html($.addcommas_number(radio_val+ parseInt($itemprice.html())));
    $(document).on('click','input[name=howtosend]',function(){
        var $item_price = parseInt($('#item_price').html());
        radio_val = parseInt($(this).val());
        $all_price.html($.addcommas_number($item_price+radio_val));
        if(radio_val == "100")$ems_msg.html('( + ค่าส่ง EMS)');
        else $ems_msg.html('');
    });

//===================================================================

    $(document).on('click','input[name=address]',function(){
        var $newaddress = $('.lockinput');
        $newaddress.val('');
        if($(this).val() == 'new_addresss'){
            $newaddress.prop("disabled",false);
        }else{
            $newaddress.prop("disabled",true);
        }
    });

//===================================================================

    $(document).on('click',".delete_item_list",function(e){

        var itemid = $(this).parent().find('.item_id').html();

        if(confirm('คุณต้องการลบออกจากรายการ?')){

            $.ajax({
                url:$.autoFindDir('basket/deleteiteminbasket').url,
                type:'POST',
                data:{
                    'itemid':itemid
                },
                success:function(){

                    $.fetch_inbasket();
                    $.fetchListData();
                    location.reload();

                }
            });

        }
    });

    $(document).on('click',".delete_item_list_promotion",function(e){

        var itemid = $(this).parent().find('.item_id').html();
        var itemdate = $(this).parent().find('.item_date').html();

        if(confirm('คุณต้องการลบออกจากรายการ?')){

            $.ajax({
                url:$.autoFindDir('basket/deleteiteminbasketpromotion').url,
                type:'POST',
                data:{
                    'itemid':itemid,
                    'itemdate':itemdate
                },
                success:function(){

                    $.fetch_inbasket();
                    $.fetchListData();
                    location.reload();

                }
            });

        }
    });

//===================================================================

    $(document).on('click','#buy_it_now',function(e){

        e.preventDefault();
        var user_realname = $('.user_realname').val();
        var tel = $('.tel').val();
        var province = $('.province').val();
        var zipcode = $('.zipcode').val();
        var type_address = $('input[name=address]:checked').val();
        var address = $('.new_address').val();
        var price = $('.all_price').html();
        var sendby = $('input[name=howtosend]:checked').val();
        sendby = sendby == 100 ? 'ems' : 'none' ;

            if(
                type_address == "new_addresss" &&
                user_realname != "" &&
                tel != "" &&
                province != "" &&
                zipcode != "" &&
                address != "" &&
                price != ""
            ){

                $.ajax({
                    url:$.autoFindDir('takeitem/boughtit').url,
                    type:'POST',
                    data:{
                        type_address:type_address,
                        user_realname:user_realname,
                        tel:tel,
                        province:province,
                        zipcode:zipcode,
                        address:address,
                        price:price,
                        sendby:sendby
                    },
                    success:function(data){

        //               location = $.autoFindDir('takeitem/takebasket').url;
        //               console.log(data);

                        location.reload();

                    }
                });

            }else if( type_address == "profile_address"){

                $.ajax({
                    url:$.autoFindDir('takeitem/boughtit').url,
                    type:'POST',
                    data:{
                        type_address:type_address,
                        user_realname:user_realname,
                        tel:tel,
                        province:province,
                        zipcode:zipcode,
                        address:address,
                        price:price,
                        sendby:sendby
                    },
                    success:function(data){

                        location.reload();

                    }
                });

            }else{

                alert('กรอกข้อมูลไม่ครบถ้วน');

            }


    });

});

$(document).on('blur','.ubn',function(){

    var basketid = $(this).parents().eq(1).find('.item_id').html();
    var thisval = $('.unit_basket_'+basketid+'').val();

    $.ajax({
        url: $.autoFindDir('basket/basketeditunit').url,
        type:'POST',
        data:{
            itemid:basketid,
            unit:thisval
        },
        success:function(data){

            location.reload();

        }
    })

});