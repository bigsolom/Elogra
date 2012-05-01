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
    
    public function getEntry($id) {
        $id = (int) $id;
        $row = $this->fetchRow('id = ' . $id);
        if (!$row) {
            throw new Exception("Could not find row $id");
        }
        return $row->toArray();
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
