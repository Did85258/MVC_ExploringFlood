<?php class AreaEvent{
    public $area_event_id,$district_id,$date,$amountvalue,$name_th;
    // public $EquipmentID, $EquipmentName, $AgencyID, $AgencyName,$withdraw_detail_id,$StatusID,$quantity_withdraw;
    
    public function __construct($area_event_id,$district_id,$date,$amountvalue,$name_th){
        $this->area_event_id = $area_event_id;
        $this->district_id = $district_id;
        $this->date = $date;
        $this->amountvalue = $amountvalue;
        $this->name_th = $name_th;
    }
    public static function getAll(){
        $areaEventList=[];
        require("connection.php");
        $sql="SELECT * FROM area_event AS ae
        INNER JOIN districts AS d ON ae.district_id = d.id
        WHERE ae.area_event_id NOT IN (SELECT area_event_id FROM explore);";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $area_event_id=$my_row["area_event_id"] ;
            $district_id=$my_row["district_id"];
            $date=$my_row["date"];
            $amountvalue=$my_row["amountvalue"];
            $name_th=$my_row["name_th"];

            $areaEventList[]= new AreaEvent($area_event_id,$district_id,$date,$amountvalue,$name_th);
        }
        require("connection_close.php");
        return $areaEventList;
    }
    public static function get($area_event_id){
        require("connection.php");
        $sql="SELECT * FROM area_event AS ae
        INNER JOIN districts AS d ON ae.district_id = d.id
        WHERE ae.area_event_id='$area_event_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $area_event_id=$my_row["area_event_id"] ;
        $district_id=$my_row["district_id"];
        $date=$my_row["date"];
        $amountvalue=$my_row["amountvalue"];
        $name_th=$my_row["name_th"];

        require("connection_close.php");

        return new AreaEvent($area_event_id,$district_id,$date,$amountvalue,$name_th);
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





}?>