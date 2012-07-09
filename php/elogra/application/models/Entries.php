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
    
    const NO_OF_ENTRIES_PER_PAGE = 5;


    public function getEntries($srcID,$destID,$taxiType,$pageNumber) {
        $select = $this->select();
        $select->where(Application_Model_DBConstants::ENTRIES_SRC_ID." = ?",(int)$srcID)
                ->where(Application_Model_DBConstants::ENTRIES_DEST_ID." = ?",(int)$destID)
                ->where(Application_Model_DBConstants::ENTRIES_TAXI_TYPE." = ?", (int)$taxiType)
                ->order("id DESC")
                ->limitPage($pageNumber, self::NO_OF_ENTRIES_PER_PAGE);
        $rows = $this->fetchAll($select);
        if (!$rows) {
            throw new Exception("Could not find rows");
        }
        $rowsArray = array();
        foreach ($rows as $row){
            $rowArray = $row->toArray();
            
            if (!is_null($row['src_addr_id'])) {
                $srcAddr = $row->findDependentRowset('Application_Model_Addresses', 'Source_Entry_Address');
                $srcAddrArray = $srcAddr->toArray();
                $rowArray['srcAddrTxt'] = $srcAddrArray[0]['text'];
            }else{
                $srcAddr = $row->findDependentRowset('Application_Model_Areas', 'Source_Entry_Area');
                $srcAddrArray = $srcAddr->toArray();
                $rowArray['srcAddrTxt'] = $srcAddrArray[0]['name'];
            }
            
            if (!is_null($row['dest_addr_id'])) {
                $destAddr = $row->findDependentRowset('Application_Model_Addresses', 'Destination_Entry_Address');
                $destAddrArray = $destAddr->toArray();
                $rowArray['destAddrTxt'] = $destAddrArray[0]['text'];
            }else{
                $destAddr = $row->findDependentRowset('Application_Model_Areas', 'Destination_Entry_Area');
                $destAddrArray = $destAddr->toArray();
                $rowArray['destAddrTxt'] = $destAddrArray[0]['name'];
            }
            
            if(is_null($rowArray['comment']) || $rowArray['comment'] == ''){
                $rowArray['comment'] = $this->_getDefaultCommentText($rowArray['traffic_status']);
            }
            
            
            $rowsArray[]=$rowArray;
        }
        return $rowsArray;
    }
    
  
    public function submitEntry($taxiType, $comment, $fare, $traffic, $srcID, $destID, $srcAddrID, $destAddrID){
       if(is_null($comment) || $comment == ''){
           $comment = $this->_getDefaultCommentText($traffic);
       }
        $data = array(
            'taxi_type' => $taxiType,
            'trip_time' => 'now()',
            'trip_duration' => '00:00',
            'comment' => $comment,
            'fare' => $fare,
            'traffic_status' => $traffic,
            'src_id' => $srcID,
            'dest_id' => $destID,
            'user_id' => '0',
            'src_addr_id' => $srcAddrID,
            'dest_addr_id' => $destAddrID,
            'entry_time' => 'now()'
        );
        $this->insert($data);
    }
    
    private function _getDefaultCommentText($status){
        $text = '';
        switch ($status){
            case '1':
                $text = Application_Service_Translate::_('default_comment_fady');
                break;
            case '2':
                $text = Application_Service_Translate::_('default_comment_3ady');
                break;
            default :
                $text = Application_Service_Translate::_('default_comment_za7ma');
        }
        return $text;
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
