<?php

class HakawyController extends Zend_Controller_Action
{

    public function indexAction(){
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy(1);
        $this->view->hakawy = $hakawy;
    }
    
    public function submitAction(){
        $hekaya = $this->_request->getParam("taxiTalksInput");
        $hakawyService = new Application_Service_Hakawy();
        $result = $hakawyService->submitHekaya($hekaya);
        if($result){
            $reply = array();
            $reply['html'] = $this->view->partial('partials/_hekaya.phtml', array('hekaya' => $result));;
            $this->_helper->json($reply);
        }
    }

}
?>
