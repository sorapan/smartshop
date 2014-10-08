
var content = $('.content');

$(function(){


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

    $(' .link_txt').click(function(){

        var linkURL = prompt('Enter a URL:', 'http://');
        var sText = document.getSelection();
        document.execCommand('insertHTML', false, '<a target="_blank" href="'+linkURL+'">'+sText+'</a>');

    });

    $(' .submit').click(function(e){

        $.submitform($.autoFindDir('admin/submitContent').url);

    });

});

(function($){

    $.submitform = function($url){

        if(confirm('คุณแน่ใจแล้วใช่หรือไม่?')){

            $.ajax({
                url: $url,
                type:'POST',
                data:{
                    'header' : $('.header').val(),
                    'content' : $('.content').html()
                },
                success:function(data){

                    alert('ข้อความถูกบันทึกแล้ว');
                    location.reload();

                }
            });

        }

    }

}(jQuery));
