$(function(){

    var current_url = currenturl();

//    console.log(current_url);

    $(".navnav").find("li").each(function(num){
//        $(this).removeClass();
        if($(this).find("a").attr("href") == current_url){
            $(this).find("a").addClass("active");
//            console.log($(this).find("a").attr("href"));
//            console.log($(this).find(".active"));
        }
    });

    function currenturl(){
        var hostname = 'http://'+location.hostname;
        var path = location.pathname.split('/');
        var url = hostname+'/'+path[1]+'/';
        if(path[2]!="") url += path[2];
        if(path[3]!="") url += '/'+path[3];
        return url;
    }

});

