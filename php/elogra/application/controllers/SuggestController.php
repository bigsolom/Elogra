<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuggestController
 *
 * @author mfayyad
 */
class SuggestController extends Zend_Controller_Action{
    public function indexAction(){
        $parentID = $this->_request->getParam("from");
        $otherText = $this->_request->getParam("newParent");
        $name = $this->_request->getParam("name");
        $suggestService = new Application_Service_Suggest();
        if($otherText != ""){
            $suggestService->submitNewArea(-1, $otherText);
        }else{
            $suggestService->submitNewArea($parentID, $name);
        }
    }
    //put your code here
}

?>
