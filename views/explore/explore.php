<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="col  d-flex justify-content align-items-start">
            <a href="?controller=explore&action=index" class="btn btn-outline-primary me-2">back</a>
        </div>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>ExploreID</td>
                    <td>วันที่ลงพื้นที่</td>
                    <td>เวลาลงพื้นที่</td>
                    <td>withdrawID</td>
                    <td>AreaEventID</td>
                    <td>เจ้าหน้าที่</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>

                <?php 
                foreach ($exploreList as $wl) {

                    echo "<tr>
        <td>$wl->explore_id</td> 
        <td>$wl->date_explore</td>
        <td>$wl->time_explore</td> 
        <td>$wl->withdraw_id</td> 
        <td>$wl->area_event_id</td> 
        <td><a href='?controller=explore&action=detail&explore_id=$wl->explore_id ' class='btn btn-outline-primary me-2'>เจ้าหน้าที่</a></td>
        <td><a href='?controller=explore&action=edit&explore_id=$wl->explore_id ' class='btn btn-outline-primary me-2'>edit</a></td>
        <td><a href='?controller=explore&action=delete&explore_id=$wl->explore_id' class='btn btn-outline-primary me-2' onclick='return confirm('')'>delete</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>