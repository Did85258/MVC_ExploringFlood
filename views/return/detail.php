<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="">
                <?php  echo "WithdrawID=" . $rl->withdraw_detail_id ." วันที่=" . $rl->date . " เวลา=" . $rl->time . " ผู้รับผิดชอบ=" . $rl->StaffF_Name . " " . $rl->StaffL_Name ?>
            </div>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>ID</td>
                    <td>วันที่คืน</td>
                    <td>เวลาคืน</td>
                    <td>จำนวน</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>

                <?php 
                foreach ($ReturnList as $wl) {

                    echo "<tr>
        <td>$wl->withdraw_return_id</td> 
        <td>$wl->date_return</td>
        <td>$wl->time_return</td> 
        <td>$wl->quantity_return</td> 
        <td><a href='?controller=return&action=edit&withdraw_return_id=$wl->withdraw_return_id ' class='btn btn-outline-primary me-2'>edit</a></td>
        <td><a href='?controller=return&action=delete&withdraw_detail_id=$rl->withdraw_detail_id&withdraw_return_id=$wl->withdraw_return_id ' class='btn btn-outline-primary me-2' onclick='return confirm('')'>delete</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>