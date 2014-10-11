$(function(){


    $(document).on('keyup','.search_box',function(){

        searchData();

    });

    $(document).on('click','.clear_searchbox',function(){

        $('.search_box').val('');
        searchData();

    });

    //////////////////////////////PRIVATE FUNCTION//////////////////////////////

    function searchData(){

        $.ajax({
            url:$.autoFindDir('warranty/searchData').url,
            type:'POST',
            data:{
                'search_word' : $('.search_box').val(),
                'search_by' : $('.search_by').val()
            },
            dataType:'JSON',
            success:function(data){

                $('.warranty_body_data').html('');

                for(var i in data){

                    $('.warranty_body_data').append('' +
                        '<tr>'+
                        '<td>'+data[i]['crame_code']+'</td>'+
                        '<td>'+data[i]['product_name']+'</td>'+
                        '<td>'+data[i]['customer_name']+'</td>'+
                        '<td>'+data[i]['date']+'</td>'+
                        '<td>'+data[i]['detail']+'</td>'+
                        '<td>'+data[i]['status']+'</td>'+
                        '</tr>' +
                        '');

                }

            }
        })

    }

});
