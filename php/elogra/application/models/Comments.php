<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comments
 *
 * @author efoad
 */
class Application_Model_Comments extends Zend_Db_Table_Abstract {
    //put your code here
    
    const ENTITIY_ID = 'entity_id';
    const ENTITY_TYPE = 'entity_type';
    protected $_name = 'comments';
    
    public function addComment($commentAsArray){
        $data = array(
                self::ENTITIY_ID => $commentAsArray['entity_id'],
                self::ENTITY_TYPE => $commentAsArray['entity_type'],
                'text'=>$commentAsArray['text'],
                'nickname'=>$commentAsArray['nickname'],
                'status'=>0
            );
            $row = $this->createRow($data);
            $row->save();
            return $row->toArray();
    }
    
}

?>
