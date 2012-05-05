<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AjaxController
 *
 * @author efoad
 */
class AjaxController extends Zend_Controller_Action {
    //put your code here
    
    public function init(){

    }
    
    public function gettoplevelareasAction(){
        $areas = new Application_Model_Areas();
        $topLevelAreas = $areas->getParentAreas();
        $this->_helper->json($topLevelAreas);

    }
    
    public function getareasunderAction(){
        $id = $this->_request->getParam("id");
        $areas = new Application_Model_Areas();
        $areasUnder = $areas->getAreasUnder($id);
        $this->_helper->json($areasUnder);
    }
}

?>
