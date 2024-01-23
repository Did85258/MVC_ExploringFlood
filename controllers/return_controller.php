<?php
class ReturnController{
    public function index(){
        $ReturnList=Returns::getWithdraw();
        require_once('views/return/index.php');
    }
    public function create(){
        $withdraw_detail_id = $_GET['withdraw_detail_id'];
        $rl=Returns::get($withdraw_detail_id);
        require_once('views/return/create.php');
    }

    public function add(){
        $date_return = $_GET['date_return'];
        $time_return = $_GET['time_return'];
        $withdraw_detail_id = $_GET['withdraw_detail_id'];
        $quantity_return = $_GET['quantity_return'];
        Returns::add($date_return,$time_return,$withdraw_detail_id,$quantity_return);
        ReturnController::index();
    }

    public function detail(){
        $withdraw_detail_id = $_GET['withdraw_detail_id'];
        $rl=Returns::get($withdraw_detail_id);
        $ReturnList=Returns::getDetail($withdraw_detail_id);
        require_once('views/return/detail.php');
    }


    public function search(){
        //echo "key";
        $key=$_GET['key'];
        $ReturnList=Returns::search($key);
        require_once('views/return/index.php');
    }

    public function edit(){
        $withdraw_return_id = $_GET['withdraw_return_id'];
        $rl=Returns::getReturn($withdraw_return_id);
        require_once('views/return/edit.php');
    }

    public function update(){
        $withdraw_return_id = $_GET['withdraw_return_id'];
        $date_return = $_GET['date_return'];
        $time_return = $_GET['time_return'];
        $quantity_return = $_GET['quantity_return'];
        Returns::update($withdraw_return_id,$date_return,$time_return,$quantity_return);
        ReturnController::detail();
    }

    public function delete(){
        $withdraw_return_id = $_GET['withdraw_return_id'];
        Returns::delete($withdraw_return_id);
        ReturnController::detail();
    }

    public function sum(){
        $ReturnList=Returns::getAll();
        require_once('views/return/sum.php');
    }

}
?>