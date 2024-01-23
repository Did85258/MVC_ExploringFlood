<div class="container">
    <form method="get" action="" >
    <label>วันที่ <input type="date" name="date" class="form-control" required /></label><br><br>
    <label>เวลา <input type="time" name="time" class="form-control" required/></label><br><br>
    <label>ชื่อผู้รับผิดชอบ <select name="StaffID">
        <?php
        foreach($staffList as $sl){
            echo "<option value=$sl->StaffID> $sl->StaffF_Name $sl->StaffL_Name</option>";
        }
        ?>
    </select> </label><br><br>


    <input type="hidden" name="controller" value="withdraw"/>
    <a href="?controller=withdraw&action=index" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="add" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>