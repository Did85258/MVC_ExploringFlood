<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="">
                <?php  echo "ExploreID=" . $el->explore_id. " วันที่ลงพื้นที่=" . $el->date_explore . " เวลาลงพื้นที่=" . $el->time_explore . " WithdrawID=" . $el->withdraw_id . " AreaEventID=" . $el->area_event_id ?>
            </div>
            <div class="col  d-flex justify-content align-items-start">
                <a href="?controller=explore&action=explore" class="btn btn-outline-primary me-2">back</a>
            </div><br>
            <a href="?controller=explore&action=createDetail&explore_id=<?php echo $el->explore_id ?>" class="btn btn-outline-primary me-2">create</a><br>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>ID</td>
                    <td>ชื่อพนักงาน</td>
                    <td>นามสกุลพนักงาน</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>

                <?php 
                foreach ($exploreDetailList as $wl) {
                    echo "<tr>
        <td>$wl->explore_detail_id</td> 
        <td>$wl->StaffF_Name</td>
        <td>$wl->StaffL_Name</td> 
        <td><a href='?controller=explore&action=editDetail&explore_id=$wl->explore_id&explore_detail_id=$wl->explore_detail_id ' class='btn btn-outline-primary me-2'>edit</a></td>
        <td><a href='?controller=explore&action=deleteDetail&explore_id=$wl->explore_id&explore_detail_id=$wl->explore_detail_id ' class='btn btn-outline-primary me-2' onclick='return confirm('')'>delete</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>