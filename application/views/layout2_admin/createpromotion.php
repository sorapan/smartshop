<div class="bigheader col-xs-12">จัดโปรโมชั่น</div>

<div class="card col-xs-12 marginbot">

    <div class="cardbrand">ค้นหา</div>

    <div class="col-xs-8 col-xs-offset-2 input-group">
        <input type="text" class="form-control search_product_textbox">
        <div class="input-group-btn">
            <button class="search_product_btn btn bluebutton">ค้นหา</button>
        </div>
    </div>

</div>

<div class="col-xs-12 card">

    <div class="cardbrand">รายการ</div>
    <table class="table ">
        <thead class="bluethead">
        <tr>
            <th>#</th>
            <th>ชื่อ</th>
            <th>ราคา</th>
            <th>จำนวน</th>
            <th>รายละเอียด</th>
            <th>เพิ่มสินค้า</th>
        </tr>
        </thead>
        <tbody>

    <?php
    //for($z=0;$z<10;$z++){
    foreach($p_data as $p_val){
        ?>
        <tr>
            <td class="productid"><?=$p_val->id?></td>
            <td class="productname"><?=$p_val->name?></td>
            <td><?=$p_val->price?></td>
            <td><?=$p_val->unit?></td>
            <td><a class="product_detail" data-toggle="modal" data-target="#detailModal">click</a></td>
            <td><button class="checkproduct btn bluebutton" >เพิ่มในโปรโมชั่น</button>
        </tr>
    <?php
    }
    ?>

        </tbody>
    </table>
</div>

<div class="col-xs-12 menuFromDown" style="height: 220px;bottom: -220px;border-top:1px solid #c1c1c1;padding:15px;z-index:999999;position: fixed;left:0;background-color: white">

    <span class="hide_menu" style="background-color: orange;position: absolute;top:0;right: 0;color:white;cursor: pointer;padding: 5px">ซ่อน/แสดง</span>
    <div class="row margintop">
    <div class="col-xs-12">
        <div class="promotion_list col-xs-4" style="overflow-y:scroll;height: 120px;background-color: #bbd3da"></div>

        <div class="form-group col-xs-3">
            <label class="control-label col-xs-4">ชื่อ :</label>
            <div class="col-xs-8">
                <input class="form-control promotion_name" type="text">
            </div><br>
            <label class="margintop control-label col-xs-4">ตั้งราคา :</label>
            <div class="col-xs-8">
                <input class="margintop form-control promotion_price" type="text">
            </div>
        </div>

        <div class="form-group col-xs-5">
            <label class="control-label col-xs-3">รายละเอียด :</label>
            <div class="col-xs-9">
                <div contenteditable="true" style="height: 100px;overflow-y: scroll" class="form-control promotion_detail"></div>
            </div>
        </div>

        <button class="takepromotion col-xs-6 col-xs-offset-3 btn bluebutton" style="bottom:0;margin-top: 5px">จัดโปรโมชั่น</button>
    </div>
    </div>

</div>

<!--///////////////////////////////-->

<div class="modal" id="detailModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="addtobasket_name"><?='ชื่อสินค้า'?></h4>
            </div>
            <div class="modal-body">

                <div id="showimg">
                    <!--                    <div class="col-md-6 col-md-push-3" id="uploadimgbox">+</div>-->
                    <!--                    <input type="file" class="uploadbyclick hide">-->
                </div>


                <div id="uploadproductform" class="form-horizontal col-xs-12">
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">ชื่อ :</label>
                        <div class="col-xs-8">
                            <p  class="form-control-static" name="name" id="name"></p>
                        </div>
                    </div>


                    <input type="text" class="form-control productid hide" name="id" placeholder="">

                    <div class="form-group">
                        <label for="maintype" class="col-xs-4 control-label">ประเภทหลัก :</label>
                        <div class="col-xs-8">
                            <p id="maintype" class="form-control-static"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="subtype" class="col-xs-4 control-label">ประเภทย่อย :</label>
                        <div class="col-xs-8">
                            <p id="subtype" class="form-control-static"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="col-xs-4 control-label">ราคา :</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="price" ></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unit" class="col-xs-4 control-label">จำนวน :</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="unit"></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="unitnot" class="col-xs-4 control-label">แจ้งเตือนเมื่อเหลือ :</label>
                        <div class="col-xs-3">
                            <p class="form-control-static" id="unitnot" ></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="detail" class="col-xs-4 control-label">รายละเอียด :</label>
                        <div class="col-xs-8">
                            <p class="form-control-static" id="detail" ></p>
                        </div>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>