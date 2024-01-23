<?php
$controllers = array('pages'=>['home','error'],
'withdraw'=>['index','create','search','add','edit','update','delete','detail','createDetail','addDetail','editDetail','updateDetail','deleteDetail'],
'return'=>['index','create','search','add','edit','update','delete','detail','sum'],
'explore'=>['index','create','search','add','edit','update','delete','explore','detail','createDetail','addDetail','editDetail','updateDetail','deleteDetail','sum']
);
function call($controller,$action){
    //echo $controller.$action."<br>"."controllers/".$controller."_controller.php<br>";
    require_once("controllers/".$controller."_controller.php");
    switch($controller){
        case "pages": $controller = new PagesController();break;
        case "withdraw": require_once("models/withdraw_model.php");
                        require_once("models/staff_model.php");
                        require_once("models/withdraw_detail_model.php");
                        require_once("models/equipment_model.php");
                        require_once("models/agency_model.php");
                        require_once("models/equipment_detail_model.php");
                        $controller = new WithdrawController();
                        break;
        case "return": require_once("models/return_model.php");
                        $controller = new ReturnController();
                        break;
        case "explore": require_once("models/explore_model.php");
                        require_once("models/area_event_model.php");
                        require_once("models/withdraw_model.php");
                        require_once("models/explore_detail_model.php");
                        require_once("models/staff_model.php");
                        require_once("models/sum_explore_model.php");
                        $controller = new ExploreController();
                        break;
            
        
    }
    $controller->{$action}();
}

if(array_key_exists($controller,$controllers)){
    if(in_array($action,$controllers[$controller])){
        call($controller,$action);
    }
    else{
        call('pages','error');
    }
}
else{
    call('pages','error');
}

?>