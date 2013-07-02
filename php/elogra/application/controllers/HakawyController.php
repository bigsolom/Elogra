<?php

class HakawyController extends Zend_Controller_Action
{

    public function indexAction(){
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = $hakawyService->getHakawy(1);
        $this->addNickIndicatorInView();
        $this->view->hakawy = $hakawy;
    }
    
  public function xmlAction()
    {
      $id  = $this->_request->getParam("id"); 
      $hakawyService = new Application_Service_Hakawy();
      $hakawy = array();
      if(isset($id)){
          $id = intval($id);
          $hakawy[] = $hakawyService->getHekaya($id);
      }  else {
          $hakawy = $hakawyService->getHakawy(1);
      }
        
        // XML-related routine
        $xml = new DOMDocument('1.0', 'utf-8');
        $hakawyElement = $xml->createElement('hakawy');
        foreach ($hakawy as $hekaya){
            $hekayaElement = $xml->createElement('hekaya');
            $hekayaElement->appendChild($xml->createElement('id', $hekaya['id']));
            $hekayaElement->appendChild($xml->createElement('text', Application_Service_TextFormatting::htmlNlEncoding2LineFeed($hekaya['text'])));
            $hekayaElement->appendChild($xml->createElement('nickname', $hekaya['nickname']));
            $hekayaElement->appendChild($xml->createElement('hekaya_time', $hekaya['hekaya_time']));
            $hekayaElement->appendChild($xml->createElement('address', isset($hekaya['address'])?$hekaya['address']:''));
            $hekayaElement->appendChild($xml->createElement('likes', $hekaya['likes']));
            $hakawyElement->appendChild($hekayaElement);
        }
        $xml->appendChild($hakawyElement);
//        $xml->appendChild($xml->createElement('foo', 'bar'));
        $output = $xml->saveXML();

        // Both layout and view renderer should be disabled
        Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer')->setNoRender(true);
        Zend_Layout::getMvcInstance()->disableLayout();

        // Set up headers and body
        $this->_response->setHeader('Content-Type', 'text/xml; charset=utf-8')
            ->setBody($output);
    }
    
    public function jsonAction() {
        $id = $this->_request->getParam("id");
        $hakawyService = new Application_Service_Hakawy();
        $hakawy = array();
        if (isset($id)) {
            $id = intval($id);
            $hakawy[] = $hakawyService->getHekaya($id);
        } else {
            $page = $this->_request->getParam("page");
            if (!isset($page)) {
                $page = 1;
            }
            $hakawy = $hakawyService->getHakawy($page);
        }
        for($i=0;$i<count($hakawy);$i++){
            $hekaya = $hakawy[$i];
            $hekaya["hekaya_time_millis"] = strtotime($hekaya["hekaya_time"]) * 1000;
            $hakawy[$i] = $hekaya;
        }
        $this->_helper->json($hakawy);
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
    
    public function getjsonAction(){
        $id  = $this->_request->getParam("id");
        $hakawyService = new Application_Service_Hakawy();
        $hekaya = $hakawyService->getHekaya($id);
        $type='hakawy';
        $commentService = new Application_Service_Comment();
        $comments = $commentService->getComments($id, $type);
        $hekaya["comments"] = $comments;
        $this->_helper->json($hekaya);
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
        $long = $this->_request->getParam('long');
        $lat = $this->_request->getParam('lat');
        $address = $this->_request->getParam('addr');
        $location = null;
        if(isset ($long)&&isset ($lat)&&isset ($address)){
            $location = new stdClass();
            $location->longitude = $long;
            $location->latitude = $lat;
            $location->address = $address;
        }
        $result = $hakawyService->submitHekaya($hekaya, $nickname,$location);
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
    
    public function addjsonAction(){
        $hekaya = $this->_request->getParam("text");
        $nickname = $this->_request->getParam("name");
        $long = $this->_request->getParam('long');
        $lat = $this->_request->getParam('lat');
        $address = $this->_request->getParam('addr');
        $location = null;
        if(isset ($long)&&isset ($lat)&&isset ($address)){
            $location = new stdClass();
            $location->longitude = $long;
            $location->latitude = $lat;
            $location->address = $address;
        }
        $hakawyService = new Application_Service_Hakawy();
        try{
            $result = $hakawyService->submitHekaya($hekaya, $nickname,$location);
        }  catch (Exception $e){
            $result = new stdClass();
            $result->error = $e->getMessage();
        }
        $this->_helper->json($result);
    }
    
}
?>
