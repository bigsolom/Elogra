<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SearchController
 *
 * @author efoad
 */
class SearchController extends Zend_Controller_Action {
    //put your code here
    
    public function indexAction(){
        
    }
    
    public function getAction(){
        $srcID = $this->_request->getParam("fromHS");
        $destID = $this->_request->getParam("toHS");
        $taxiColor = $this->_request->getParam("imgRadio-input");
        $srcParentID = $this->_request->getParam("from");
        $destParentID = $this->_request->getParam("to");
        
        $searchService = new Application_Service_Search();
        $searchResults = $searchService->goSearch($srcID, $destID, $srcParentID, $destParentID, 2);
        if ($searchResults->liveFare == 0) {//no results found
            $this->view->noResult = true;
        }
        $this->view->searchResults = $searchResults;
         $this->view->from = $srcID;
         $this->view->to = $destID;
         $this->view->taxi = 2;
//		Result res = s.goSearch(srcID, destID, taxiColor);
    }
    
    public function moreAction(){
        $page = $this->_request->getParam('page');
        $srcID = $this->_request->getParam("from");
        $destID = $this->_request->getParam("to");
        $srcParentID = $this->_request->getParam("from");
        $destParentID = $this->_request->getParam("to");
        
        $searchService = new Application_Service_Search();
        $searchResults = $searchService->goSearch($srcID, $destID, $srcParentID, $destParentID, 2,$page);
        $html = '';
        foreach ($searchResults->comments as $comment){
            $html .= $this->view->partial('partials/_entrySearch.phtml',array('comment'=>$comment));
        }
        $result = array();
        $result['html'] = $html;
        $this->_helper->json($result);
    }
    
    
}

?>
