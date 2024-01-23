<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
            <form class="d-flex" action="" method="get">
                <div class="input-group mb-3">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="key">
                    <input type="hidden" name="controller" value="withdraw">
                    <button type="submit" class="btn btn-outline-success" name="action" value="search">Search</button>
                </div>
            </form>
        </div>
        <div class="col  d-flex justify-content align-items-start">
            <a href="?controller=withdraw&action=create" class="btn btn-outline-primary me-2">create</a>
        </div>
            <table id="mytable" class="table table-bordered table-striped">
                <br>
                <tr>
                    <td>withdrawID</td>
                    <td>วันที่</td>
                    <td>เวลา</td>
                    <td>ชื่อผู้รับผิดชอบ</td>
                    <td>นามสกุลผู้รับผิดชอบ</td>
                    <td>รายละเอียด</td>
                    <td>แก้ไข</td>
                    <td>ลบ</td>
                </tr>
                <?php foreach ($withdrawList as $wl) {
                    echo "<tr>
        <td>$wl->withdraw_id</td> 
        <td>$wl->date</td>
        <td>$wl->time</td> 
        <td>$wl->StaffF_Name</td> 
        <td>$wl->StaffL_Name</td>
        <td><a href='?controller=withdraw&action=detail&withdraw_id=$wl->withdraw_id ' class='btn btn-outline-primary me-2'>รายละเอียด</a></td>
        <td><a href='?controller=withdraw&action=edit&withdraw_id=$wl->withdraw_id ' class='btn btn-outline-primary me-2'>แก้ไข</a></td>
        <td><a href='?controller=withdraw&action=delete&withdraw_id=$wl->withdraw_id ' class='btn btn-outline-primary me-2' onclick='return checkDelete()'>ลบ</a></td>
        </tr>";
                }
                echo "</table>";
                ?>
        </div>
    </div>
</div>