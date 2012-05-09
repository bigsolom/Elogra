<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entries
 *
 * @author efoad
 */
class Application_Model_Entries extends Zend_Db_Table_Abstract {
    //put your code here
    protected $_name='entries';
    
    protected $_dependentTables = array('Application_Model_Addresses','Application_Model_Areas');
    
    //TODO pagination
    public function getEntries($srcID,$destID,$taxiType,$count,$offset) {
        $select = $this->select();
        $select->where(Application_Model_DBConstants::ENTRIES_SRC_ID." = ?",(int)$srcID)
                ->where(Application_Model_DBConstants::ENTRIES_DEST_ID." = ?",(int)$destID)
                ->where(Application_Model_DBConstants::ENTRIES_TAXI_TYPE." = ?", (int)$taxiType)
                ->order("id DESC")
                ->limit($count, $offset);
        $rows = $this->fetchAll($select);
        if (!$rows) {
            throw new Exception("Could not find rows");
        }
        $rowsArray = array();
        foreach ($rows as $row){
            $srcAddr = $row->findDependentRowset('Application_Model_Addresses','Source_Entry_Address');
            $srcAddrArray = $srcAddr->toArray();
            $destAddr = $row->findDependentRowset('Application_Model_Addresses','Destination_Entry_Address');
            $destAddrArray = $destAddr->toArray();
            $rowArray = $row->toArray();
            $rowArray['srcAddrTxt'] = $srcAddrArray[0]['text'];
            $rowArray['destAddrTxt'] = $destAddrArray[0]['text'];
            $rowsArray[]=$rowArray;
        }
        return $rowsArray;
    }
    
  
    public function submitEntry(){
        
    }

    


//    public function addAlbum($artist, $title) {
//        $data = array(
//            'artist' => $artist,
//            'title' => $title,
//        );
//        $this->insert($data);
//    }
//    
//    public function updateAlbum($id, $artist, $title) {
//        $data = array(
//            'artist' => $artist,
//            'title' => $title,
//        );
//        $this->update($data, 'id = ' . (int) $id);
//    }
//    
//    public function deleteAlbum($id){
//        $this->delete('id =' . (int) $id);
//    }

}

?>
