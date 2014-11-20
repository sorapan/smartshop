$(function(){

    $(' .delete_boughtlist').click(function(){

        if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')){

            var boughtlist_id = $(this).parents().eq(1).find('.boughtlist_id').html();
            var user_id = $(this).parents().eq(1).find('.user_id').html();
            var cart_id = $(this).parents().eq(1).find('.cart_id').html();
            var bill_img = $(this).parents().eq(1).find('.bill_img').html();

            $.ajax({
                url: $.autoFindDir('admin/deleteboughtlist').url,
                type:'POST',
                data:{
                    boughtlist_id:boughtlist_id,
                    user_id:user_id,
                    cart_id:cart_id,
                    bill_img:bill_img
                },
                success:function(data){

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
                'userid' : $(this).parents().eq(1).find('.user_id').html(),
                'cartid' : $(this).parents().eq(1).find('.cart_id').html()
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