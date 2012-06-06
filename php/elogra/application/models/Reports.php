<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reports
 *
 * @author efoad
 */
class Application_Model_Reports extends Zend_Db_Table_Abstract {
    //put your code here
    
    const ENTITIY_ID = 'entity_id';
    const ENTITY_TYPE = 'entity_type';
    const TIMES_REPORTED = 'times_reported';
    protected $_name = 'reports';
    
    
    
    public function reportEntity($entityId, $entityType) {
        $select = $this->select();
        $select->where(self::ENTITIY_ID.'= ?', (int) $entityId)
                ->where(self::ENTITY_TYPE.'= ?', $entityType);

        $row = $this->fetchRow($select);
        if ($row) {
            $rowArray = $row->toArray();
            $timesReported = $rowArray[self::TIMES_REPORTED];
            $timesReported++;
            $data = array(self::TIMES_REPORTED => $timesReported);
            $row->__set(self::TIMES_REPORTED,$timesReported);
            $row->save();
        } else {
            $data = array(
                self::ENTITIY_ID => $entityId,
                self::ENTITY_TYPE => $entityType,
                self::TIMES_REPORTED => 1
            );
            $row = $this->createRow($data);
            $row->save();
        }
    }
    
    
}

?>
