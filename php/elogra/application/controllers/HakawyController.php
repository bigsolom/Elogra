<?php

class HakawyController extends Zend_Controller_Action
{

    public function indexAction(){
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy(1);
        $this->addNickIndicatorInView();
        $this->view->hakawy = $hakawy;
    }
    
    private function addNickIndicatorInView(){
        $nickSession = new Zend_Session_Namespace('nickSession');
        if(($nickSession->nickname != '') && ($nickSession->nickname != null)){
            $this->view->nickset = 1;
        }else{
            $this->view->nickset = 0;
            
        }
        
    }


    public function getAction(){
        $id  = $this->_request->getParam("id");
        $hakawyService = new Application_Service_Hakawy();
        $hekaya = $hakawyService->getHekaya($id);
        $this->view->hekaya = $hekaya;
        $this->addNickIndicatorInView();
       
    }
    
    public function moreAction(){
        $page = $this->_request->getParam('page');
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy($page);
        $options = array();
        $options['enableJsonExprFinder'] = true;
        $options['keepLayouts'] = false;
        $html = '';
        foreach ($hakawy as $hekaya){
            $html .= $this->view->partial('partials/_hekaya.phtml',array('hekaya'=>$hekaya));
        }
        $result = array();
        $result['html'] = $html;
        $this->_helper->json($result,$options);
    }
    
    public function submitAction(){
        $hekaya = $this->_request->getParam("taxiTalksInput");
        
        $nickSession = new Zend_Session_Namespace('nickSession');
        $nickname = $nickSession->nickname;
        
        $hakawyService = new Application_Service_Hakawy();
        $result = $hakawyService->submitHekaya($hekaya, $nickname);
        $notificationsHelper = $this->_helper->Notifications;

        if($result){
            $reply = array();
            $html = $this->view->partial('partials/_hekaya.phtml', array('hekaya' => $result));
            $reply['html'] = $html;
            $reply['nickname'] = $nickname;
            $notificationsHelper->notifyConnectedUsers('hakawy_channel','hekaya_added',$html,$this->_request->getParam('sock_id'));
            $this->_helper->json($reply);
        }
    }
    
}
?>
