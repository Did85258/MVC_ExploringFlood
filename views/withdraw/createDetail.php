<div class="container">
    <form method="get" action="" >
    <label>WithdrawID <input type="int" name="withdraw_id" class="form-control" value="<?php echo $withdraw_id;?>" readonly required/></label><br><br>
    <label>อุปกรณ์ <select name="EquipmentID" class="form-control">
        <?php
        foreach($EquipmentList as $el){
            echo "<option value=$el->EquipmentID> $el->EquipmentName </option>";
        }
        ?>
    </select> </label><br><br>
    <label>สำนักงาน <select name="AgencyID" class="form-control">
        <?php
        foreach($AgencyList as $al){
            echo "<option value=$al->AgencyID> $al->AgencyName </option>";
        }
        ?>
    </select> </label><br><br>

    <label>จำนวน <input type="int" name="quantity_withdraw" class="form-control" required/></label><br><br>


    <input type="hidden" name="controller" value="withdraw"/>
    <a href="?controller=withdraw&action=index" class="btn btn-outline-primary me-2">Back</a>
    <button type="submit" name="action" value="addDetail" class="btn btn-outline-primary me-2">Save</button>
    </form>
</div>