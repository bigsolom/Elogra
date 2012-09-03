<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Application_Service_Submit {
    
    public function goSubmit($srcID, $destID, $srcAddrText, $destAddrText, $taxiType, $comment, $fare, $traffic){
        $addresses = new Application_Model_Addresses();
        $entries = new Application_Model_Entries();
        $liveFares = new Application_Model_LiveFares();
        
        $srcAddrID = $addresses->checkAddress($srcID, $srcAddrText);
        $destAddrID = $addresses->checkAddress($destID, $destAddrText);
        
        $entries->submitEntry($taxiType, $comment, $fare, $traffic, $srcID, $destID, $srcAddrID, $destAddrID);
        
        $entriesRows = $entries->getEntries($srcID, $destID, $taxiType, 1);
        
        $total = 0;
        foreach ($entriesRows as $entry){
            $total += $entry['fare'];            
        }
        if(count($entriesRows) > 0){
            $avg = $total/  count($entriesRows);
        }else{
            $avg = $total;
        }
        
        $liveFares->updateFares($srcID, $destID, $taxiType, $avg);
    }
    
    public function recalculateLiveFares() {
        $liveFares = new Application_Model_LiveFares();
        $entries = new Application_Model_Entries();
        $fares = $liveFares->getAllFares();
        foreach ($fares as $fareRow) {
            $fare = $fareRow->toArray();
            $srcID = $fare['src_id'];
            $destID = $fare['dest_id'];
            $taxiType = $fare['taxi_type'];
            
            $entriesRows = $entries->getEntries($srcID, $destID, $taxiType, 1);

            $total = 0;
            foreach ($entriesRows as $entry) {
                $total += $entry['fare'];
            }
            $avg = $total / count($entriesRows);
            $liveFares->updateFares($srcID, $destID, $taxiType, $avg);
        }
    }
}

?>
