$(function(){
    var current_url = document.URL;
    $("#menubar").find("li").each(function(num){
        $(this).removeClass();
        if($(this).find("a").attr("href") == current_url){
            $(this).addClass("active");
        }
    });
});
