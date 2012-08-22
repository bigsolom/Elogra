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
        if (!$this->isActionInSession($type, $id)) {
            $reportService = new Application_Service_Report();
            $reportService->reportEntry($id, $type);
            $this->addActionToSession($type, $id);
            $this->_helper->json(array('status'=>true));
        }else{
            $this->_helper->json(array('status'=>false));
            
        }
    }
    
    public function likeAction(){
        $id = $this->_request->getParam('id');
        $type = $this->_request->getParam('type');        
        if (!$this->isActionInSession($type, $id)) {
            $likeService = new Application_Service_Hakawy();
            $likeService->likeHekaya($id, $type);
            $this->addActionToSession($type, $id);
            $this->_helper->json(array('status'=>true));
        }else{
            $this->_helper->json(array('status'=>false));
            
        }
        
    }
    
    private function getActionsInSession(){
        $actionsSession = new Zend_Session_Namespace('actions');
        $actions = $actionsSession->actions;
        return $actions;
    }
    
    private function setActionsInSession($actions){
        $actionsSession = new Zend_Session_Namespace('actions');
        $actionsSession->actions = $actions;
    }

    private function isActionInSession($type,$id){
        $actions = $this->getActionsInSession();
        if($actions == null ){
            $actions = array();
        }
        return (in_array(array('type'=>$type,'id'=>$id), $actions));
    }

    private function addActionToSession($type,$id){
        $actions = $this->getActionsInSession();
        $actions[] = array('type'=>$type,'id'=>$id);
        $this->setActionsInSession($actions);
    }
    
    public function setnickAction(){
        $nick = $this->_request->getParam('nick');
        $nickSession = new Zend_Session_Namespace('nickSession');
        $nickSession->nickname = $nick;
        $result = true;
        $this->_helper->json($result);
        
    }
    
}

?>
