<div class="container">
    <form method="get" action="" >
        <div class="">
            <?php  echo "AreaID=" . $al->area_event_id. " เขต=". $al->name_th. " วันที่=" . $al->date . " ความเสียหาย=" . $al->amountvalue ; ?>
        </div>
    <label>Area Event ID <input type="int" name="area_event_id" class="form-control" value="<?php echo $area_event_id;?>" readonly required/></label><br>
    <label>วันที่ <input type="date" name="date_explore" class="form-control" required/></label><br>
    <label>เวลา <input type="time" name="time_explore" class="form-control" required/></label><br>
    <label>withdrawID <select name="withdraw_id" class="form-control">
        <?php
        foreach($withdrawList as $wl){
            echo "<option value=$wl->withdraw_id> $wl->withdraw_id </option>";
        }
        ?>
    </select><br>

    <input type="hidden" name="controller" value="explore"/>
    <a href="?controller=explore&action=index" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="add" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>