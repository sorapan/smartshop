
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

        var formdata = new FormData();
        formdata.append("img",$(this)[0].files[0]);

        $.ajax({
            url: $.autoFindDir('admin/bloguploadimg').url,
            type:'POST',
            data:formdata,
            processData: false,
            contentType: false,
            success:function(data){

//                console.log(data);
                fetchBlogImg();

            }
        });

    });

    $('.insert_img').click(function(){

        fetchBlogImg();

    });

    function fetchBlogImg(){

        var $blogimggallery =  $('.blogimggallery');

        $blogimggallery.html('');

        $.ajax({
            url: $.autoFindDir('admin/fetchblogimg').url,
            type:'POST',
            dataType:'JSON',
            success:function(data){

                for(var i in data){

                    $blogimggallery.append('<div class="blogpickimg"><span class="blog_img_id hidden">'+data[i]['id']+'</span><div class="del_blog_img">&times;</div><img class="imginsertoblog" src="http://'+location.hostname+'/peter/blog_img/'+data[i]['name']+'"></div>');

                }

            }
        })


    }

    $(document).on('click','.del_blog_img',function(){


        $img_id = $(this).parent().find('.blog_img_id').html();
        alert($img_id);

    });

    $(document).on('click','.imginsertoblog',function(){

        document.execCommand('insertImage', false, $(this).attr('src'));
        $('#insert_img_modal').modal('hide');

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
