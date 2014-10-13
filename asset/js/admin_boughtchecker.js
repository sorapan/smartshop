$(function(){

    $(' .delete_boughtlist').click(function(){

        var boughtlist_id = $(this).parents().eq(1).find('.boughtlist_id').html();

        $.ajax({
            url:'',
            type:'POST',
            data:{
                boughtlist_id:boughtlist_id
            },
            success:function(data){

            }
        });

    });

});