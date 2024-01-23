<?php class withdrawDetail{
    // public $withdraw_id,$date,$time,$StaffID,$StaffF_Name,$StaffL_Name;
    public $withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName;
    
    public function __construct($withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName){
        $this->withdraw_detail_id = $withdraw_detail_id;
        $this->StatusID = $StatusID;
        $this->quantity_withdraw = $quantity_withdraw;
        $this->withdraw_id = $withdraw_id;
        $this->EquipmentID = $EquipmentID;
        $this->EquipmentName = $EquipmentName;
        $this->AgencyID = $AgencyID;
        $this->AgencyName = $AgencyName;
    }
    public static function getAll($id){
        $withdrawDetailList=[];
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN Status AS s ON s.StatusID = wd.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        WHERE wd.withdraw_id = '$id'";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $withdraw_detail_id=$my_row["withdraw_detail_id"] ;
            $StatusID=$my_row["StatusID"];
            $quantity_withdraw=$my_row["quantity_withdraw"];
            $withdraw_id=$my_row["withdraw_id"];
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];

            $withdrawDetailList[]= new withdrawDetail($withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName);
        }
        require("connection_close.php");
        return $withdrawDetailList;
    }
    public static function get($withdraw_detail_id){
        require("connection.php");
        $sql="SELECT * FROM withdraw_detail AS wd
        INNER JOIN Status AS s ON wd.StatusID = s.StatusID
        INNER JOIN Equipments AS e ON e.EquipmentID = s.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        WHERE wd.withdraw_detail_id='$withdraw_detail_id'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $withdraw_detail_id=$my_row["withdraw_detail_id"] ;
        $StatusID=$my_row["StatusID"];
        $quantity_withdraw=$my_row["quantity_withdraw"];
        $withdraw_id=$my_row["withdraw_id"];
        $EquipmentID=$my_row["EquipmentID"];
        $EquipmentName=$my_row["EquipmentName"];
        $AgencyID=$my_row["AgencyID"];
        $AgencyName=$my_row["AgencyName"];
        require("connection_close.php");

        return new withdrawDetail($withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id,$EquipmentID, $EquipmentName, $AgencyID ,$AgencyName);
    }


    public static function add($StatusID,$quantity_withdraw,$withdraw_id){
        
        require("connection.php");
        $sql = "INSERT INTO withdraw_detail(StatusID,quantity_withdraw,withdraw_id)values('$StatusID','$quantity_withdraw','$withdraw_id')";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "add success $result rows";
    }

    public static function update($withdraw_detail_id,$StatusID,$quantity_withdraw,$withdraw_id){
        require("connection.php");
        $sql = "UPDATE withdraw_detail SET StatusID='$StatusID',quantity_withdraw='$quantity_withdraw', withdraw_id='$withdraw_id' where withdraw_detail_id = '$withdraw_detail_id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "update success $result rows";
    }


    public static function delete($id){
        require_once("connection.php");
        $sql = "DELETE FROM withdraw_detail WHERE withdraw_detail_id = '$id'";
        $result=$conn->query($sql);
        require("connection_close.php");
        return "delete success $result rows";
    }


}?>