<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LiveFares
 *
 * @author efoad
 */
class Application_Model_LiveFares extends Zend_Db_Table_Abstract  {
    //put your code here
    protected $_name='live_fares';
    
    public function getLatestEntries($srcID,$destID,$taxiType){
        /////remove limit as live fares will only be updated
        $select = $this->select();
        $select->where(Application_Model_DBConstants::LIVE_FARES_SRC_ID.'= ?',(int)$srcID)
                ->where(Application_Model_DBConstants::LIVE_FARES_DEST_ID.'= ?',(int)$destID)
                ->where(Application_Model_DBConstants::LIVE_TAXI_TYPE.'= ?',(int)$taxiType);
        $row = $this->fetchAll($select);
        if (!$row) {
            throw new Exception("Could not find rows");
        }
        return $row->toArray();
    }
    
    public function submitEntry($srcID,$destID,$taxiType,$noOfEntries){
        
    }
    
}

?>
