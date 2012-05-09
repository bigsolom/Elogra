<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Application_Model_Hakawy extends Zend_Db_Table_Abstract  {
    protected $_name='hakawy';
    
    public function submitHekaya($hekaya){
        $data = array(
            'text' => $hekaya
        );
        $this->insert($data);
    }
}

?>
