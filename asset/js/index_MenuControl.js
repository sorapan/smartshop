$(function(){

    var current_url = currenturl();


    $("#menubar a").each(function(num){

//        $(this).find("a").removeClass();



        if($(this).attr("href") == current_url){
            $(this).addClass("active");

//            alert($('.active').html());
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
