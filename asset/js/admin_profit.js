$(function(){

    var $year = $('.year');
    var date = new Date();
    var year = date.getFullYear();
    var year_bhudism = year+543;
    var month = date.getMonth();

    $('.month').val(month);

    for(var z=year_bhudism;z>=year_bhudism-15;z--)$year.append('<option value="'+z+'">'+z+'</option>');

    $(document).on('change','.month, .year',function(){

        var month = parseInt($('.month').val())+1;
        var year = parseInt($year.val())-543;
        init(month,year);

    });

    init(month+1,year);

    function init(month,year){

        var allsumprice = 0;
        var $profitdata = $('.profitdata');
        var $allsum = $('.allsumprice');
        $profitdata.html('');
        $allsum.html('');

        $.ajax({
            url: $.autoFindDir('admin/selectdata').url,
            type:'POST',
            data:{
                month:month,
                year:year
            },
            dataType:'JSON',
            success:function(data){

//                console.log(data);
                if(data != null){
                    for(var i in data){
                        $profitdata.append('<tr>' +
                            '<td class="productname">'+data[i]['product_name']+'</td>' +
                            '<td>'+data[i]['unit']+'</td>' +
                            '<td>'+data[i]['price']+'</td>' +
                        '</tr>');

                        allsumprice += parseInt(data[i]['price']);

                    }
                }else{
                    $profitdata.html('');
                    $allsum.html('');
                }

            },
            complete:function(){

                $.ajax({
                    url: $.autoFindDir('admin/selectpromotiondata').url,
                    type:'POST',
                    data:{
                        month:month,
                        year:year
                    },
                    dataType:'JSON',
                    success:function(data){
                        console.log(data);
                        if(data != null){

                            for(var i in data){

                                $profitdata.append('<tr>' +
                                    '<td class="productname">'+data[i]['product_name']+'</td>' +
                                    '<td>'+data[i]['unit']+'</td>' +
                                    '<td>'+data[i]['price']+'</td>' +
                                    '</tr>');

                                allsumprice += parseInt(data[i]['price']);
                                $allsum.html(allsumprice+' บาท');

                            }
                        }else{
                            $profitdata.html('');
                            $allsum.html('');
                        }
                    }
                });
            }
        });

    }


});
