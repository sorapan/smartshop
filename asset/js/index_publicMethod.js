(function($){

    $.autoFindDir = function(url){

        var path = location.pathname.split("/");
        var urlsplit = url.split("/");
        if(path.length >= 3) for(var z=0;z<path.length-3;z++) url = "../"+url;
        return {

            url:        url,
            product:    urlsplit[0],
            baseurl:    location.hostname+'/'+path[1]

        };
    };

    $.fetch_inbasket = function(){

        $.ajax({
            url:$.autoFindDir('basket/inbasket').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){
                var $in_basket = $('#in_basket');
                if(data[0] !== "basket_empty"){
                    $in_basket.html('');
                    var close_button;
                    !data[0]['non-close'] ? close_button = '<button class="close close-sm delete_basket_item"><span>&times;</span></button>' : close_button = '';

                    if(data[0]['promotion_id'] == null){

                        for(var q in data){
                            $in_basket.append('<div class="col-md-12 basket_list"><div class="row">' +
                                close_button+
                                '<div class="col-md-6 text-overflow">'+data[q].name+'</div> : '+data[q].unit+' ชิ้น '+
                                '<div class="product_id_inbasket hidden">'+data[q].id+'</div>'+
                                '</div></div>');
                        }

                    }else{


                        $in_basket.append('<div class="col-md-12 basket_list"><div class="row">' +
                            close_button+
                            '<div class="col-xs-10">ซื้อโปรโมชั่น : '+data[0]['promotion_name']+'</div>'+
                            '</div></div>');

                    }

                }else{
                    $in_basket.html('');
                }
            }
        });
    };

    $.fetchListData = function fetchListData(){

        $.ajax({
            url:$.autoFindDir('takeitem/itemlist').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){

                if(data.all_price != null){

                    for(var i  in data.basket_data){
                        $('.list_data').html('<li class="list-group-item">'+
                            '<div class="container-fluid">'+
                            '<div class="col-xs-4">'+data.basket_data[i]['name']+'</div>'+
                            '<div style="display:none" class="item_id col-xs-4">'+data.basket_data[i]['id']+'</div>'+
                            '<div class="col-xs-2">'+data.basket_data[i]['unit']+' ชิ้น</div>'+
                            '<div class="col-xs-2">'+data.basket_data[i]['price']+' บาท</div>'+
                            '<button class="close delete_item_list"><span>&times;</span></button>'+
                            '</div>'+
                            '</li>');

                    }
                    $('#item_price').html(data.all_price);
                    var howtosend = $('input[name=howtosend]:checked').val();
                    var $all_price = $('#all_price');
                    if(howtosend == 0){
                        $all_price.html(data.all_price);
                    }else{
                        $all_price.html(parseInt(data.all_price)+100);
                    }
                }else{
                    $('.list_data').html('');
                }
            }
        });
    };

    $.fetch_inbasket_nonmember = function(){

        $.ajax({
            url:'',
            type:'POST',
            data:{

            },
            success:function(){

            }
        })

    }

}(jQuery));
