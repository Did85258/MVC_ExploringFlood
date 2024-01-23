<div class="container">
    <form method="get" action="">
    <br><br>
    <label>ExploreID <input type="int" name="explore_id" class="form-control" value="<?php echo $explore_id;?>" readonly required/></label><br><br>
    <label>วันที่ <input type="date" name="date_explore" class="form-control" value="<?php echo $el->date_explore ;?>" required/></label><br>
    <label>เวลา <input type="time" name="time_explore" class="form-control" value="<?php echo $el->time_explore ;?>" required/></label><br><br>

    <input type="hidden" name="controller" value="explore"/>
    <input type="hidden" name="explore_id" value="<?php echo $explore_id; ?>"/>
    <a href="?controller=explore&action=explore" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="update" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>