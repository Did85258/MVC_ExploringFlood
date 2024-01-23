<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <form class="d-flex" action="" method="get">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
                    <input type="hidden" name="controller" value="return">
                    <button type="submit" class="btn btn-outline-success" name="action" value="search">Search</button>
                </div>
            </form>
        </div>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>ID</td>
                    <td>วันที่ยืม</td>
                    <td>เวลายืม</td>
                    <td>ชื่อผู้รับผิดชอบ</td>
                    <td>นามสกุลผู้รับผิดชอบ</td>
                    <td>สำนักงาน</td>
                    <td>อุปกรณ์</td>
                    <td>จำนวนที่ยืม</td>
                    <td>คืนอุปกรณ์</td>
                    <td>รายละเอียดการคืน</td>
                </tr>
                <?php 
                foreach ($ReturnList as $wl) {
                    
                    echo "<tr>
                    
        <td>$wl->withdraw_detail_id</td>
        <td>$wl->date</td>
        <td>$wl->time</td> 
        <td>$wl->StaffF_Name</td> 
        <td>$wl->StaffL_Name</td>
        <td>$wl->AgencyName</td>
        <td>$wl->EquipmentName</td>
        <td>$wl->quantity_withdraw</td>
        <td><a href='?controller=return&action=create&withdraw_detail_id=$wl->withdraw_detail_id ' class='btn btn-outline-primary me-2'>คืนอุปกรณ์</a></td>
        <td><a href='?controller=return&action=detail&withdraw_detail_id=$wl->withdraw_detail_id ' class='btn btn-outline-primary me-2'>รายละเอียดการคืน</a></td>
        </tr>";
        
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>