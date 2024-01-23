<?php
class WithdrawController{
    public function index(){
        $withdrawList=Withdraw::getAll();
        require_once('views/withdraw/index.php');
    }
    public function create(){
        $withdrawList=Withdraw::getAll();
        $staffList = Staff::getAll();
        require_once('views/withdraw/create.php');
    }

    public function add(){
        $date = $_GET['date'];
        $time = $_GET['time'];
        $StaffID = $_GET['StaffID'];
        echo "$date,$time,$StaffID";
        Withdraw::add($date,$time,$StaffID);
        WithdrawController::index();
    }

    public function search(){
        //echo "key";
        $key=$_GET['key'];
        $withdrawList=Withdraw::search($key);
        require_once('views/withdraw/index.php');
    }

    public function edit(){
        $withdraw_id = $_GET['withdraw_id'];
        $wl=Withdraw::get($withdraw_id);
        $staffList = Staff::getAll();
        require_once('views/withdraw/edit.php');
    }

    public function update(){
        $withdraw_id = $_GET['withdraw_id'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        $StaffID = $_GET['StaffID'];
        echo "$date,$time,$StaffID";
        Withdraw::update($withdraw_id,$date,$time,$StaffID);
        WithdrawController::index();
    }

    public function delete(){
        $withdraw_id = $_GET['withdraw_id'];
        Withdraw::delete($withdraw_id);
        WithdrawController::index();
    }

    public function detail(){
        $id = $_GET['withdraw_id'];
        $withdrawDetailList = withdrawDetail::getAll($id);
        $wl=Withdraw::get($id);
        require_once('views/withdraw/detail.php');
    }

    public function createDetail(){
        $withdraw_id = $_GET['withdraw_id'];
        $EquipmentList = Equipment::getAll();
        $AgencyList = Agency::getAll();
        require_once('views/withdraw/createDetail.php');
    }

    public function addDetail(){
        $withdraw_id = $_GET['withdraw_id'];
        $AgencyID = $_GET['AgencyID'];
        $EquipmentID = $_GET['EquipmentID'];
        $quantity_withdraw = $_GET['quantity_withdraw'];
        $StatusID = EquipmentDetail::getID($AgencyID, $EquipmentID);
        // if(is_null($StatusID)){
            
        //     echo "<script>alert('เลือกอุปกรณ์ใหม่!');</script>";
        //     WithdrawController::createDetail();
        // } else{
        //     withdrawDetail::add($StatusID,$quantity_withdraw,$withdraw_id);
        //     WithdrawController::detail();
        // }
        // echo "$date,$time,$StaffID";
        withdrawDetail::add($StatusID,$quantity_withdraw,$withdraw_id);
        withdrawController::detail();


    }

    public function editDetail(){
        $withdraw_detail_id = $_GET['withdraw_detail_id'];

        $wl=withdrawDetail::get($withdraw_detail_id);
        $EquipmentList = Equipment::getAll();
        $AgencyList = Agency::getAll();
        $staffList = Staff::getAll();
        require_once('views/withdraw/editDetail.php');
    }

    public function updateDetail(){
        $withdraw_detail_id = $_GET['withdraw_detail_id'];
        $withdraw_id = $_GET['withdraw_id'];
        $AgencyID = $_GET['AgencyID'];
        $EquipmentID = $_GET['EquipmentID'];
        $quantity_withdraw = $_GET['quantity_withdraw'];
        $StatusID = EquipmentDetail::getID($AgencyID, $EquipmentID);
        withdrawDetail::update($withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id);
        WithdrawController::detail();
    }

    public function deleteDetail(){
        $withdraw_detail_id = $_GET['withdraw_detail_id'];
        withdrawDetail::delete($withdraw_detail_id);
        WithdrawController::detail();
    }

}
?>