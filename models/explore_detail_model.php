<?php class ExploreDetail{
    public $explore_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name;
    // public $EquipmentID, $EquipmentName, $AgencyID, $AgencyName,$withdraw_detail_id,$StatusID,$quantity_withdraw;
    
    public function __construct($explore_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name){
        $this->explore_id = $explore_id;
        $this->explore_detail_id = $explore_detail_id;
        $this->StaffID = $StaffID;
        $this->StaffF_Name = $StaffF_Name;
        $this->StaffL_Name = $StaffL_Name;
    }
    public static function getAll($explore_id){
        $exploreDetailList=[];
        require("connection.php");
        $sql="SELECT * FROM explore_detail AS ed
        INNER JOIN Staffs AS s ON s.StaffID=ed.StaffID
        WHERE ed.explore_id = '$explore_id'";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $explore_id=$my_row["explore_id"] ;
            $explore_detail_id=$my_row["explore_detail_id"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];

            $exploreDetailList[]= new ExploreDetail($explore_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name);
        }
        require("connection_close.php");
        return $exploreDetailList;
    }
    public static function get($area_event_id){
        require("connection.php");
        $sql="SELECT * FROM explore AS e
        INNER JOIN area_event AS ae ON ae.area_event_id = e.area_event_id
        WHERE ae.area_event_id='$area_event_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $explore_id=$my_row["explore_id"] ;
        $date_explore=$my_row["date_explore"];
        $time_explore=$my_row["time_explore"];
        $withdraw_id=$my_row["withdraw_id"];
        $area_event_id=$my_row["area_event_id"];

        return new ExploreDetail($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id);
    }

    public static function search($key){
        require("connection.php");
        $sql="SELECT * FROM withdraw AS w 
        INNER JOIN Staffs AS s ON s.StaffID = w.StaffID
        WHERE (w.withdraw_id like '%$key%' or s.StaffF_Name like '%$key%'  )";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_id=$my_row["withdraw_id"] ;
            $date=$my_row["date"];
            $time=$my_row["time"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];

            $withdrawList[]= new Withdraw($withdraw_id,$date,$time,$StaffID,$StaffF_Name,$StaffL_Name);
        }
        require("connection_close.php");

        return $withdrawList;
    }

    public static function add($explore_id,$StaffID){
        
        require("connection.php");
        $sql = "INSERT INTO explore_detail(explore_id,StaffID)values('$explore_id','$StaffID')";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function checkAdd($explore_id,$StaffID){
        
        require("connection.php");
        $sql = "SELECT * FROM explore_detail WHERE explore_id='$explore_id' AND StaffID='$StaffID'";
        $result=$conn->query($sql);
        if($result){
            return false;
        }
        return true;
    }

    public static function update($explore_detail_id,$StaffID){
        require("connection.php");
        $sql = "UPDATE explore_detail SET StaffID='$StaffID'where explore_detail_id = '$explore_detail_id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }

    public static function delete($id){
        require_once("connection.php");
        $sql = "DELETE FROM explore_detail WHERE explore_detail_id = '$id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }




}?>