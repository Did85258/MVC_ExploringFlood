<div class="container">
    <form method="get" action="" >
    <label>WithdrawID <input type="int" name="withdraw_detail_id" class="form-control" value="<?php echo $withdraw_detail_id;?>" readonly required/></label><br>
    <label>อุปกรณ์ <input type="text" name="EquipmentID" class="form-control" value="<?php echo $rl->EquipmentName;?>" readonly required/> </label><br>
    <label>สำนักงาน <input type="text" name="AgencyID" class="form-control" value="<?php echo $rl->AgencyName;?>" readonly required/> </label><br>
    <label>วันที่คืน <input type="date" name="date_return" class="form-control" required/></label><br>
    <label>เวลาคืน <input type="time" name="time_return" class="form-control" required/></label><br>
    <label>จำนวนคืน <input type="int" name="quantity_return" class="form-control" required/></label><br><br>


    <input type="hidden" name="controller" value="return"/>
    <a href="?controller=return&action=index" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="add" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>