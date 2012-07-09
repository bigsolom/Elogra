<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Search
 *
 * @author efoad
 */
class Application_Service_Search {
    //put your code here
    
    public function goSearch($srcID, $destID, $taxiType,$pageNumber = 1){
        $liveFares = new Application_Model_LiveFares();
        $fares = $liveFares->getLatestEntries($srcID, $destID, $taxiType);
        //TODO: handle zero results
        $total = 0;
        foreach ($fares as $fare){
            $total += $fare['fare'];            
        }
        if(count($fares) > 0){
            $avg = $total/  count($fares);    
        }else{
            $avg = $total;
        }
        
        
        $entriesModel = new Application_Model_Entries();
        $comments = $entriesModel->getEntries($srcID, $destID, $taxiType, $pageNumber);
        
        $result = new stdClass();
        $result->liveFare = $avg;
        $result->historyFare = 0;
        $result->comments = $comments;
        
        return $result;
    }
}

?>
