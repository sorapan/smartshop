$(function(){

    var $subtype_menu = $('.subtype_menu');
    var url = $.autoFindDir("product/menu/sub");
    $(document).on('click','.producttype',function(e){

        e.preventDefault();
        var typeid = $(this).attr('typeid');
        $(".subtype_header").html($(this).html());
        $.ajax({
            url:url.url+"/"+typeid,
            type:'POST',
            dataType:'json',
            success:function(data){

                $subtype_menu.html('');
                for(var q in data){

                    $subtype_menu.append('<a class="tilemenu col-xs-3" href="http://'+url.baseurl+'/'+url.product+'/'+typeid+'/'+q+'">'+data[q]+'</a>');

                }

            }
        });

    });

});
