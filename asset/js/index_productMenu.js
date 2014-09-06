$(function(){

    var url =   $.autoFindDir('product/menu/main');
    var url_sub = $.autoFindDir("product/menu/sub");
//    alert(location.pathname);
    fetchProductMenu(url.url);
    var producturl = url.product;
    var baseurl = url.baseurl;

    function fetchProductMenu(url){

        var m_sub = $("#typemenu");
        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            success:function(data){

                for(var z in data){

                    m_sub.append('' +
                        '<li><a href="http://'+baseurl+'/'+producturl+'/'+z+'">'+data[z]+'</a>'+
                        '<ul class="nav navnav list-disc-type submenu'+z+'">' +
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
                        '<li><a href="http://'+baseurl+'/'+producturl+'/'+param+'/'+x+'">'+data[x]+'</a></li>' +
                        '');
                }
            }
        });
    }

});