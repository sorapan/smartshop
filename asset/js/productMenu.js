$(function(){

    var m_sub = $("#typemenu");

    $.ajax({
        url:'admin/fetchsubtype',
        dataType:'json',
        type:'POST',
        success:function(data){

            for(var z in data){
                m_sub.append('' +
                    '<li><b>'+z+'</b>' +
                    '<ul>' +
                    '');
                for(var x in data[z]){
                    m_sub.append('' +
                        '<li>'+data[z][x]+'</li>' +
                        '');
                }
                m_sub.append('' +
                    '</ul></li>'+
                    '');
            }
        }
    });

});