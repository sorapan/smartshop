$(function(){

    var $all_price = $('#all_price');
    var $itemprice = $('#item_price');
    var radio_val = parseInt($('input[name=howtosend]:checked').val());

    $all_price.html(radio_val+ parseInt($itemprice.html()));
    $(document).on('click','input[name=howtosend]',function(){
        var $item_price = parseInt($('#item_price').html());
        radio_val = parseInt($(this).val());
        $all_price.html($item_price+radio_val);
    });

//===================================================================

    $(document).on('click','input[name=address]',function(){
        var $newaddress = $('#new_address');
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
        var type_address = $('input[name=address]:checked').val();
        var address = $('#new_address').val();
        var price = $('#all_price').html();
        var sendby = $('input[name=howtosend]:checked').val();
        sendby == 100 ? sendby = 'ems' : sendby = 'none';

        $.ajax({
            url:$.autoFindDir('takeitem/boughtit').url,
            type:'POST',
            data:{
                'type_address':type_address,
                'address':address,
                'price':price,
                'sendby':sendby
            },
//            dataType:'JSON',
            success:function(data){

//               location = $.autoFindDir('takeitem/takebasket').url;

//                console.log(data);
                location.reload();




            }
        });


    });

});