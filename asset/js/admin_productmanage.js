$(function(){

    var $edit_btn = $('.edit_btn');

    $edit_btn.click(function(){

        var productid = $(this).parents().eq(3).find('.productid').html();

        $.ajax({
            url: $.autoFindDir('admin/fetchproductdata').url,
            type:'POST',
            data:{
                'productid':productid
            },
            dataType: 'JSON',
            success : function(data){


            }
        })

    });

});
