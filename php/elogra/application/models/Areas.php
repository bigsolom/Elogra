<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Areas
 *
 * @author efoad
 */
class Application_Model_Areas extends Zend_Db_Table_Abstract {
    //put your code here
    
    protected $_name='areas';
    
    public function getParentAreas(){
        $row = $this->fetchAll('parent_id is null AND approved=1');
        if (!$row) {
            throw new Exception("Could not find rows");
        }
        return $row->toArray();
    }
    
    public function getAreasUnder($id){
        $row = $this->fetchAll("parent_id = $id AND approved=1");
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
}

?>
