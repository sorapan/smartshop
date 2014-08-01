$(function(){

    var m_sub = $("#typemenu");

    $.ajax({
        url:'admin/fetchsubtype',
        dataType:'json',
        type:'POST',
        success:function(data){

            for(var z in data){
                m_sub.append('' +
                    '<li><b>'+z+'</b>'+
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

});