<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Report
 *
 * @author efoad
 */
class Application_Service_Report {
    //put your code here
    
    public function reportEntry($entityId, $entityType){
        $model = new Application_Model_Reports();
        $model->reportEntity($entityId, $entityType);
    }
}

?>
