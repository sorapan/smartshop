$(function(){


    $(document).on('click','.bill_img',function(){

        $(' .modal-body').html('' +
            '<img class="marginbot col-xs-12" src="'+$(this).attr('www')+'"> '+
            '')

    });

    $(document).on('click','.bought_verify',function(){

        if(confirm('คุณต้องการจะยืนยันการซื้อ?')){

            $.ajax({
                url:'',
                type:'',
                data:{

                },
                success:function(data){



                }
            })

        }

    });

});
