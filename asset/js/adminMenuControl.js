$(function(){

    $(" .AdminMenuButton").click(function(e){

        e.preventDefault();
        $(" #adminPageLoad").load(""+$(this).attr('href'));

    });

});
