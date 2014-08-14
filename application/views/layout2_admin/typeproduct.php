
    <h2>จัดการประเภทสินค้า</h2><br>

    <h4>เพิ่มประเภทหลัก</h4>
    <div class="form-horizontal">
        <div class="form-group">
            <label for="maintype" class="control-label col-md-2">ชื่อประเภท</label>
            <div class="col-md-6">
                <input type="text" id="maintype" class="form-control col-md-8">
            </div>
            <span id="warnmaintype" class="col-md-2" style="color:red"></span>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button id="addmaintype" type="submit" class="btn btn-primary">ตกลง</button>
            </div>
        </div>
    </div>

    <h4>จัดการประเภทหลัก</h4>
    <div  class="col-md-12">
        <ul id="managemaintype" class="list-group col-md-6 col-md-offset-2">
            <li class="list-group-item">Something is wrong</li>
        </ul>
    </div>

    <h4>เพิ่มประเภทย่อย</h4>
    <div class="form-horizontal">
        <div class="form-group">
            <label for="subtype" class="control-label col-md-2">ชื่อประเภท</label>
            <div class="col-md-6">
                <input type="text" id="subtype" class="form-control col-md-8">
            </div>
            <div class="col-md-4">
                <select id="selectmaintype" class="form-control">
                    <option>-Main Type-</option>
                    <option>aaa</option>
                    <option>aaa</option>
                </select>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-2" style="color:red"><p id="warnsubtype"></p></div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" id="addsubtype" class="btn btn-primary">ตกลง</button>
            </div>
        </div>
    </div>

    <h4>จัดการประเภทย่อย</h4>
    <div class="col-md-12">
        <ul id="managesubtype" class="col-md-8 col-md-offset-2" style="list-style-type:none;">
            <li><h4>sssss</h4>
                <ul class="list-group">
                    <li class="list-group-item">sssss<a class="pull-right" href="">ลบ</a></li>
                    <li class="list-group-item">sssss<a class="pull-right" href="">ลบ</a></li>
                </ul>
            </li>
            <li><h4>sssss</h4>
                <ul class="list-group">
                    <li class="list-group-item">sssss<a class="pull-right" href="">ลบ</a></li>
                    <li class="list-group-item">sssss<a class="pull-right" href="">ลบ</a></li>
                </ul>
            </li>
        </ul>
    </div>

