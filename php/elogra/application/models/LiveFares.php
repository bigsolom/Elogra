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
        /////////// to get both ways //////////////////////////
        $rowArray = $row->toArray();
        
        $select = $this->select();
        $select->where(Application_Model_DBConstants::LIVE_FARES_SRC_ID.'= ?',(int)$destID)
                ->where(Application_Model_DBConstants::LIVE_FARES_DEST_ID.'= ?',(int)$srcID)
                ->where(Application_Model_DBConstants::LIVE_TAXI_TYPE.'= ?',(int)$taxiType);
        $row = $this->fetchAll($select);
        
        $rowArray2 = $row->toArray();
        
        $resultsArray = array_merge($rowArray, $rowArray2);
        ///////////////////////////////////////////////////////
        if (!$row) {
            throw new Exception("Could not find rows");
        }
        return $resultsArray;
    }
    
    public function updateFares($srcID,$destID,$taxiType,$fare){
        $select = $this->select();
        $select->where(Application_Model_DBConstants::LIVE_FARES_SRC_ID.'= ?',(int)$srcID)
                ->where(Application_Model_DBConstants::LIVE_FARES_DEST_ID.'= ?',(int)$destID)
                ->where(Application_Model_DBConstants::LIVE_TAXI_TYPE.'= ?',(int)$taxiType);
        $row = $this->fetchAll($select);
        if (count($row) < 1) {
            $data = array(
                'fare' => $fare,
                'time_last_update' => new Zend_Db_Expr('NOW()'),   
                'src_id' => $srcID,
                'dest_id' => $destID,
                'taxi_type' => $taxiType
            );
            $this->insert($data);
            //throw new Exception("Could not find rows");
        }else{
            $data = array(
                'fare' => $fare,
                'time_last_update' => new Zend_Db_Expr('NOW()')
            );
            
            $where[] = $this->getAdapter()->quoteInto('src_id = ?', (int)$srcID);
            $where[] = $this->getAdapter()->quoteInto('dest_id = ?', (int)$destID);
            $where[] = $this->getAdapter()->quoteInto('taxi_type = ?', (int)$taxiType);
            
//            $where = array(
//                "src_id= $srcID",
//                "dest_id= $destID",
//                "taxi_type= $taxiType"
//            );

            $this->update($data, $where);
            

        }
    }
}

?>
