<?php
class ExploreController{
    public function index(){
        $areaEventList=AreaEvent::getAll();
        $el = Explore::getAll();
        require_once('views/explore/index.php');
    }
    public function create(){
        $area_event_id = $_GET['area_event_id'];
        $al=AreaEvent::get($area_event_id);
        $withdrawList = Withdraw::getAll();
        require_once('views/explore/create.php');
    }

    public function add(){
        $date_explore = $_GET['date_explore'];
        $time_explore = $_GET['time_explore'];
        $withdraw_id = $_GET['withdraw_id'];
        $area_event_id = $_GET['area_event_id'];
        Explore::add($withdraw_id,$date_explore,$time_explore,$area_event_id);
        ExploreController::index();
    }

    public function explore(){
        $exploreList=Explore::getAll();
        // $ReturnList=Returns::getDetail($withdraw_detail_id);
        require_once('views/explore/explore.php');
    }

    public function detail(){
        $explore_id = $_GET['explore_id'];
        $exploreDetailList=ExploreDetail::getAll($explore_id);
        $el=Explore::get($explore_id);
        // $ReturnList=Returns::getDetail($withdraw_detail_id);
        require_once('views/explore/detail.php');
    }

    public function edit(){
        $explore_id = $_GET['explore_id'];
        $el=Explore::get($explore_id);
        require_once('views/explore/edit.php');
    }


    public function update(){
        $explore_id = $_GET['explore_id'];
        $date_explore = $_GET['date_explore'];
        $time_explore = $_GET['time_explore'];
        Explore::update($explore_id,$date_explore,$time_explore);
        ExploreController::explore();
    }

    public function delete(){
        $explore_id = $_GET['explore_id'];
        Explore::delete($explore_id);
        ExploreController::explore();
    }

    public function createDetail(){
        $explore_id = $_GET['explore_id'];
        $staffList = Staff::getAll();
        // $AgencyList = Explore::getAll();
        require_once('views/explore/createDetail.php');
    }

    public function addDetail(){
        $explore_id = $_GET['explore_id'];
        $StaffID = $_GET['StaffID'];
        ExploreDetail::add($explore_id,$StaffID);
        ExploreController::detail();


    }
    public function editDetail(){
        $explore_detail_id = $_GET['explore_detail_id'];
        $explore_id = $_GET['explore_id'];
        $exploreDetailList=ExploreDetail::getAll($explore_detail_id);
        $staffList = Staff::getAll();
        require_once('views/explore/editDetail.php');
    }

    public function updateDetail(){
        $explore_detail_id = $_GET['explore_detail_id'];
        $StaffID = $_GET['StaffID'];
        ExploreDetail::update($explore_detail_id,$StaffID);
        ExploreController::detail();
    }

    public function deleteDetail(){
        $explore_detail_id = $_GET['explore_detail_id'];
        ExploreDetail::delete($explore_detail_id);
        ExploreController::detail();
    }


    public function search(){
        //echo "key";
        $key=$_GET['key'];
        $ReturnList=Returns::search($key);
        require_once('views/return/index.php');
    }

    public function sum(){
        $exploreList=SumExplore::getAll();
        require_once('views/explore/sum.php');
    }


}
?>