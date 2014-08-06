<article>

    <div class="col-md-12 bigheader">สินค้า</div>

    <div class="col-md-12 cardshadow" id="productheader" >
        <div class="row">
        <span class="col-md-12 cardheader">รายการ</span>
        <div class="col-md-3 ">
            <h4>ประเภทหลัก</h4>
            <ul style="list-style-type: none;">
                <?php
                foreach($mt_data as $mt_val){
                    echo "<li>".$mt_val->name."<li>";
                }
                ?>
            </ul>
        </div>
        <div class="col-md-2">
            <h4>ประเภทหลัก</h4>
            <ul style="list-style-type: none;">
                <li>sdfdsfsd</li>
                <li>dslifkjdnf</li>
            </ul>
        </div>
        </div>
    </div>

    <div class="col-md-12 row">
        <div class="row">
<?php
//for($z=0;$z<10;$z++){
foreach($p_data as $p_val){
?>
        <div class="col-md-3 col-xs-6">
            <div class="thumbnail cardshadow">
                <div class="limit_img">
                    <img src="<?=base_url()?>productImg/<?=$p_val->img?>">
                </div>
                <div class="caption">
                    <h4><?=$p_val->name?></h4>
                    <p>ราคา : <?=$p_val->price?> บาท</p>
                    <p>จำนวน : <?=$p_val->unit?> ชิ้น</p>
                    <p>
                        <a href="#" class="btn" id="getdetail">ดูรายระเอียด</a>
                        <a href="#" class="btn" id="getitem">หยิบใส่ตะกร้า</a>
                    </p>
                </div>
            </div>
        </div>
<?php
}
?>
</div>
</div>

</article>
