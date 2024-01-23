<?php class Returns{
    public $withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName, $StaffID, $StaffF_Name, $StaffL_Name;
    public function __construct($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name){
        $this->withdraw_return_id = $withdraw_return_id;
        $this->date_return = $date_return;
        $this->time_return = $time_return;
        $this->date = $date;
        $this->time = $time;
        $this->withdraw_detail_id = $withdraw_detail_id;
        $this->quantity_withdraw = $quantity_withdraw;
        $this->StatusID = $StatusID;
        $this->quantity_return = $quantity_return;
        $this->EquipmentID = $EquipmentID;
        $this->EquipmentName = $EquipmentName;
        $this->AgencyID = $AgencyID;
        $this->AgencyName = $AgencyName;
        $this->StaffID = $StaffID;
        $this->StaffF_Name = $StaffF_Name;
        $this->StaffL_Name = $StaffL_Name;
    }
    public static function getAll(){
        $ReturnList=[];
        require("connection.php");
        $sql="SELECT * FROM withdraw_return AS wr 
        RIGHT JOIN withdraw_detail AS wd ON wr.withdraw_detail_id = wd.withdraw_detail_id
        INNER JOIN Status AS s ON s.StatusID = wd.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        INNER JOIN withdraw AS w ON w.withdraw_id = wd.withdraw_id
        INNER JOIN Staffs AS st ON st.StaffID = w.StaffID";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_return_id=$my_row["withdraw_return_id"];
            $date_return=$my_row["date_return"];
            $time_return=$my_row["time_return"];
            $date=$my_row["date"];
            $time=$my_row["time"];
            $withdraw_detail_id=$my_row["withdraw_detail_id"];
            $quantity_withdraw=$my_row["quantity_withdraw"];
            $StatusID=$my_row["StatusID"];
            $quantity_return=$my_row["quantity_return"];
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];

            $ReturnList[]= new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
        }
        require("connection_close.php");
        return $ReturnList;
    }

    public static function getWithdraw(){
        $ReturnList=[];
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN Status AS s ON s.StatusID = wd.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        INNER JOIN withdraw AS w ON w.withdraw_id = wd.withdraw_id
        INNER JOIN Staffs AS st ON st.StaffID = w.StaffID";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_return_id=NULL;
            $date_return=NULL;
            $time_return=NULL;
            $date=$my_row["date"];
            $time=$my_row["time"];
            $withdraw_detail_id=$my_row["withdraw_detail_id"];
            $quantity_withdraw=$my_row["quantity_withdraw"];
            $StatusID=$my_row["StatusID"];
            $quantity_return=NULL;
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];

            $ReturnList[]= new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
        }
        require("connection_close.php");
        return $ReturnList;
    }

    public static function getDetail($withdraw_detail_id){
        $ReturnList=[];
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN withdraw_return AS wr ON wd.withdraw_detail_id = wr.withdraw_detail_id
        WHERE wr.withdraw_detail_id = '$withdraw_detail_id'";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_return_id=$my_row["withdraw_return_id"];
            $date_return=$my_row["date_return"];
            $time_return=$my_row["time_return"];
            $date=NULL;
            $time=NULL;
            $withdraw_detail_id=$my_row["withdraw_detail_id"];
            $quantity_withdraw=NULL;
            $StatusID=NULL;
            $quantity_return=$my_row["quantity_return"];
            $EquipmentID=NULL;
            $EquipmentName=NULL;
            $AgencyID=NULL;
            $AgencyName=NULL;
            $StaffID=NULL;
            $StaffF_Name=NULL;
            $StaffL_Name=NULL;

            $ReturnList[]= new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
        }
        require("connection_close.php");
        return $ReturnList;
    }

    public static function getReturn($withdraw_return_id){
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN withdraw_return AS wr ON wd.withdraw_detail_id = wr.withdraw_detail_id
        WHERE wr.withdraw_return_id = '$withdraw_return_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
            $withdraw_return_id=$my_row["withdraw_return_id"];
            $date_return=$my_row["date_return"];
            $time_return=$my_row["time_return"];
            $date=NULL;
            $time=NULL;
            $withdraw_detail_id=$my_row["withdraw_detail_id"];
            $quantity_withdraw=NULL;
            $StatusID=NULL;
            $quantity_return=$my_row["quantity_return"];
            $EquipmentID=NULL;
            $EquipmentName=NULL;
            $AgencyID=NULL;
            $AgencyName=NULL;
            $StaffID=NULL;
            $StaffF_Name=NULL;
            $StaffL_Name=NULL;
        require("connection_close.php");
        return new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
    
    }

    public static function get($withdraw_detail_id){
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN Status AS s ON s.StatusID = wd.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        INNER JOIN withdraw AS w ON w.withdraw_id = wd.withdraw_id
        INNER JOIN Staffs AS st ON st.StaffID = w.StaffID
        WHERE wd.withdraw_detail_id='$withdraw_detail_id'";
        
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $withdraw_return_id=NULL;
        $date_return=NULL;
        $time_return=NULL;
        $date=$my_row["date"];
        $time=$my_row["time"];
        $withdraw_detail_id=$my_row["withdraw_detail_id"];
        $quantity_withdraw=$my_row["quantity_withdraw"];
        $StatusID=$my_row["StatusID"];
        $quantity_return=NULL;
        $EquipmentID=$my_row["EquipmentID"];
        $EquipmentName=$my_row["EquipmentName"];
        $AgencyID=$my_row["AgencyID"];
        $AgencyName=$my_row["AgencyName"];
        $StaffID=$my_row["StaffID"];
        $StaffF_Name=$my_row["StaffF_Name"];
        $StaffL_Name=$my_row["StaffL_Name"];
        require("connection_close.php");
        return new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
    }

    public static function search($key){
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN Status AS s ON s.StatusID = wd.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        INNER JOIN withdraw AS w ON w.withdraw_id = wd.withdraw_id
        INNER JOIN Staffs AS st ON st.StaffID = w.StaffID
        WHERE (wd.withdraw_detail_id like '%$key%' or st.StaffF_Name like '%$key%' or e.EquipmentName like '%$key%' or a.AgencyName like '%$key%'  )";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_return_id=NULL;
            $date_return=NULL;
            $time_return=NULL;
            $date=$my_row["date"];
            $time=$my_row["time"];
            $withdraw_detail_id=$my_row["withdraw_detail_id"];
            $quantity_withdraw=$my_row["quantity_withdraw"];
            $StatusID=$my_row["StatusID"];
            $quantity_return=NULL;
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];

            $ReturnList[]= new Returns($withdraw_return_id,$date_return,$time_return,$date,$time,$withdraw_detail_id,$quantity_return ,$quantity_withdraw,$StatusID,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName,$StaffID,$StaffF_Name, $StaffL_Name);
        }
        require("connection_close.php");

        return $ReturnList;
    }

    public static function add($date_return,$time_return,$withdraw_detail_id,$quantity_return){
        
        require("connection.php");
        $sql = "INSERT INTO withdraw_return(date_return,time_return,withdraw_detail_id,quantity_return)values('$date_return','$time_return','$withdraw_detail_id','$quantity_return');";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function update($withdraw_return_id,$date_return,$time_return,$quantity_return){
        require("connection.php");
        $sql = "UPDATE withdraw_return SET date_return='$date_return',time_return='$time_return', quantity_return='$quantity_return' where withdraw_return_id = '$withdraw_return_id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }

    public static function delete($id){
        require_once("connection.php");
        $sql = "DELETE FROM withdraw_return WHERE withdraw_return_id = '$id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }



}?>