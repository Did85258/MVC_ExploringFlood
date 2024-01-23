<?php class Withdraw{
    public $withdraw_id,$date,$time,$StaffID,$StaffF_Name,$StaffL_Name;
    // public $EquipmentID, $EquipmentName, $AgencyID, $AgencyName,$withdraw_detail_id,$StatusID,$quantity_withdraw;
    
    public function __construct($withdraw_id,$date,$time,$StaffID,$StaffF_Name,$StaffL_Name){
        $this->withdraw_id = $withdraw_id;
        $this->date = $date;
        $this->time = $time;
        $this->StaffID = $StaffID;
        $this->StaffF_Name = $StaffF_Name;
        $this->StaffL_Name = $StaffL_Name;
    }
    public static function getAll(){
        $withdrawList=[];
        require("connection.php");
        $sql="SELECT * FROM withdraw AS w 
        INNER JOIN Staffs AS s ON s.StaffID = w.StaffID";
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
    public static function get($withdraw_id){
        require("connection.php");
        $sql="SELECT * FROM withdraw AS w 
        INNER JOIN Staffs AS s ON s.StaffID = w.StaffID
        WHERE w.withdraw_id='$withdraw_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $withdraw_id=$my_row["withdraw_id"] ;
        $date=$my_row["date"];
        $time=$my_row["time"];
        $StaffID=$my_row["StaffID"];
        $StaffF_Name=$my_row["StaffF_Name"];
        $StaffL_Name=$my_row["StaffL_Name"];
        require("connection_close.php");

        return new Withdraw($withdraw_id,$date,$time,$StaffID,$StaffF_Name,$StaffL_Name);
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

    public static function add($date,$time,$StaffID){
        
        require("connection.php");
        $sql = "INSERT INTO withdraw(date,time,StaffID)values('$date','$time','$StaffID')";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function update($withdraw_id,$date,$time,$StaffID){
        require("connection.php");
        $sql = "UPDATE withdraw SET date='$date',time='$time',StaffID='$StaffID' where withdraw_id = '$withdraw_id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }

    public static function delete($id){
        require_once("connection.php");
        $sql = "DELETE FROM withdraw WHERE withdraw_id = '$id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }




}?>