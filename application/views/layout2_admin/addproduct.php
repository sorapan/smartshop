
    <div class="col-xs-12 bigheader">
        เพิ่มข้อมูลสินค้า
    </div>

    <div class="col-xs-12 card">
    <div class="cardbrand">
        แบบฟอร์มเพิ่มสินค้า
    </div>
    <div id="showimg" class="margintop">
        <div class="col-xs-4 col-xs-push-4 margintop" id="uploadimgbox">+</div>
        <input type="file" class="uploadbyclick hide">
    </div>

<!--        <img  class="col-xs-4 col-xs-push-4" src="--><?//=base_url()?><!--asset/img/qq.jpg">-->
        <div id="uploadproductform" class="form-horizontal col-xs-12">
            <div class="form-group">
                <label for="name" class="col-xs-3 control-label">ชื่อ :</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="subtype" class="col-xs-3 control-label">ประเภท :</label>
                <div class="col-xs-8">
                    <select id="subtype" name="subtype" class="form-control">
                        <option value="aaa">error</option>
                        <option value="aaa">error</option>
                        <option value="aaa">error</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="price" class="col-xs-3 control-label">ราคา :</label>
                <div class="col-xs-8">
                    <input type="text" class="form-control" id="price" name="price" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unit" class="col-xs-3 control-label">จำนวน :</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="unitnot" class="col-xs-3 control-label">แจ้งเตือนเมื่อเหลือ :</label>
                <div class="col-xs-3">
                    <input type="text" class="form-control" id="unitnot" name="unitnot" placeholder="">
                </div>
            </div>

            <div class="form-group">
                <label for="detail" class="col-xs-3 control-label">รายละเอียด :</label>
                <div class="col-xs-8">
                    <div contenteditable="true" style="height: 150px;overflow-y: scroll" class="form-control" id="detail"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-3 col-xs-offset-3">
                    <button class=" btn bluebutton" id="addproduct_ok">ตกลง</button>
                </div>
            </div>
        </div>


    </div>

