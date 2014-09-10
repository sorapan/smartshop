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

                $(' #showimg').html('<img class="col-xs-8 col-xs-push-2" src="../productImg/'+data[0]['img']+'">' +
                  '<div style="margin-top:10px" class="col-md-12">' +
                  '<button class="col-xs-4 col-xs-push-4" id="delpicfirst">ลบรูปภาพ</button></div>');

                $('#name').val(data[0]['name']);
                $('.productid').val(data[0]['id']);
                $('#subtype').val(data[0]['subtype']);
                $('#price').val(data[0]['price']);
                $('#unit').val(data[0]['unit']);
                $('#unitnot').val(data[0]['unitnot']);
                $('#detail').val(data[0]['detail']);

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

            }
        });

    });

});
