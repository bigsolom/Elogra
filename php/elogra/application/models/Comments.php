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
        if(Application_Service_TextFormatting::isNullOrEmptyOrSpacesOnly($commentAsArray['text'])){
            throw new Exception("Comment text required");
        }
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
    
    public function getComments($id,$type){
        $select = $this->select();
        $select->where(self::ENTITIY_ID." = ?",(int)$id)
                ->where(self::ENTITY_TYPE." = ?",$type)
                ->order("id ASC");
        $rows = $this->fetchAll($select);
        return $rows->toArray();
    }
    
    public function getCommentsCount($id,$type){
        $select = $this->select();
        $select->from($this->_name,'COUNT(*) AS num')
                ->where(self::ENTITIY_ID." = ?",(int)$id)
                ->where(self::ENTITY_TYPE." = ?",$type);
        return $this->fetchRow($select)->num;
    }
    
}

?>
