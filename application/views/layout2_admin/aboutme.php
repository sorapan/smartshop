<div class="bigheader">
    เพิ่มข้อความเกี่ยวกับร้านค้า
</div>


<div class="form-horizontal">
    <div class="form-group">
        <label class="col-xs-2 control-label">หัวข้อ</label>
        <div class="col-xs-8">
            <input type="text" class="form-control header">
        </div>
    </div>
</div>

<button class="col-xs-1 bold_txt">Bold</button>
<button class="col-xs-1 italic_txt">Italic</button>
<button style="margin-left: 15px" class="col-xs-1 header_txt">หัวข้อ</button>
<button class="col-xs-1 normal_txt">ปกติ</button>
<button style="margin-left: 15px" class="col-xs-1 justify_left_txt">left</button>
<button class="col-xs-1 justify_center_txt">Center</button>
<button style="margin-left: 15px" class="col-xs-1 link_txt">ลิงค์</button>
<button style="margin-left: 15px" class="col-xs-2" data-toggle="modal" data-target="#insert_img_modal">ใส่รูปภาพ</button>

<div class="col-xs-12 margintop cardshadow" style="height: 300px;background-color: white">
    <div class="row">
        <div contenteditable="true" style="outline: none;font-size:0.9em;height: 300px;overflow-y: scroll" class="col-xs-12 content">
        </div>
    </div>
</div>

<button class="col-xs-2 submit_aboutme margintop btn bluebutton">ตกลง</button>

    <div class="modal" id="insert_img_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">เลือกรูปภาพ</h4>
            </div>
            <div class="modal-body">

                <div class="form-horizontal">

                    <div class="form-group">
                        <label class="control-label col-xs-2">อัพโหลด</label>
                        <div class="col-xs-8">
                            <input class="upload_img" type="file" multiple>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn whitebutton" data-dismiss="modal">ปิดหน้าต่าง</button>
                <button type="button" class="btn bluebutton">ตกลง</button>
            </div>
        </div>
    </div>
</div>
