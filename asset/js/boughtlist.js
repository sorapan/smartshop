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
            '<th>จำนวน</th>' +
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

                var inpromotion = "";

                for(var qwe in data){
                    if(data[qwe]['img'] != null){
                        $(".tabledata").append("<tr>"+
                            "<td><img  style='width:64px' src='productImg/"+data[qwe]['img']+"'></td>"+
                            "<td style='vertical-align: middle'>"+data[qwe]['productname']+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['unit'])+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['price'])+"</td>"+
                            "</tr>");
                    }else{

                        console.log(data[qwe]['inpromotion']);
                        inpromotion += "<tr id='demo' class='collapse'><td colspan='4'>";
                        for(var ii in data[qwe]['inpromotion']){

                            inpromotion += '<div class="media"><div class="pull-left">'+
                                '<img style="width: 64px" src="http://'+$.autoFindDir('boughtlist').baseurl+'/productImg/'+data[qwe]["inpromotion"][ii]["img"]+'"'+'></div>';
                            inpromotion += ' <div class="media-body"><h4 class="media-heading">'+data[qwe]["inpromotion"][ii]["name"]+'</h4>';
                            inpromotion += '<p>จำนวน '+data[qwe]["inpromotion"][ii]["unit"]+' ชิ้น</p></div>';

                        }
                        inpromotion += "</tr></td>";

                        $(".tabledata").append("<tr>"+
                            "<td>" +
                            "<button class='btn btn-sm whitebutton' data-toggle='collapse' data-target='#demo'>รายละเอียด &#9660;</button>" +
                            "</td>"+
                            "<td style='vertical-align: middle'>"+data[qwe]['productname']+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['unit'])+"</td>"+
                            "<td style='vertical-align: middle'>"+$.addcommas_number(data[qwe]['price'])+"</td>"+
                            "</tr>"+
                            inpromotion);
                    }
                }

            }
        });

    });

});