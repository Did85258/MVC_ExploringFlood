<?php class Equipment{
    public $EquipmentID,$EquipmentName;
    public function __construct($EquipmentID,$EquipmentName){
        $this->EquipmentID = $EquipmentID;
        $this->EquipmentName = $EquipmentName;
    }
    public static function getAll(){
        $EquipmentList=[];
        require("connection.php");
        $sql="SELECT * From Equipments ";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $EquipmentID=$my_row["EquipmentID"];
            $EquipmentName=$my_row["EquipmentName"];
            $EquipmentList[]= new Equipment($EquipmentID,$EquipmentName);
        }
        require("connection_close.php");
        return $EquipmentList;
    }
}?>