<div class="container">
    <form method="get" action="">
    <br><br>
    <label>ID <input type="int" name="withdraw_id" class="form-control" value=<?php echo $withdraw_id; ?> required readonly  /></label><br><br> 
    <label>วันที่ <input type="date" name="date" class="form-control" value=<?php echo $wl->date; ?> required /></label><br><br>
    <label>เวลา <input type="time" name="time" class="form-control" value=<?php echo $wl->time; ?> required/></label><br><br>
    <label>ชื่อผู้รับผิดชอบ <select name="StaffID">
        <?php
        echo "<option value=$wl->StaffID> $wl->StaffF_Name $wl->StaffL_Name</option>";
        foreach($staffList as $sl){
            if($wl->StaffID != $sl->StaffID)
                echo "<option value=$sl->StaffID> $sl->StaffF_Name $sl->StaffL_Name</option>";
        }
        ?>
    </select> </label><br><br>


    <input type="hidden" name="controller" value="withdraw"/>
    <a href="?controller=withdraw&action=index" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="update" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>