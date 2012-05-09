<?php

class HakawyController extends Zend_Controller_Action
{

    public function indexAction(){
        
    }
    
    public function submitAction(){
        $hekaya = $this->_request->getParam("taxiTalksInput");
        $hakawyService = new Application_Service_Hakawy();
        $result = $hakawyService->submitHekaya($hekaya);
        if($result){
            $this->view->submitHekaya = "Hekaya submitted";
        }
    }

}
?>
