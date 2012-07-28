<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Hakawy
 *
 * @author mfayyad
 */
class Application_Service_Hakawy {
    //put your code here
    
    public function submitHekaya($hekaya, $nickname,$location=null){
      $hakawy = new Application_Model_Hakawy();
      $insertedHekaya = $hakawy->submitHekaya($hekaya, $nickname);
      if(isset ($location)){
          $locationModel = new Application_Model_Locations();
          $location = $locationModel->addLocation($insertedHekaya['id'], 'hakawy', $location->longitude, $location->latitude, $location->address);
          if($location){
              $insertedHekaya['longitude']=$location['longitude'];
              $insertedHekaya['latitude']=$location['latitude'];
              $insertedHekaya['address']=$location['addr'];
              $insertedHekaya['address_ar']=$location['addr_ar'];
          }
      }
      
      return $insertedHekaya;
    }
    
    public function getHakawy($pageNumber){
      $hakawy = new Application_Model_Hakawy();
      $hakawyRows = $hakawy->getHakawy($pageNumber);
      return $hakawyRows;
    }
    
    public function getHekaya($id){
        $hakawyService = new Application_Model_Hakawy();
        $hekaya  = $hakawyService->getHekayaById($id);
        return $hekaya;
    }
    
    public function likeHekaya($id, $type){
        $hakawyService = new Application_Model_Hakawy();
        $hakawyService->likeHekaya($id, $type);
    }
}

?>
