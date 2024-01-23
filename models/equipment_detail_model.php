<?php class EquipmentDetail{
public $StatusID, $EquipmentID, $EquipmentName, $AgencyID, $AgencyName, $StatusNot_InUse;
    public function __construct($StatusID, $EquipmentID, $EquipmentName, $AgencyID, $AgencyName, $StatusNot_InUse){
        $this->StatusID = $StatusID;
        $this->EquipmentID = $EquipmentID;
        $this->EquipmentName = $EquipmentName;
        $this->AgencyID = $AgencyID;
        $this->AgencyName = $AgencyName;
        $this->StatusNot_InUse = $StatusNot_InUse;
    }
    public static function getAll(){
        $EquipmentList=[];
        require("connection.php");
        $sql="SELECT * FROM Equipments AS e 
        INNER JOIN Status AS s ON s.EquipmentID = e.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $StatusID=$my_row["StatusID"] ;
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];
            $StatusNot_InUse=$my_row["StatusNot_InUse"];
            $EquipmentList[]= new EquipmentDetail($StatusID, $EquipmentID, $EquipmentName, $AgencyID, $AgencyName, $StatusNot_InUse);
        }
        require("connection_close.php");
        return $EquipmentList;
    }

    public static function getID($EquipmentID,$AgencyID){
        require("connection.php");
        $sql="SELECT * FROM Equipments AS e 
        INNER JOIN Status AS s ON s.EquipmentID = e.EquipmentID
        INNER JOIN Agencies AS a ON a.AgencyID = s.AgencyID
        WHERE e.EquipmentID='$EquipmentID' AND a.AgencyID = '$AgencyID'";
        $result=$conn->query($sql);
        $my_row=$result->fetch_assoc();
        $StatusID=$my_row["StatusID"] ;
        require("connection_close.php");
        return $StatusID;
    }

}?>