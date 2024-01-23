<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>                   
                    <td>withdrawDetailID</td>
                    <td>ชื่อผู้รับผิดชอบ</td>
                    <td>นามสกุลผู้รับผิดชอบ</td>
                    <td>สำนักงาน</td>
                    <td>อุปกรณ์</td>
                    <td>วันที่ยืม</td>
                    <td>เวลายืม</td>
                    <td>จำนวนที่ยืม</td>
                    <td>วันที่คืน</td>
                    <td>เวลาที่คืน</td>
                    <td>จำนวนที่คืน</td>
                </tr>
                <?php 
                foreach ($ReturnList as $wl) {
                    
                    echo "<tr>
                    
        <td>$wl->withdraw_detail_id</td>
        <td>$wl->StaffF_Name</td> 
        <td>$wl->StaffL_Name</td>
        <td>$wl->AgencyName</td>
        <td>$wl->EquipmentName</td>
        <td>$wl->date</td>
        <td>$wl->time</td>
        <td>$wl->quantity_withdraw</td>
        <td>$wl->date_return</td>
        <td>$wl->time_return</td>
        <td>$wl->quantity_return</td>
        </tr>";
        
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>