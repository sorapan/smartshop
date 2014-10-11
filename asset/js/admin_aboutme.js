$(function(){

    $('.submit_aboutme').click(function(){

        $.submitform($.autoFindDir('admin/aboutmesubmitContent').url);

    });

});
