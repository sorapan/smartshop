$(function(){


    $(document).on('click','.submit_add_list_form',function(){

        $.ajax({
            url: $.autoFindDir('admin/addwarrantylist').url,
            type:'POST',
            data:{
               'productname' : $('.productname').val(),
               'customername' : $('.customername').val(),
               'productdetail' : $('.productdetail').val()
            },
            success:function(data){

                location.reload();
//                alert(data);

            }
        });

        $('#add_list_modal').modal('hide');

    });

    $(document).on('click','.submit_update_list_form',function(){

        var crame_code = $('.got_cramecode').html();

        $.ajax({
            url: $.autoFindDir('admin/updateStatus').url,
            type:'POST',
            data:{
                'new_status' : $('.status_update').val(),
                'crame_code' : crame_code
            },
            success:function(data){

                location.reload();

            }
        });

    });

    $(document).on('click','.update_status',function(){

        var crame_status = $(this).parents().eq(1).find('.crame_status').html();
        var crame_code = $(this).parents().eq(1).find('.crame_code').html();

        $('.got_cramecode').html(crame_code);

        $(' .status_update>option').each(function(n){
            if($(this).html() == crame_status){
                $(this).prop('selected',true);
            }
        });


    });

    $(document).on('click','.delete_list',function(){

        var crame_code = $(this).parents().eq(1).find('.crame_code').html();

        if(confirm('คุณต้องการลบข้อมูลนี้ใช่หรือไม่')){

            $.ajax({
                url:$.autoFindDir('admin/deleteList').url,
                type:'POST',
                data:{
                    'crame_code' : crame_code
                },
                success:function(){

                    location.reload();

                }
            });

        }

    });


    $(document).on('keyup','.search_box',function(){

        searchData();

    });

    $(document).on('click','.clear_searchbox',function(){

        $('.search_box').val('');
        searchData();

    });

    //////////////////////////////PRIVATE FUNCTION//////////////////////////////

    function searchData(){

        $.ajax({
            url:$.autoFindDir('admin/searchData').url,
            type:'POST',
            data:{
                'search_word' : $('.search_box').val(),
                'search_by' : $('.search_by').val()
            },
            dataType:'JSON',
            success:function(data){

                $('.warranty_body_data').html('');

                for(var i in data){

                    $('.warranty_body_data').append('' +
                        '<tr>'+
                        '<td>'+data[i]['crame_code']+'</td>'+
                        '<td>'+data[i]['product_name']+'</td>'+
                        '<td>'+data[i]['customer_name']+'</td>'+
                        '<td>'+data[i]['status']+'</td>'+
                        '<td>'+data[i]['date']+'</td>'+
                        '<td>'+data[i]['detail']+'</td>'+
                        '<td>'+
                        '<button class="bluebutton btn col-xs-12 update_status" data-toggle="modal" data-target="#update_list_modal">อัพเดท</button><br>'+
                        '<button class="yellowbutton btn col-xs-12 delete_list">ลบ</button>'+
                        '</td>'+
                        '</tr>' +
                        '');

                }

            }
        })

    }

});
