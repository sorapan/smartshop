$(function(){

    $(' .delete_boughtlist').click(function(){

        if(confirm('คุณต้องการลบข้อมูลใช่หรือไม่?')){

            var boughtlist_id = $(this).parents().eq(1).find('.boughtlist_id').html();
            var user_id = $(this).parents().eq(1).find('.user_id').html();

            $.ajax({
                url: $.autoFindDir('admin/deleteboughtlist').url,
                type:'POST',
                data:{
                    boughtlist_id:boughtlist_id,
                    user_id:user_id
                },
                success:function(data){

                    location.reload();

                }
            });

        }

    });

});