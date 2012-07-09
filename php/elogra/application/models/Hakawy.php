<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_Hakawy extends Zend_Db_Table_Abstract  {
    const LIKES = 'likes';
    const DISLIKES = 'dislikes';
    const ENTITIY_ID = 'id';
    
    protected $_name='hakawy';
    const NO_OF_ENTRIES_PER_PAGE = 5;
    
    public function submitHekaya($hekaya, $nickname){
        $data = array(
            'text' => $hekaya,
            'nickname' => $nickname
        );
        $row =  $this->createRow($data);
        $row->save();
        return $row->toArray();
    }
    
    public function getHakawy($pageNumber){
        $select = $this->select();
        $select->order("id DESC")
                ->where(Application_Model_DBConstants::HAKAWY_STATUS."=?",0)
               ->limitPage($pageNumber, self::NO_OF_ENTRIES_PER_PAGE);
        $rows = $this->fetchAll($select);
        if (!$rows) {
            throw new Exception("Could not find rows");
        }
        $rowsArray = $rows->toArray();
        return $rowsArray;
    }
    
    public function getHekayaById($id){
        $select = $this->select();
        $select->where(Application_Model_DBConstants::HAKAWY_ID." = ?",(int)$id)
                ->where(Application_Model_DBConstants::HAKAWY_STATUS."=?",0);
        $row = $this->fetchRow($select);
        if (!$row) {
            throw new Exception("Could not find rows");
        }
        return $row->toArray();
    }
    
        public function likeHekaya($id, $type){
        if($type == Application_Model_DBConstants::HAKAWY_LIKE){
            $select = $this->select();
            $select->where(self::ENTITIY_ID.'= ?', (int) $id);

            $row = $this->fetchRow($select);
            if ($row) {
                $rowArray = $row->toArray();
                $likes = $rowArray[self::LIKES];
                $likes++;
                $data = array(self::LIKES => $likes);
                $row->__set(self::LIKES,$likes);
                $row->save();
            }
        }else if($type == Application_Model_DBConstants::HAKAWY_DISLIKE){
                        $select = $this->select();
            $select->where(self::ENTITIY_ID.'= ?', (int) $id);

            $row = $this->fetchRow($select);
            if ($row) {
                $rowArray = $row->toArray();
                $likes = $rowArray[self::DISLIKES];
                $likes++;
                $data = array(self::DISLIKES => $likes);
                $row->__set(self::DISLIKES,$likes);
                $row->save();
            }
        }
    }
}

?>
