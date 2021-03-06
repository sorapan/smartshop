$(function(){

    var $edit_btn = $('.edit_btn');


    $edit_btn.click(function(e){

        e.preventDefault();
        var productid = $(this).parents().eq(3).find('.productid').html();

        $.ajax({
            url: $.autoFindDir('admin/fetchproductdata').url,
            type:'POST',
            data:{
                'productid':productid
            },
            dataType: 'JSON',
            success: function(data){

                if(data[0]['img'] !== ""){

                    $(' #showimg').html('<img class="col-xs-8 col-xs-push-2" src="../productImg/'+data[0]['img']+'">' +
                        '<div style="margin-top:10px" class="col-md-12">' +
                        '<button class="col-xs-4 col-xs-push-4" id="delpicfirst">ลบรูปภาพ</button></div>');

                }else{

                    $(' #showimg').html(''+
                        '<div class="col-md-4 col-md-push-4" id="uploadimgbox">+</div>' +
                        '<input type="file" class="uploadbyclick hide">'+
                        '');

                }

                $('#name').html(data[0]['name']);
                $('.productid').val(data[0]['id']);
                $('#subtype').val(data[0]['subtype']);
                $('#price').val(data[0]['price']);
                $('#unit').val(data[0]['unit']);
                $('#unitnot').val(data[0]['unitnot']);
                $('#detail').html(data[0]['detail']);

            }

        })

    });

    $(document).on('click',' #delpicfirst',function(e){

        var img_url = $(this).parents().eq(2).find('img').attr('src');
        var productid = $(this).parents().eq(2).find('.productid').val();

        e.preventDefault();
        $.ajax({
            url: $.autoFindDir('admin/deleteImgInStore').url,
            type:'POST',
            data:{
                'img_url' : img_url,
                'productid' : productid
            },
            success: function(data){

                $('#showimg').html(''+
                    '<div class="col-md-4 col-md-push-4" id="uploadimgbox">+</div>' +
                    '<input type="file" class="uploadbyclick hide">'+
                    '');

//                location.reload();

            }
        });

    });

    $(document).on('click','#change_product_data',function(){


        $.ajax({
            url:$.autoFindDir('admin/updateproduct').url,
            type:'POST',
            data:{
                'productid' : $(this).parents().eq(2).find('.productid').val(),
                'subtype' : $('#subtype').val(),
                'price' : $('#price').val(),
                'unit' : $('#unit').val(),
                'unitnot' : $('#unitnot').val(),
                'detail' : $('#detail').html()
            },
            success: function(data){

                location.reload();

            }
        });

    });

    $('.buying').click(function(e){

        e.preventDefault();
        var productid = $(this).parents().eq(2).find('.productid').html();
        $.ajax({
            url: $.autoFindDir('admin/buyingtoggle').url,
            type:"POST",
            data:{
                productid : productid
            },
            success:function(){

                location.reload();

            }
        });

    });

    $('.deleteproduct').click(function(e){

        e.preventDefault();

        if(confirm('ต้องการลบรายการสั่งซื้อนี้ใช่หรือไม่')){
            var productid = $(this).parents().eq(2).find('.productid').html();
            var img_url = $(this).parents().eq(2).find('img').attr('src');
            $.ajax({
               url: $.autoFindDir('admin/deleteproduct').url,
                type:'POST',
                data:{
                    productid : productid,
                    img_url:img_url
                },
                success:function(data){

                    if(data == 'not'){
                        alert('ยังมีผู้ใช้กำลังซื้อสินค้านี้อยู่ ไม่สามารถลบได้ ( คำแนะนำ : โปรดปิดการซื้อขายรายการนี้ก่อน )');
                    }else{

                        location.reload();

                    }
                }
            });
        }


    });

});
