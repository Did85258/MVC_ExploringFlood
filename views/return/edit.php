<div class="container">
    <form method="get" action="">
    <br><br>
    <label>ID <input type="int" name="withdraw_return_id" class="form-control" value=<?php echo $withdraw_return_id; ?> required readonly  /></label><br><br> 
    <label>วันที่ <input type="date" name="date_return" class="form-control" value=<?php echo $rl->date_return; ?> required /></label><br><br>
    <label>เวลา <input type="time" name="time_return" class="form-control" value=<?php echo $rl->time_return; ?> required/></label><br><br>
    <label><input type="hidden" name="withdraw_detail_id" value=<?php echo $rl->withdraw_detail_id; ?> required/></label><br><br>
    <label>จำนวน <input type="int" name="quantity_return" class="form-control" value=<?php echo $rl->quantity_return; ?> required/></label><br><br>

    <input type="hidden" name="controller" value="return"/>
    <a href="?controller=return&action=detail&withdraw_detail_id=<?php echo $rl->withdraw_detail_id ;?>" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="update" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>