<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <!-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <form class="d-flex" action="" method="get">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
                    <input type="hidden" name="controller" value="withdraw">
                    <button type="submit" class="btn btn-outline-success" name="action" value="search">Search</button>
                </div>
            </form>
        </div> -->
        <div class="col  d-flex justify-content align-items-start">
            <a href="?controller=explore&action=explore" class="btn btn-outline-primary me-2">ข้อมูลการลงพื้นที่</a>
        </div>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>Area Event ID</td>
                    <td>เขต</td>
                    <td>วันที่</td>
                    <td>มูลค่าความเสียหาย</td>
                    <td>ลงพื้นที่</td>
                </tr>
                <?php 
                foreach ($areaEventList as $wl) {
                    echo "<tr>
        <td>$wl->area_event_id</td> 
        <td>$wl->name_th</td>
        <td>$wl->date</td> 
        <td>$wl->amountvalue</td> 
        <td><a href='?controller=explore&action=create&area_event_id=$wl->area_event_id ' class='btn btn-outline-primary me-2'>ลงพื้นที่</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>