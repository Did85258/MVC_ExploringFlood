<?php class Explore{
    public $explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id;
    // public $EquipmentID, $EquipmentName, $AgencyID, $AgencyName,$withdraw_detail_id,$StatusID,$quantity_withdraw;
    
    public function __construct($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id){
        $this->explore_id = $explore_id;
        $this->date_explore = $date_explore;
        $this->time_explore = $time_explore;
        $this->withdraw_id = $withdraw_id;
        $this->area_event_id = $area_event_id;
    }
    public static function getAll(){
        $exploreList=[];
        require("connection.php");
        $sql="SELECT * FROM explore AS e
        INNER JOIN area_event AS ae ON ae.area_event_id = e.area_event_id";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $explore_id=$my_row["explore_id"] ;
            $date_explore=$my_row["date_explore"];
            $time_explore=$my_row["time_explore"];
            $withdraw_id=$my_row["withdraw_id"];
            $area_event_id=$my_row["area_event_id"];

            $exploreList[]= new Explore($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id);
        }
        require("connection_close.php");
        return $exploreList;
    }
    public static function get($explore_id){
        require("connection.php");
        $sql="SELECT * FROM explore AS e
        INNER JOIN area_event AS ae ON ae.area_event_id = e.area_event_id
        WHERE e.explore_id='$explore_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $explore_id=$my_row["explore_id"] ;
        $date_explore=$my_row["date_explore"];
        $time_explore=$my_row["time_explore"];
        $withdraw_id=$my_row["withdraw_id"];
        $area_event_id=$my_row["area_event_id"];

        return new Explore($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id);
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

    public static function add($withdraw_id,$date_explore,$time_explore,$area_event_id){
        
        require("connection.php");
        $sql = "INSERT INTO explore(withdraw_id,date_explore,time_explore,area_event_id)values('$withdraw_id','$date_explore','$time_explore','$area_event_id')";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function update($explore_id,$date_explore,$time_explore){
        require("connection.php");
        $sql = "UPDATE explore SET date_explore='$date_explore',time_explore='$time_explore' where explore_id = '$explore_id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }

    public static function delete($id){
        require_once("connection.php");
        $sql = "DELETE FROM explore WHERE explore_id = '$id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }




}?>