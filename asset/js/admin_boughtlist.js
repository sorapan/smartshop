$(function(){

    $(document).on('click','.bill_img',function(){

        $(' .modal-body').html('' +
            '<img class="marginbot col-xs-12" src="'+$(this).attr('www')+'"> '+
            '')

    });

    $(document).on('click','.bought_verify',function(){


        if(confirm('คุณต้องการจะยืนยันการซื้อ?')){

            $.ajax({
                url:'boughtverify',
                type:'POST',
                data:{
                    'userid' :  $(this).parents().eq(1).find('.userid').html()
                },
                success:function(data,res,xhr){



                }
            });

        }

    });

    $(document).on('click','.basket_detail',function(){

        var display = $("#modal_basketdata").find(".modal-body");

        display.html('');

        display.append('<table class="table"><thead><tr>' +
            '<th>ชื่อสินค้า</th>' +
            '<th>จำนวน (ชิ้น)</th>' +
            '<th>ราคา (บาท)</th>' +
            '</tr></thead><tbody class="tabledata"></tbody></table>');

        $.ajax({
            url:'basket_detail',
            type:'POST',
            data:{
                'userid' : $(this).parents().eq(2).find('.userid').html()
            },
            dataType:'JSON',
            success:function(data){

                for(var qwe in data){
                    $(".tabledata").append("<tr>"+
                        "<td>"+data[qwe]['productname']+"</td>"+
                        "<td>"+data[qwe]['unit']+"</td>"+
                        "<td>"+data[qwe]['price']+"</td>"+
                    "</tr>");
                }



            }
        });



    });


});
