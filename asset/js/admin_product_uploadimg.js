$(function(){

    var $uploadimgbox = $(" #uploadimgbox");
    var $uploadclick = $(' .uploadbyclick');
    $(document).on('dragenter',$uploadimgbox,function(e){e.preventDefault();});
    $(document).on('dragover',$uploadimgbox,function(e){e.preventDefault();});
    $(document).on('drop',$uploadimgbox,function(e)
    {
        e.preventDefault();
        upload(e.originalEvent.dataTransfer);
    });

    $(document).on('click'," #uploadimgbox",function(e){
        e.preventDefault();
        $(this).parent().find('input').click();
    });

    $(document).on('change'," .uploadbyclick",function(e){
        e.preventDefault();
        upload($(this)[0]);
    });

    $(document).on('click','#delpic',function(){

        var target = $("#showimg").find('img').attr("src");
        deleteTempImg(target);

    });

    function upload(data){

        var formdata;
        formdata = new FormData();
        formdata.append("img", data.files[0]);
        $.ajax({
            xhr:function(){
                var xhr = xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(e){
                    $('#addproduct_ok').prop('disabled', true); // disable submit's button
                        if(e.lengthComputable){
                            var percentComplete = e.loaded / e.total;
                            uploadimgbox.html(percentComplete*100);
                        }
                },false);
                return xhr;
            },
            url:'uploadProuctImg',
            type:'POST',
            data:formdata,
            processData: false,
            contentType: false,
            success:function(d){

                $('#addproduct_ok').prop('disabled', false);
                $("#showimg").html('' +
                    '<img class="col-md-4 col-md-push-4" src="'+d+'">' +
                    '<div style="margin-top:10px" class="col-md-12">' +
                    '<button class="col-md-2 col-md-push-5" id="delpic">ลบรูปภาพ</button></div>'+
                 '');

            }
        });

    }

    function deleteTempImg(data){

        var d = data.slice(3);

        $.ajax({
            url:'deleteTempImg',
            type:'POST',
            data:{
                'tempimg':d
            },
            success:function(){

                $('#showimg').html(''+
                    '<div class="col-md-4 col-md-push-4" id="uploadimgbox">+</div>' +
                    '<input type="file" class="uploadbyclick hide">'+
                    '');

            }
        });

    }

});
