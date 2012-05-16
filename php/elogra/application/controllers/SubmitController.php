<?php

class SubmitController extends Zend_Controller_Action
{

    public function indexAction()
    {

    }
    
    public function postAction(){
        
        $srcID = $this->_request->getParam("fromHS");
        $destID = $this->_request->getParam("toHS");
        $taxiColor = $this->_request->getParam("imgRadio-input");
        $fare = $this->_request->getParam("fare");
        $fromAddr = $this->_request->getParam("fromAddr");
        $toAddr = $this->_request->getParam("toAddr");
       // $when = $this->_request->getParam("when");
        $comment = $this->_request->getParam("comment");
        $traffic = $this->_request->getParam("traffic");
        
        $submitService = new Application_Service_Submit();
        $submitService->goSubmit($srcID, $destID, $fromAddr, $toAddr, $taxiColor, $comment, $fare, $traffic);
        
//        $searchService = new Application_Service_Search();
//        $searchResults = $searchService->goSearch($srcID, $destID, $taxiColor);
        $this->_redirect($this->view->url(array('controller'=>'search','action'=>'get', 'fromHS' => $srcID
            , 'toHS' => $destID, 'imgRadio-input' => $taxiColor),'default',true));
        
        //$this->view->submitEntry = "Entry submitted";

    }
}
?>
