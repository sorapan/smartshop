$(function(){

    $(document).on('click','.bill_img',function(){

        $(' .modal-body').html('' +
            '<img class="marginbot col-xs-12" src="'+$(this).attr('www')+'"> '+
            '')

    });

    $(document).on('click','.bought_verify',function(){


//        alert($(this).parents().eq(1).find('.userid').html());

        if(confirm('คุณต้องการจะยืนยันการซื้อ?')){

            $.ajax({
                url:'boughtverify',
                type:'POST',
                data:{
                    'userid' :  $(this).parents().eq(1).find('.userid').html(),
                    'cartid' :  $(this).parents().eq(1).find('.cartid').html()
                },
                success:function(data,res,xhr){

                    location.reload();

                }
            });

        }

    });

    $(document).on('click','.basket_detail',function(){

        var display = $("#modal_basketdata").find(".modal-body");

        display.html('');

        display.append('<div class="userdetail"></div><table class="table"><thead class="bluethead"><tr>' +
            '<th>ชื่อสินค้า</th>' +
            '<th>จำนวน (ชิ้น)</th>' +
            '<th>ราคา (บาท)</th>' +
            '</tr></thead><tbody class="tabledata"></tbody></table>');

        $.ajax({
            url: $.autoFindDir('admin/basket_detail').url,
//            url: $.autoFindDir('boughtlist/basketdetail').url,
            type:'POST',
            data:{
                'userid' : $(this).parents().eq(1).find('.userid').html(),
                'cartid' : $(this).parents().eq(1).find('.cartid').html()
            },
            dataType:'JSON',
            success:function(data){

                $('.userdetail').append('<div style="line-height:1px;font-size:12px" class="form-horizontal marginbot">' +
                    '<div class="form-group"><label class="control-label col-xs-3">ชื่อ </label>'+
                    '<div class="col-xs-7"><p class="form-control-static">'+data['user_realname']+'</p></div></div>' +
                    '<div class="form-group" style="line-height:20px;"><label class="control-label col-xs-3">ที่อยู่ </label>'+
                    '<div class="col-xs-7"><p style="word-wrap: break-word;" class="form-control-static">'+data['address']+'</p></div></div>' +
                    '<div class="form-group"><label class="control-label col-xs-3">จังหวัด </label>'+
                    '<div class="col-xs-7"><p class="form-control-static">'+data['province']+'</p></div></div>' +
                    '<div class="form-group"><label class="control-label col-xs-3">รหัสไปรษณีย์ </label>'+
                    '<div class="col-xs-7"><p class="form-control-static">'+data['zipcode']+'</p></div></div>' +
                    '<div class="form-group"><label class="control-label col-xs-3">โทร </label>'+
                    '<div class="col-xs-7"><p class="form-control-static">'+data['tel']+'</p></div></div>' +
                    '</div>');

                for(var qwe in data){
                    if($.isNumeric(qwe)){
                        $(".tabledata").append("<tr>"+
                            "<td>"+data[qwe]['productname']+"</td>"+
                            "<td>"+data[qwe]['unit']+"</td>"+
                            "<td>"+data[qwe]['price']+"</td>"+
                        "</tr>");
                    }
                }



            }
        });



    });


});
