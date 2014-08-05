$(function(){


    var url = findDir("product/menu/main");
    var url_sub = findDir("product/menu/sub");
//    alert(url.url);
    fetchProductMenu(url.url);
    var producturl = url.product;

    function fetchProductMenu(url){

        var m_sub = $("#typemenu");
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            success:function(data){

                for(var z in data){

                    m_sub.append('' +
                        '<li><b><a href="'+producturl+'/show/'+z+'">'+data[z]+'</a></b>'+
                        '<ul class="submenu'+z+'">' +
                        '</ul></li>');
                    fetchProductSubMenu(url_sub.url,z);

                }
            }
        });
    }

    function fetchProductSubMenu(url,param){

        $.ajax({
            url:url+'/'+param,
            type:'POST',
            dataType:'json',
            success:function(data){
                for(var x in data){
                    $('.submenu'+param).append('' +
                        '<li><a href="'+producturl+'/show/'+param+'/'+x+'">'+data[x]+'</a></li>' +
                        '');
                }
            }
        });

    }

    function findDir(urlparam){
        var path = location.pathname.split("/");
        var urlsplit = urlparam.split("/");
        if(path.length >= 3) for(var z=0;z<path.length-3;z++) urlparam = "../"+urlparam;
        return {url:urlparam, product: urlsplit[0]};
    }

});