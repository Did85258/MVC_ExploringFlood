<?php class SumExplore{
    public $explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name,$date;
    
    public function __construct($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name,$date){
        $this->explore_id = $explore_id;
        $this->date_explore = $date_explore;
        $this->time_explore = $time_explore;
        $this->withdraw_id = $withdraw_id;
        $this->area_event_id = $area_event_id;
        $this->explore_detail_id = $explore_detail_id;
        $this->StaffID = $StaffID;
        $this->StaffF_Name = $StaffF_Name;
        $this->StaffL_Name = $StaffL_Name;
        $this->date = $date;
    }
    public static function getAll(){
        $exploreList=[];
        require("connection.php");
        $sql="SELECT * FROM explore AS e
        INNER JOIN area_event AS ae ON ae.area_event_id = e.area_event_id
        INNER JOIN explore_detail AS ed ON ed.explore_id = e.explore_id
        INNER JOIN Staffs AS s ON s.StaffID=ed.StaffID";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $explore_id=$my_row["explore_id"] ;
            $date_explore=$my_row["date_explore"];
            $time_explore=$my_row["time_explore"];
            $withdraw_id=$my_row["withdraw_id"];
            $area_event_id=$my_row["area_event_id"];
            $explore_detail_id=$my_row["explore_detail_id"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];
            $date=$my_row["date"];

            $exploreList[]= new SumExplore($explore_id,$date_explore,$time_explore,$withdraw_id,$area_event_id,$explore_detail_id,$StaffID,$StaffF_Name,$StaffL_Name,$date);
        }
        require("connection_close.php");
        return $exploreList;
    }



}?>