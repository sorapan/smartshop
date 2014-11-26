$(function(){

    $(document).on('click','.delete_boughtlist',function(){

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

    $(document).on('click','.show_list',function(e){

        var thisval = $(this).val();
        var $show_data_list = $('.show_data_list');

        $.ajax({
            url: $.autoFindDir('admin/boughtcheckerData').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){

                $show_data_list.html('');

                switch(thisval){

                    case '1':

                        for(var z in data){

                            var color;
                            var del_button = '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>';

                            if((data[z]['cash'] == null && data[z]['verified'] == 'N')){
                                color = 'black';
                            }else if((data[z]['cash'] != null && data[z]['verified'] == 'N')){
                                color = 'orange';
                            }else if((Math.floor((data[z]['timetime'] - data[z]['date'])/86400) > 7 && data[z]['cash'] == null)){
                                color = 'red';
                            }
                            else if(((data[z]['cash'] != null && data[z]['verified'] == 'Y'))){
                                color = 'green';
                                del_button = '';
                            }

                            $show_data_list.append('<tr>' +
                                '<td class="boughtlist_id">'+data[z]['id']+'</td>'+
                                '<td>'+data[z]['username']+'</td>'+
                                '<td class="hidden user_id">'+data[z]['user']+'</td>'+
                                '<td class="hidden cart_id">'+data[z]['date']+'</td>'+
                                '<td class="hidden bill_img">'+data[z]['cash_img']+'</td>'+
                                '<td>'+data[z]['price']+'</td>'+
                                '<td>'+(data[z]['sendby']=="none"?"รับด้วยตัวเอง":"ส่ง EMS")+'</td>'+
                                '<td><span style="color:'+color+'">'+(data[z]['verified']=='Y'?'ใช่':'ไม่')+'</span></td>'+
                                '<td><span style="color:'+color+'">'+Math.floor((data[z]['timetime'] - data[z]['date'])/86400)+' วันที่แล้ว</span></td>'+
                                '<td><span style="color:'+color+'">'+(data[z]['cash']==null?'ยังไม่ได้โอน':'โอนแล้ว')+'</span></td>'+
                                '<td>' +
                                del_button+
                                '<button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button></td>'+
                                '</tr>');
                        }
                        break;

                    case '2':

                        for(var z in data){
                            if((data[z]['cash'] == null && data[z]['verified'] == 'N')){
                            $show_data_list.append('<tr>' +
                                '<td class="boughtlist_id">'+data[z]['id']+'</td>'+
                                '<td>'+data[z]['username']+'</td>'+
                                '<td class="hidden user_id">'+data[z]['user']+'</td>'+
                                '<td class="hidden cart_id">'+data[z]['date']+'</td>'+
                                '<td class="hidden bill_img">'+data[z]['cash_img']+'</td>'+
                                '<td>'+data[z]['price']+'</td>'+
                                '<td>'+(data[z]['sendby']=="none"?"รับด้วยตัวเอง":"ส่ง EMS")+'</td>'+
                                '<td><span style="color:black">'+(data[z]['verified']=='Y'?'ใช่':'ไม่')+'</span></td>'+
                                '<td><span style="color:black">'+Math.floor((data[z]['timetime'] - data[z]['date'])/86400)+' วันที่แล้ว</span></td>'+
                                '<td><span style="color:black">'+(data[z]['cash']==null?'ยังไม่ได้โอน':'โอนแล้ว')+'</span></td>'+
                                '<td>' +
                                '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>' +
                                '<button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button></td>'+
                            '</tr>');
                            }
                        }
                        break;

                    case '3':

                        for(var z in data){
                            if((data[z]['cash'] != null && data[z]['verified'] == 'N')){
                                $show_data_list.append('<tr>' +
                                    '<td class="boughtlist_id">'+data[z]['id']+'</td>'+
                                    '<td>'+data[z]['username']+'</td>'+
                                    '<td class="hidden user_id">'+data[z]['user']+'</td>'+
                                    '<td class="hidden cart_id">'+data[z]['date']+'</td>'+
                                    '<td class="hidden bill_img">'+data[z]['cash_img']+'</td>'+
                                    '<td>'+data[z]['price']+'</td>'+
                                    '<td>'+(data[z]['sendby']=="none"?"รับด้วยตัวเอง":"ส่ง EMS")+'</td>'+
                                    '<td><span style="color:orange">'+(data[z]['verified']=='Y'?'ใช่':'ไม่')+'</span></td>'+
                                    '<td><span style="color:orange">'+Math.floor((data[z]['timetime'] - data[z]['date'])/86400)+' วันที่แล้ว</span></td>'+
                                    '<td><span style="color:orange">'+(data[z]['cash']==null?'ยังไม่ได้โอน':'โอนแล้ว')+'</span></td>'+
                                    '<td>' +
                                    '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>' +
                                    '<button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button></td>'+
                                    '</tr>');
                            }
                        }
                        break;

                    case '4':

                        for(var z in data){
                            if((data[z]['cash'] != null && data[z]['verified'] == 'Y')){
                                $show_data_list.append('<tr>' +
                                    '<td class="boughtlist_id">'+data[z]['id']+'</td>'+
                                    '<td>'+data[z]['username']+'</td>'+
                                    '<td class="hidden user_id">'+data[z]['user']+'</td>'+
                                    '<td class="hidden cart_id">'+data[z]['date']+'</td>'+
                                    '<td class="hidden bill_img">'+data[z]['cash_img']+'</td>'+
                                    '<td>'+data[z]['price']+'</td>'+
                                    '<td>'+(data[z]['sendby']=="none"?"รับด้วยตัวเอง":"ส่ง EMS")+'</td>'+
                                    '<td><span style="color:green">'+(data[z]['verified']=='Y'?'ใช่':'ไม่')+'</span></td>'+
                                    '<td><span style="color:green">'+Math.floor((data[z]['timetime'] - data[z]['date'])/86400)+' วันที่แล้ว</span></td>'+
                                    '<td><span style="color:green">'+(data[z]['cash']==null?'ยังไม่ได้โอน':'โอนแล้ว')+'</span></td>'+
                                    '<td>' +
                                    '<button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button></td>'+
                                    '</tr>');
                            }
                        }
                        break;

                    case '5':

                        for(var z in data){
                            if((Math.floor((data[z]['timetime'] - data[z]['date'])/86400) > 7 && data[z]['cash'] == null)){
                                $show_data_list.append('<tr>' +
                                    '<td class="boughtlist_id">'+data[z]['id']+'</td>'+
                                    '<td>'+data[z]['username']+'</td>'+
                                    '<td class="hidden user_id">'+data[z]['user']+'</td>'+
                                    '<td class="hidden cart_id">'+data[z]['date']+'</td>'+
                                    '<td class="hidden bill_img">'+data[z]['cash_img']+'</td>'+
                                    '<td>'+data[z]['price']+'</td>'+
                                    '<td>'+(data[z]['sendby']=="none"?"รับด้วยตัวเอง":"ส่ง EMS")+'</td>'+
                                    '<td><span style="color:red">'+(data[z]['verified']=='Y'?'ใช่':'ไม่')+'</span></td>'+
                                    '<td><span style="color:red">'+Math.floor((data[z]['timetime'] - data[z]['date'])/86400)+' วันที่แล้ว</span></td>'+
                                    '<td><span style="color:red">'+(data[z]['cash']==null?'ยังไม่ได้โอน':'โอนแล้ว')+'</span></td>'+
                                    '<td>' +
                                    '<button class="btn yellowbutton col-xs-12 delete_boughtlist">ลบ</button>' +
                                    '<button class="btn bluebutton col-xs-12 basket_detail" data-toggle="modal" data-target="#modal_basketdata">ดูรายละเอียด</button></td>'+
                                    '</tr>');
                            }
                        }
                        break;

                }

            }
        });

    });

});