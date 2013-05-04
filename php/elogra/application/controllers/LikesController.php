<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LikesController
 *
 * @author efoad
 */
class LikesController extends Zend_Controller_Action{
    
    public function postjsonAction(){
        $id = $this->_request->getParam('id');
        $type = $this->_request->getParam('type');        
        $likeService = new Application_Service_Hakawy();
        $likeService->likeHekaya($id, $type);
        $this->_helper->json(array('status'=>true));
    }


    
}

?>
