$(function(){

    var uploadimgbox = $(" #uploadimgbox");
    uploadimgbox.on('dragenter',function(e){e.preventDefault();});
    uploadimgbox.on('dragover',function(e){e.preventDefault();});
    uploadimgbox.on('drop', function(e)
    {
        e.preventDefault();
        upload(e.originalEvent.dataTransfer);
    });

    function upload(data){

        var formdata;
        formdata = new FormData();
        formdata.append("img", data.files[0]);
        $.ajax({
            xhr:function(){
                var xhr = xhr = new XMLHttpRequest();
                xhr.upload.addEventListener("progress",function(e){
                        if(e.lengthComputable){
                            var percentComplete = e.loaded / e.total;
                            uploadimgbox.html(percentComplete*100);
                        }
                },false);
                return xhr;
            },
            url:'admin/uploadProuctImg',
            type:'POST',
            data:formdata,
            processData: false,
            contentType: false,
            success:function(d){


                $("#showimg").html('' +
                    '<img class="col-md-4 col-md-push-4" src="'+d+'">' +
                    '<div style="margin-top:10px" class="col-md-12">' +
                    '<button class="col-md-2 col-md-push-5" id=" delpic">ลบรูปภาพ</button></div>'+
                 '');


            }
        });

    }

});
