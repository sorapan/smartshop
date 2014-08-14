$(function(){

//    ================================= event =================================

    init();

    $("#addmaintype").click(function(){
        addMaintype();
        $("#maintype").val("");

    });

    $(document).on('click','.del_maintype',function(e){

        e.preventDefault();
        var ip = $(this).parent().find('span').html();
        var really = confirm("คุณต้องการลบใช่หรือไม่");
        if(really) deleteMaintype(ip);

    });

    $("#addsubtype").click(function(){
        addSubtype();
        $('#subtype').val("");
    });

    $(document).on('click','.del_subtype',function(e){

        e.preventDefault();
        var ip = $(this).parent().find('span').html();
        var really = confirm("คุณต้องการลบใช่หรือไม่");
        if(really) deleteSubtype(ip);


    });

//    ================================= private function =================================

    function init(){
        fetchMaintype();
        fetchSubtype();
        $("#warnmaintype").html("");
        $("#warnsubtype").html("");
    }

//    -------------------------- maintype --------------------------

    function fetchMaintype(){

        var mmt = $("#managemaintype");
        var smt = $("#selectmaintype");
        $.ajax({
            url:"fetchmaintype",
            type:"POST",
            dataType:"json",
            success:function(data){
                mmt.html("");
                smt.html("");
                smt.append('<option value="">-- เลือกประเภทหลัก --</option>');
                for(var i in data){
                    mmt.append(
                        '<li class="list-group-item"><span>'+data[i]+'</span><a class="del_maintype pull-right" href="">ลบ</a></li>'
                    );

                    smt.append('' +
                        '<option value="'+i+'">'+data[i]+'</option>' +
                    '');
                }
            }
        });
    }

    function addMaintype(){

        $.ajax({
            url:'insertmaintype',
            type:'POST',
            data:{
                "name":$("#maintype").val()
            },
            success:function(data){
                if(data)init();
                else $("#warnmaintype").html("**ผิดพลาด**");
            }
        });

    }

    function deleteMaintype(input){

        $.ajax({
            url:'deletemaintype',
            type:'POST',
            data:{
                typename:input
            },
            success:function(data){
                init();
            }
        });

    }

//    -------------------------- subtype --------------------------

    function addSubtype(){

        $.ajax({
            url:'insertsubtype',
            type:'POST',
            data:{
                name:$('#subtype').val(),
                maintypenum:$('#selectmaintype').val()
            },
            success:function(data){
                if(data)init();
                else $("#warnsubtype").html("**ผิดพลาด**");
            }
        });

    }

    function fetchSubtype(){

        var m_sub = $("#managesubtype");

        $.ajax({
            url:'fetchsubtype',
            type:'POST',
            dataType:'json',
            success:function(data){
                m_sub.html("");
                for(var z in data){
                    m_sub.append('' +
                        '<li><b>'+z+'</b>' +
                        '<ul>' +
                        '');
                    for(var x in data[z]){
                        m_sub.append('' +
                            '<li class="list-group-item"><span>'+data[z][x]+'</span><a class="del_subtype pull-right" href="">ลบ</a></li>' +
                        '');
                    }
                    m_sub.append('' +
                        '</ul></li>'+
                        '');
                }
            }
        });
    }

    function deleteSubtype(name){

        $.ajax({
            url:'deletesubtype',
            type:'POST',
            data:{
                name:name
            },
            success:function(data){
                init();
            }
        });
    }
});
