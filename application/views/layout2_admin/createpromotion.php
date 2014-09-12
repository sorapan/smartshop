<div class="bigheader col-xs-12">จัดโปรโมชั่น</div>

<div class="card col-xs-12 marginbot">

    <div class="cardbrand">ค้นหา</div>
    search : <input type="text">

</div>

<div class="col-xs-12">
    <?php
    //for($z=0;$z<10;$z++){
    foreach($p_data as $p_val){
        ?>
        <div class="col-md-4 col-xs-6">
            <div class="thumbnail cardshadow">

                <div style="position: relative" class="limit_img">
                    <img src="
                    <?php

                    echo strpos($p_val->img,'www') == false ? base_url()."productImg/".$p_val->img : base_url().'/asset/img/noimage.jpg';

                    ?>

                    ">
                </div>
                <div style="display:none" class="productid"><?=$p_val->id?></div>
                <div class="caption">
                    <h4  class="product_name"><?=$p_val->name?></h4>
                    <p>ราคา : <span class="product_price"><?=$p_val->price?></span> บาท</p>
                    <p>จำนวน : <span class="product_unit"><?=$p_val->unit?></span> ชิ้น</p>

                    <div style="text-align: right" class="col-md-12">
                        <a href="#" data-toggle="modal" data-target="#myModal"  class="btn btn-sm bluebutton edit_btn" >แก้ไข</a>
                        <a href="#" class="btn btn-sm yellowbutton" >ลบ</a>
                    </div>

                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>

<div class="col-xs-12" style="border-top:1px solid #c1c1c1;padding:15px;z-index:999999;position: fixed;height: 100px;bottom: 0;left:0;background-color: white">

    <div class="col-xs-12">
        <button class="col-xs-offset-11 btn bluebutton" style="margin-right:15px">จัดโปรโมชั่น</button>
    </div>

</div>