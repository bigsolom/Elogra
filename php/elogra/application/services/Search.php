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
    
    public function goSearch($srcID, $destID, $srcParentID, $destParentID, $taxiType,$pageNumber = 1){
        $entriesModel = new Application_Model_Entries();
        $liveFaresModel = new Application_Model_LiveFares();
        $fares = $liveFaresModel->getLatestEntries($srcID, $destID, 2);
        //TODO: handle zero results
        $total = 0;
        $avg = 0;
        if(count($fares) > 0){
            foreach ($fares as $fare){
                $total += $fare['fare'];            
            }
            $avg = $total/  count($fares);
        }else{
            $result = new stdClass();
            $result->comments = array();
            $areasModel = new Application_Model_Areas();
            $areasUnderSrcParent = $areasModel->getAreasUnder($srcParentID);
            $areasUnderDestParent = $areasModel->getAreasUnder($destParentID);
            foreach ($areasUnderSrcParent as $src){
                foreach ($areasUnderDestParent as $dest){
                    $allFares = $liveFaresModel->getLatestEntries($src['id'], $dest['id'], 2);
                    $entries = $entriesModel->getEntries($src['id'], $dest['id'], 2, $pageNumber);
                    if(count($allFares) > 0){
                        foreach ($allFares as $fare){
                            $total += $fare['fare'];    
                        }
                        $avg = ($total + $avg) /  count($allFares);                                                
                        $result->comments = array_merge($result->comments, $entries);
                    }
                }
            }
            $result->liveFare = $avg;
            $result->historyFare = 0;
            return $result;
        }
        
        
        $comments = $entriesModel->getEntries($srcID, $destID, 2, $pageNumber);
        
        $result = new stdClass();
        $result->liveFare = $avg;
        $result->historyFare = 0;
        $result->comments = $comments;
        
        return $result;
    }
}

?>
