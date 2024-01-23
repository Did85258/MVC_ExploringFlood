<?php class Staff{
    public $StaffID,$StaffF_Name, $StaffL_Name;
    public function __construct($StaffID,$StaffF_Name, $StaffL_Name){
        $this->StaffID = $StaffID;
        $this->StaffF_Name = $StaffF_Name;
        $this->StaffL_Name = $StaffL_Name;
    }
    public static function getAll(){
        $staffList=[];
        require("connection.php");
        $sql="SELECT * From Staffs";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $StaffID=$my_row["StaffID"];
            $StaffF_Name=$my_row["StaffF_Name"];
            $StaffL_Name=$my_row["StaffL_Name"];
            $staffList[]= new Staff($StaffID,$StaffF_Name, $StaffL_Name);
        }
        require("connection_close.php");
        return $staffList;
    }
}?>