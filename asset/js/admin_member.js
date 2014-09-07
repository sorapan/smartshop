$(function(){

    $('.userdetail').click(function(){

        $.ajax({
            url: $.autoFindDir('admin/memberfetchdetail'),
            type:'POST',
            data:{

            },
            success:function(data){

            }
        });

    });

});