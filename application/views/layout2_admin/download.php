<div class="bigheader">อัพโหลดไฟล์</div>
<div class="card">
    <div class="cardbrand">
        อัพโหลดไฟล์
    </div>
    <form method="POST" action="../admin/uploadfile" class="form-horizontal margintop" enctype="multipart/form-data">
        <div class="form-group">
            <label class="col-xs-2 control-label">อัพโหลด : </label>
            <div class="col-xs-8">
                <input type="file" name="file" class="form-control-static">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-2 control-label">คำอธิบาย :</label>
            <div class="col-xs-8">
                <textarea rows="5" name="detail" class="form-control"></textarea>
            </div>
        </div>
        <button type="submit" class="btn bluebutton col-xs-offset-9 marginbot">ตกลง</button>
    </form>
</div>
<div class="card margintop">
    <div class="cardbrand marginbot">
        ไฟล์ที่อัพโหลดแล้ว
    </div>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>คำอธิบาย</th>
                <th>ไฟล์</th>
                <th>วันที่อัพโหลด</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
    <?php

        foreach($filedata as $val){

    ?>
            <tr>
                <td class="file_id hidden"><?=$val->id?></td>
                <td class="file_name hidden"><?=$val->file?></td>
                <td><?=$val->detail?></td>
                <td><span style="float:left;max-width: 180px;overflow-x: hidden;text-overflow: ellipsis"><a target="_blank" href='../file_download/<?=$val->file?>'><?=$val->file?></a></span></td>
                <td><?=date('d/m/Y',$val->date)?></td>
                <td><button class="btn yellowbutton del_fileupload">ลบ</button></td>
            </tr>
    <?php

        }

    ?>
        </tbody>
    </table>
</div>