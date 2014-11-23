$(function(){

    var $payday = $('.pay_day');
    var $paymonth = $('.pay_month');
    var $payyear = $('.pay_year');
    var year = new Date().getFullYear()+543;

    fetch_pay_day(31);
    for(var z=year;z>=year-15;z--)$payyear.append('<option value="'+z+'">'+z+'</option>');

    $(document).on('change','.pay_month, .pay_year',function(){

        var $thismon = $paymonth.val();
        if( $thismon == 'jan' ||
            $thismon == 'mar' ||
            $thismon == 'may' ||
            $thismon == 'jun' ||
            $thismon == 'aug' ||
            $thismon == 'oct' ||
            $thismon == 'dec'
        )fetch_pay_day(31);
        else if($thismon == 'fab') ($payyear.val()-543)%4 == 0 ? fetch_pay_day(29) : fetch_pay_day(28);
        else fetch_pay_day(30);

    });

    function fetch_pay_day(num_day){
        $payday.html('');
        for(var i=1;i<=num_day;i++)$payday.append('<option value="'+i+'">'+i+'</option>');
    }

    $('.bought_cancel').click(function(){

        if(confirm('ต้องการยกเลิกรายการซื้อนี้ ใช่หรือไม่?')){

            var bought_id = $(this).parent().find('.bought_id').html();

            $.ajax({
                url: $.autoFindDir('takeitem/boughtcancel').url,
                type:'POST',
                data:{
                    boughtlist_id:bought_id
                },
                success:function(data){

                    location = 'http://'+$.autoFindDir('takeitem/boughtcancel').baseurl;

                }
            });

        }

    });

    $('.bought_back').click(function(){

        if(confirm('ต้องการย้อนกลับ ใช่หรือไม่?')){

            var bought_id = $(this).parent().find('.bought_id').html();

            $.ajax({
                url: $.autoFindDir('takeitem/boughtback').url,
                type:'POST',
                data:{
                    boughtlist_id:bought_id
                },
                success:function(data){

                    location = 'http://'+$.autoFindDir('takeitem/boughtcancel').baseurl;

                }
            });

        }

    });

});