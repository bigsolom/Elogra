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
    
    public function submitHekaya($hekaya){
      $hakawy = new Application_Model_Hakawy();
      $insertedHekaya = $hakawy->submitHekaya($hekaya);
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
}

?>
