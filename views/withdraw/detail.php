<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="">
                <?php  echo "WithdrawID=" . $wl->withdraw_id. " วันที่=" . $wl->date . " เวลา=" . $wl->time . " ผู้รับผิดชอบ=" . $wl->StaffF_Name . " " . $wl->StaffL_Name ?>
            </div>
            <a href="?controller=withdraw&action=createDetail&withdraw_id=<?php echo $wl->withdraw_id ?>" class="btn btn-outline-primary me-2">create</a><br>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>ID</td>
                    <td>สำนักงาน</td>
                    <td>อุปกรณ์</td>
                    <td>จำนวน</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>

                <?php $text="are you sure?";  
                foreach ($withdrawDetailList as $wl) {

                    echo "<tr>
        <td>$wl->withdraw_detail_id</td> 
        <td>$wl->AgencyName</td>
        <td>$wl->EquipmentName</td> 
        <td>$wl->quantity_withdraw</td> 
        <td><a href='?controller=withdraw&action=editDetail&withdraw_detail_id=$wl->withdraw_detail_id ' class='btn btn-outline-primary me-2'>edit</a></td>
        <td><a href='?controller=withdraw&action=deleteDetail&withdraw_id=$wl->withdraw_id&withdraw_detail_id=$wl->withdraw_detail_id ' class='btn btn-outline-primary me-2' onclick='return confirm('$text')'>delete</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>