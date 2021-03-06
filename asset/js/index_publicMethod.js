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


                    for(var q in data){

                        if(!data[q]['promotion']){

                            $in_basket.append('<div class="col-md-12 basket_list"><div class="row">' +
                                close_button+
                                '<div class="col-md-6 text-overflow">'+data[q].name+'</div> : '+data[q].unit+' ชิ้น '+
                                '<div class="product_id_inbasket hidden">'+data[q].id+'</div>'+
                                '</div></div>');

                        }else{


                            if(close_button != ""){
                                close_button = '<button class="close close-sm delete_basket_item_promotion"><span>&times;</span></button>';
                            }

                            $in_basket.append('<div class="col-md-12 basket_list"  style="height: 70px;line-height: 25px"><div class="row">' +
                                close_button+
                                '<div class="col-md-12">โปรโมชั่น : '+data[q].name+'</div> ' +
                                '<div class="col-md-12"> : '+data[q].unit+' ชิ้น </div> ' +
                                '<div class="promotion_id_inbasket hidden">'+data[q].id+'</div>'+
                                '<div class="promotion_date_inbasket hidden">'+data[q].date+'</div>'+
                                '</div></div>');


                        }

                    }

                }else{
                    $in_basket.html('');
                    $.fetch_inbasket_nonmember();
                }
            }

        });
    };

    $.fetch_inbasket_nonmember = function(){

        $.ajax({
            url: $.autoFindDir('basket/inbasketnonmember').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){

                var $in_basket = $('#in_basket');
                if(data[0] !== "basket_empty"){
                    $in_basket.html('');
                    var close_button;
                    close_button = !data[0]['non-close'] ? '<button class="close close-sm delete_basket_item_nonmember"><span>&times;</span></button>' : close_button = '';


                    for(var q in data){

                        if(!data[q]['promotion']){

                            $in_basket.append('<div class="col-md-12 basket_list"><div class="row">' +
                                close_button+
                                '<div class="col-md-6 text-overflow">'+data[q].name+'</div> : '+data[q].unit+' ชิ้น '+
                                '<div class="product_id_inbasket hidden">'+data[q].id+'</div>'+
                                '</div></div>');

                        }else{

                            if(close_button != ""){
                                close_button = '<button class="close close-sm delete_basket_item_promotion_nonmember"><span>&times;</span></button>';
                            }

                            $in_basket.append('<div class="col-md-12 basket_list"  style="height: 70px;line-height: 25px"><div class="row">' +
                                close_button+
                                '<div class="col-md-12">โปรโมชั่น : '+data[q].name+'</div> ' +
                                '<div class="col-md-12"> : '+data[q].unit+' ชิ้น </div> ' +
                                '<div class="promotion_id_inbasket hidden">'+data[q].id+'</div>'+
                                '<div class="promotion_date_inbasket hidden">'+data[q].date+'</div>'+
                                '</div></div>');


                        }

                    }

                }else{
                    $in_basket.html('');
                }

            }
        });

    };

    $.addcommas_number = function(x){
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    };

    var username = $('.username').html();

    $.unreadMessageChecker = function(){

        $.ajax({

            url:$.autoFindDir('message/checkunread').url,
            type:'POST',
            data:{
                username : username
            },
            success:function(data){

                $('.msgbox_button').html('');
                if(data>0&&data<10)$('.msgbox_button').html('<span class="badge badge-alrt">'+data+'</span>');
                else if(data>=10&&data<50){
                    data = data%10;
                    data = data+'0';
                    $('.msgbox_button').html('<span class="badge badge-alrt">'+data+'+</span>');
                }else if(data>=50){
                    $('.msgbox_button').html('<span class="badge badge-alrt">50+</span>');
                }

            }

        });

    };

}(jQuery));
