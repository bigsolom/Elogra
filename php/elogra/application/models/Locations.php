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
class Application_Model_Locations extends Zend_Db_Table_Abstract {
    //put your code here
    
    const ENTITIY_ID = 'entity_id';
    const ENTITY_TYPE = 'entity_type';
    const LONGITUDE = 'longitude';
    const LATITUDE = 'latitude';
    const ADDRESS = 'addr';
    protected $_name = 'locations';
    
    public function addLocation($entityId, $entityType, $long, $lat, $addr) {
        $data = array(
            self::ENTITIY_ID => $entityId,
            self::ENTITY_TYPE => $entityType,
            self::LONGITUDE => $long,
            self::LATITUDE => $lat,
            self::ADDRESS => $addr,
        );
        $row = $this->createRow($data);
        $row->save();
        return $row->toArray();
    }


    
    
}

?>
