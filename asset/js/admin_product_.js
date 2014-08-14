$(function(){

    fetchTypeSelect();

    function fetchTypeSelect(){

        $.ajax({
            url:'fetchproductType',
            type:'POST',
            dataType:'json',
            success:function(data){

                var type = $("#subtype");

                type.html("");

                for(var z in data){

                    type.append('' +
                        '<option value="" disabled>=='+z+'==</option>'+
                    '');
                    for(var x in data[z]){
                        type.append(''+
                            '<option value="'+data[z][x][0]+'">'+data[z][x][1]+'</option>'+
                            '');

                    }
                }
            }
        });
    }
});
