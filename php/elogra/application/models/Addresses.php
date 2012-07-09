<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Addresses
 *
 * @author efoad
 */
class Application_Model_Addresses extends Zend_Db_Table_Abstract {
    //put your code here
    
    protected $_name='addresses';
    
    protected $_referenceMap    = array(
        'Source_Entry_Address' => array(
            'columns'           => 'id',
            'refTableClass'     => 'Application_Model_Entries',
            'refColumns'        => 'src_addr_id'
        ),
        'Destination_Entry_Address' => array(
            'columns'           => 'id',
            'refTableClass'     => 'Application_Model_Entries',
            'refColumns'        => 'dest_addr_id'
        ));
    
    public function getAddressText($id){
        $row = $this->fetchRow("id = $id");
        if (!$row) {
            throw new Exception("Could not find address with ID $id");
        }
        return $row->toArray();
    }
    
    public function checkAddress($areaID, $address){
        if($address == ""){
            return null;
        }
        $select = $this->select();
        $select->where(Application_Model_DBConstants::ADDRESSES_AREA_ID.'= ?',(int)$areaID)
                ->where(Application_Model_DBConstants::ADDRESSES_TEXT.'= ?',$address);
        
        $rows = $this->fetchAll($select);
        $rowCount = count($rows);
        $rowCount = $rows->count();
        if (count($rows) <= 0) {
            //throw new Exception("Could not find rows");
            $data = array(
            'text' => $address,
             'area_id' => $areaID   
            );
            $this->insert($data);
            $lastID = $this->getAdapter()->lastInsertId();
            return $lastID;
        }else{
            $rowArray = $rows->toArray();
            foreach ($rowArray as $row){
                return $row['id'];
            }
        }
    }
}

?>
