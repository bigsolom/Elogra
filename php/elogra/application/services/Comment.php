<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author efoad
 */
class Application_Service_Comment {
    //put your code here
    
    public function commentOnHekaya($hekayaId,$commentText,$nickname){
        return $this->addComment($hekayaId, 'hakawy', $commentText, $nickname);
    }
    
    private function addComment($entityId,$entityType,$text,$nickname){
        $commentModel = new Application_Model_Comments();
        return $commentModel->addComment(array('entity_id'=>$entityId,'entity_type'=>$entityType,'text'=>$text,'nickname'=>$nickname));
    }
    
    public function getComments($entityId,$entityType){
        $commentModel = new Application_Model_Comments();
        return $commentModel->getComments($entityId, $entityType);
    }

    
}

?>
