<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_Hakawy extends Zend_Db_Table_Abstract  {
    protected $_name='hakawy';
    const NO_OF_ENTRIES_PER_PAGE = 20;
    
    public function submitHekaya($hekaya){
        $data = array(
            'text' => $hekaya
        );
        $row =  $this->createRow($data);
        $row->save();
        return $row->toArray();
    }
    
    public function getHakawy($pageNumber){
        $select = $this->select();
        $select->order("id DESC")
               ->limitPage($pageNumber, self::NO_OF_ENTRIES_PER_PAGE);
        $rows = $this->fetchAll($select);
        if (!$rows) {
            throw new Exception("Could not find rows");
        }
        $rowsArray = $rows->toArray();
        return $rowsArray;
    }
}

?>
