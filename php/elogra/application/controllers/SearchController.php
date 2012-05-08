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

        $searchService = new Application_Service_Search();
        $searchResults = $searchService->goSearch($srcID, $destID, $taxiColor);
        
        $this->view->searchResults = $searchResults;
//		Result res = s.goSearch(srcID, destID, taxiColor);
    }
    
    
}

?>
