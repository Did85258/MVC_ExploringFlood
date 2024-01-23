<div class="container">
    <form method="get" action="">
    <br><br>
    <label>ExploreDetailID <input type="int" name="explore_detail_id" class="form-control" value="<?php echo $explore_detail_id;?>" readonly required/></label><br><br>
    <label>ชื่อ-สกุล พนักงาน <select name="StaffID" class="form-control">
        <?php
        foreach($staffList as $sl){
            echo "<option value=$sl->StaffID> $sl->StaffF_Name - $sl->StaffL_Name </option>";
        }
        ?>
    </select> </label><br><br>

    <input type="hidden" name="controller" value="explore"/>
    <input type="hidden" name="explore_id" value="<?php echo $explore_id; ?>"/>
    <a href="?controller=explore&action=detail&explore_id=<?php  echo $explore_id ;?>" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="updateDetail" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>