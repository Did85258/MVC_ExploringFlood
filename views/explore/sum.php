<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>                   
                    <td>ExploreDetailID</td>
                    <td>Detail</td>
                    <td>วันที่เกิดเหตุ</td>
                    <td>วันที่ลงพื้นที่</td>
                    <td>เวลาที่ลงพื้ืนที่</td>
                    <td>withdrawID</td>
                    <td>ชื่อเจ้าหน้าที่</td>
                    <td>นามสกุลเจ้าหน้าที่</td>
                </tr>
                <?php 
                foreach ($exploreList as $wl) {
                    
                    echo "<tr>
        <td>$wl->explore_detail_id</td>
        <td>$wl->area_event_id</td> 
        <td>$wl->date</td>
        <td>$wl->date_explore</td>
        <td>$wl->time_explore</td>
        <td>$wl->withdraw_id</td>
        <td>$wl->StaffF_Name</td>
        <td>$wl->StaffL_Name</td>
        </tr>";
        
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>