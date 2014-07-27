$(function(){

    init();

    $("#addmaintype").click(function(){
        addMaintype();
        $("#maintype").val("");
    });

    function init(){
        fetchMaintype();
        $("#warnmaintype").html("");
    }

    function fetchMaintype(){

        $.ajax({
            url:"admin/fetchmaintype",
            type:"POST",
            dataType:"json",
            success:function(data){
                $("#managemaintype").html("");
                $("#selectmaintype").html("");
                $("#selectmaintype").append('<option value="">-- เลือกประเภทหลัก --</option>');
                for(var i in data){
                    $("#managemaintype").append(
                        '<li class="list-group-item"><span>'+data[i]+'</span><a class="del_maintype pull-right" href="">ลบ</a></li>'
                    );

                    $("#selectmaintype").append('' +
                        '<option value="'+i+'">'+data[i]+'</option>' +
                    '');
                }
            }
        });
    }

    function addMaintype(){

        $.ajax({
            url:'admin/insertmaintype',
            type:'POST',
            data:{
                "name":$("#maintype").val()
            },
            success:function(data){
                if(data)init();
                else $("#warnmaintype").html("**ซ้ำ**");
            }
        });

    }

    $(document).on('click','.del_maintype',function(e){

        e.preventDefault();
        var ip = $(this).parent().find('span').html();
        var really = confirm("คุณต้องการลบใช่หรือไม่");
        if(really) deleteMaintype(ip);

    });



    function deleteMaintype(input){

        $.ajax({
            url:'admin/deletemaintype',
            type:'POST',
            data:{
                'typename':input
            },
            success:function(data){
                init();
            }
        });

    }


});
