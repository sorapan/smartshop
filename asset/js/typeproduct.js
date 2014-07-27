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
                        '<li class="list-group-item">'+data[i]+'<a class="del_maintype pull-right" href="">ลบ</a></li>'
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


});
