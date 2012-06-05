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
    
    public function reportAction(){
        $id = $this->_request->getParam('id');
        $type = $this->_request->getParam('type');
        if($type != Application_Model_DBConstants::REPORT_TYPE_HAKAWY && $type != Application_Model_DBConstants::REPORT_TYPE_ENTRIES){
            throw new InvalidArgumentException('Invalid type');
        }
        $reportService = new Application_Service_Report();
        $reportService->reportEntry($id, $type);
    }
}

?>
