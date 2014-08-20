
    <div class="col-xs-12 bigheader"><h4>
        เพิ่มข้อมูลสินค้า
    </h4></div>

    <div class="col-xs-12 card">

    <div id="showimg" class="margintop">
        <div class="col-md-4 col-md-push-4 margintop" id="uploadimgbox">+</div>
    </div>

<!--        <img  class="col-md-4 col-md-push-4" src="--><?//=base_url()?><!--asset/img/qq.jpg">-->
    <input type="file" id="inputfilehidden" style="display:none">
    <form method="post" action="<?=base_url()?>admin/addproductsubmit">
        <div id="uploadproductform" class="form-horizontal col-md-12">
            <div class="form-group">
                <label for="name" class="col-md-3 control-label">ชื่อ :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="subtype" class="col-md-3 control-label">ประเภท :</label>
                <div class="col-md-8">
                    <select id="subtype" name="subtype" class="form-control">
                        <option value="aaa">error</option>
                        <option value="aaa">error</option>
                        <option value="aaa">error</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-md-3 control-label">ราคา :</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" id="price" name="price" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unit" class="col-md-3 control-label">จำนวน :</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unitnot" class="col-md-3 control-label">แจ้งเตือนเมื่อเหลือ :</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="unitnot" name="unitnot" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="detail" class="col-md-3 control-label">รายละเอียด :</label>
                <div class="col-md-8">
                    <textarea style="height: 150px" class="form-control" id="detail" name="detail" placeholder=""></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="detail" class="col-md-3 control-label"></label>
                <div class="col-md-3">
                    <button class=" btn bluebutton" id="addproduct_ok">ตกลง</button>
                </div>
            </div>
        </div>
    </form>

    </div>

