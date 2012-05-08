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
}

?>
