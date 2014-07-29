$(function(){

    fetchTypeSelect();

    function fetchTypeSelect(){

        $.ajax({
            url:'fetchproductType',
            type:'POST',
            dataType:'json',
            success:function(data){

                var type = $("#type");

                type.html("");

                for(var z in data){

                    type.append('' +
                        '<option value="aaa" style="font-size: 20px;font-weight: bolder" disabled>=='+z+'==</option>'+
                    '');

                    for(var x in data[z]){

                        type.append('' +
                            '<option value="'+data[z][x]+'">'+data[z][x]+'</option>'+
                            '');

                    }
                }
            }
        });
    }
});
