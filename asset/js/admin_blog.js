$(function(){

    var content = $('.content');

    $(' .bold_txt').click(function(){

        document.execCommand('bold', false, null);

    });

    $(' .italic_txt').click(function(){

        document.execCommand('italic', false, null);

    });

    $(' .header_txt').click(function(){

        document.execCommand('fontSize', false, '5');

    });

    $(' .normal_txt').click(function(){

        document.execCommand('fontSize', false, '2');

    });

    $(' .justify_left_txt').click(function(){

        document.execCommand('justifyLeft', false, null);

    });

    $(' .justify_center_txt').click(function(){

        document.execCommand('justifyCenter', false, null);

    });

    $(' .submit').click(function(e){

        if(confirm('คุณแน่ใจแล้วใช่หรือไม่?')){

            $.ajax({
                url: $.autoFindDir('admin/submitContent').url,
                type:'POST',
                data:{
                    'header' : $('.header').val(),
                    'content' : content.html()
                },
                success:function(data){

                    alert('ข้อความถูกบันทึกแล้ว');
                    location.reload();

                }
            });

        }

    });

});