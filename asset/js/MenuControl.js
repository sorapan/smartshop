$(function(){

    var current_url = currenturl();

//    alert(current_url);

    $("#menubar").find("li").each(function(num){
        $(this).removeClass();
        if($(this).find("a").attr("href") == current_url){
            $(this).addClass("active");
        }
    });

    function currenturl(){
        var hostname = 'http://'+location.hostname;
        var path = location.pathname.split('/');
        var url = hostname+'/'+path[1]+'/';
        if(path[2]!="") url += path[2];
        return url;
    }

});
