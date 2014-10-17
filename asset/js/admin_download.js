$(function(){


    $('.del_fileupload').click(function(){

        if(confirm('คุณต้องการจะลบใช่หรือไม่?')){

        var fileid = $(this).parents().eq(1).find('.file_id').html();
        var filename = $(this).parents().eq(1).find('.file_name').html();

        $.ajax({
            url: $.autoFindDir('admin/deletefile').url,
            type:'POST',
            data:{
                'fileid' : fileid,
                'filename' : filename
            },
            success:function(data){

                location.reload();

            }
        });

        }

    });


});