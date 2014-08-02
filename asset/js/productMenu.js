$(function(){


    var path = location.pathname.split("/");
    var url;
    var product_page = "";

    if(path.length == 3) url = "admin/fetchsubtype";
    else if(path.length == 4) url = "../admin/fetchsubtype";
    else url = "../../admin/fetchsubtype";

    if(path.length == 3) product_page = "product/";

    fetchProductMenu(url);

    function fetchProductMenu(url){

        var m_sub = $("#typemenu");

        $.ajax({
            url:url,
            dataType:'json',
            type:'POST',
            success:function(data){

                for(var z in data){
                    m_sub.append('' +
                        '<li><b><a href="'+product_page+z+'">'+z+'</a></b>'+
                        '<ul>' +
                        '');
                    for(var x in data[z]){
                        m_sub.append('' +
                            '<li><a href="">'+data[z][x]+'</a></li>' +
                            '');
                    }
                    m_sub.append('' +
                        '</ul></li>'+
                        '');

                }
            }
        });

    }

});