<?php

class HakawyController extends Zend_Controller_Action
{

    public function indexAction(){
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy(1);
    
        $nickSession = new Zend_Session_Namespace('nickSession');
        if(($nickSession->nickname != '') && ($nickSession->nickname != null)){
            $this->view->nickname = $nickSession->nickname;
        }else{
            $this->view->nickname = 'NoNickN';
        }
        $this->view->hakawy = $hakawy;
    }
    
    public function getAction(){
        $id  = $this->_request->getParam("id");
        $hakawyService = new Application_Service_Hakawy();
        $hekaya = $hakawyService->getHekaya($id);
        $this->view->hekaya = $hekaya;
       
    }
    
    public function moreAction(){
        $page = $this->_request->getParam('page');
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy($page);
        
        $html = '';
        foreach ($hakawy as $hekaya){
            $html .= $this->view->partial('partials/_hekaya.phtml',array('hekaya'=>$hekaya));
        }
        $result = array();
        $result['html'] = $html;
        $this->_helper->json($result);
    }
    
    public function submitAction(){
        $hekaya = $this->_request->getParam("taxiTalksInput");
        $nickname = $this->_request->getParam("nicknameInput");
        
        $nickSession = new Zend_Session_Namespace('nickSession');
        $nickSession->nickname = $nickname;
        
        $hakawyService = new Application_Service_Hakawy();
        $result = $hakawyService->submitHekaya($hekaya, $nickname);
        if($result){
            $reply = array();
            $html = $this->view->partial('partials/_hekaya.phtml', array('hekaya' => $result));
            $reply['html'] = $html;
            $reply['nickname'] = $nickname;
            $this->notifyConnectedUsers($html,  $this->_request->getParam('sock_id'));
            $this->_helper->json($reply);
        }
    }
    
    private function notifyConnectedUsers($hekayaHtml,$execlude){
        $pusherConfig = Zend_Registry::get('config')->get('pusher')->toArray();
        $pusher = new Elogra_Pusher($pusherConfig['key'],$pusherConfig['secret'],$pusherConfig['app_id']);
        $pusher->trigger('test_channel','hekaya_added',$hekayaHtml,$execlude);
    }

}
?>
