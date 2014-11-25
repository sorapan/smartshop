$(function(){

    $(document).on('click','.bill_img',function(){

        $(' .modal-body').html('' +
            '<img class="marginbot col-xs-12" src="'+$(this).attr('www')+'"> '+
            '')

    });

    $(document).on('click','.basket_detail',function(){

        var display = $("#modal_basketdata").find(".modal-body");

        display.html('');

        display.append('<table class="table table-bordered"><thead class="bluethead"><tr>' +
            '<th></th>' +
            '<th>ชื่อสินค้า</th>' +
            '<th>จำนวน (ชิ้น)</th>' +
            '<th>ราคา (บาท)</th>' +
            '</tr></thead><tbody class="tabledata"></tbody></table>');

        $.ajax({
            url:'boughtlist/basketdetail',
            type:'POST',
            data:{
                'userid' : $(this).parents().eq(2).find('.userid').html(),
                'cartid' : $(this).parents().eq(1).find('.cartid').html(),
                'bought' : 'N'
            },
            dataType:'JSON',
            success:function(data){

                for(var qwe in data){
                    if(data[qwe]['img'] != null){
                        $(".tabledata").append("<tr>"+
                            "<td><img  style='width:64px' src='productImg/"+data[qwe]['img']+"'></td>"+
                            "<td style='vertical-align: middle'>"+data[qwe]['productname']+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['unit'])+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['price'])+"</td>"+
                            "</tr>");
                    }else{
                        $(".tabledata").append("<tr>"+
                            "<td></td>"+
                            "<td style='vertical-align: middle'>"+data[qwe]['productname']+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['unit'])+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['price'])+"</td>"+
                            "</tr>");
                    }
                }

            }
        });

    });

});