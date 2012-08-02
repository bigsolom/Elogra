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
        $result =  $this->addComment($hekayaId, 'hakawy', $commentText, $nickname);
        if ($result) {
            $hakawyModel = new Application_Model_Hakawy();
            $hakawyModel->incrementCommentsCount($hekayaId);
        }
        return $result;
    }
    
    private function addComment($entityId,$entityType,$text,$nickname){
        $commentModel = new Application_Model_Comments();
        return $commentModel->addComment(array('entity_id'=>$entityId,'entity_type'=>$entityType,'text'=>$text,'nickname'=>$nickname));
        
    }
    
    public function getComments($entityId,$entityType){
        $commentModel = new Application_Model_Comments();
        return $commentModel->getComments($entityId, $entityType);
    }

    public function getCommentsCount($entityId,$entityType){
        $commentModel = new Application_Model_Comments();
        return $commentModel->getCommentsCount($entityId, $entityType);
    }
    
}

?>
