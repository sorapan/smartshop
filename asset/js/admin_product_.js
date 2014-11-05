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

    $(' #addproduct_ok').click(function(){

        if(confirm('ต้องการเพิ่มข้อมูลใช่หรือไม่')){

            var name = $(this).parents().eq(3).find(' #name').val();
            var subtype = $(this).parents().eq(3).find(' #subtype').val();
            var price = $(this).parents().eq(3).find(' #price').val();
            var unit = $(this).parents().eq(3).find(' #unit').val();
            var unitnot = $(this).parents().eq(3).find(' #unitnot').val();
            var detail = $(this).parents().eq(3).find(' #detail').html();

            $.ajax({

                url: $.autoFindDir('admin/addproductsubmit').url,
                type:'POST',
                data:{
                    'name' : name,
                    'subtype' : subtype,
                    'price' : price,
                    'unit' : unit,
                    'unitnot' : unitnot,
                    'detail' : detail
                },
                success:function(data){

                    alert('เพิ่มข้อมูลสำเร็จ');
                    location.reload();

                }

            });

        }

    });

});
