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
    
    protected $_referenceMap = array(
        'Source_Entry_Area' => array(
            'columns' => 'id',
            'refTableClass' => 'Application_Model_Entries',
            'refColumns' => 'src_id'
        ),
        'Destination_Entry_Area' => array(
            'columns' => 'id',
            'refTableClass' => 'Application_Model_Entries',
            'refColumns' => 'dest_id'
            ));
    
    public function getParentAreas(){
        $row = $this->fetchAll('parent_id is null AND approved=1', 'name');
        if (!$row) {
            throw new Exception("Could not find rows");
        }
        return $row->toArray();
    }
    
    public function getAreasUnder($id){
        $row = $this->fetchAll("parent_id = $id AND approved=1", 'name');
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
    }
    
    public function submitArea($name, $parent_id){
        if($parent_id == -1){
            $data = array(
                'name' => $name,
                'parent_id' => null
            );
            $this->insert($data);
        }else{
            $data = array(
                'name' => $name,
                'parent_id' => $parent_id
            );
            $this->insert($data);            
        }
    }
}

?>
