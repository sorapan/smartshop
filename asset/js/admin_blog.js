
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

    $(' .insert_img_txt').click(function(){

        document.execCommand('insertImage', false, "http://upload.wikimedia.org/wikipedia/commons/thumb/5/54/American_Broadcasting_Company_Logo.svg/220px-American_Broadcasting_Company_Logo.svg.png");

    });

    $(' .submit').click(function(e){

        $.submitform($.autoFindDir('admin/submitContent').url);

    });

    $(document).on('change','.upload_img',function(e){

        e.preventDefault();

        for(var i in $(this)[0].files){

            if(typeof $(this)[0].files[i].name != "undefined"  && $(this)[0].files[i].name != 'item'){

                console.log($(this)[0].files[i]);

            }

        }

//        var formdata = new FormData();
//        formdata.append("img",$(this)[0].files[0]);

//        $.ajax({
//            url:'',
//            type:'POST',
//            data:formdata,
//            success:function(data){
//
//
//
//            }
//        });

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
