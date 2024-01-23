<div class="container">
    <form method="get" action="">
    <br><br>
    <label>ID Detail<input type="int" name="withdraw_detail_id" class="form-control" value=<?php echo $withdraw_detail_id; ?> required readonly  /></label><br><br> 
    
    <label>สำนักงาน <select name="AgencyID">
        <?php
        echo "<option value=$wl->AgencyID> $wl->AgencyName</option>";
        foreach($AgencyList as $al){
            if($wl->AgencyID != $al->AgencyID)
                echo "<option value=$al->AgencyID> $al->AgencyName</option>";
        }
        ?>
    </select> </label><br><br>
    <label>อุปกรณ์ <select name="EquipmentID">
        <?php
        echo "<option value=$wl->EquipmentID> $wl->EquipmentName</option>";
        foreach($EquipmentList as $el){
            if($wl->EquipmentID != $el->EquipmentID)
                echo "<option value=$el->EquipmentID> $el->EquipmentName</option>";
        }
        ?>
    </select> </label><br><br>
    <label>จำนวน <input type="int" name="quantity_withdraw" class="form-control" value=<?php echo $wl->quantity_withdraw; ?> required/></label><br><br>
    <label>ID Withdraw<input type="int" name="withdraw_id" class="form-control" value=<?php echo $wl->withdraw_id; ?> required readonly  /></label><br><br> 


    <input type="hidden" name="controller" value="withdraw"/>
    <a href="?controller=withdraw&action=detail&withdraw_id=<?php echo $wl->withdraw_id ;?>" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="updateDetail" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>