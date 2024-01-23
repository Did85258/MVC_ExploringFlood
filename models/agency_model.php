<?php class Agency{
    public $AgencyID,$AgencyName;
    public function __construct($AgencyID,$AgencyName){
        $this->AgencyID = $AgencyID;
        $this->AgencyName = $AgencyName;
    }
    public static function getAll(){
        $AgencyList=[];
        require("connection.php");
        $sql="SELECT * From Agencies ";
        $result=$conn->query($sql);
        while($my_row=$result->fetch_assoc()){
            $AgencyID=$my_row["AgencyID"];
            $AgencyName=$my_row["AgencyName"];
            $AgencyList[]= new Agency($AgencyID,$AgencyName);
        }
        require("connection_close.php");
        return $AgencyList;
    }
}?>