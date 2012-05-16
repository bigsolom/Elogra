<?php
class Application_Service_Suggest {
    public function submitNewArea($parent_id, $name){
        $areastModel = new Application_Model_Areas();
        $areastModel->submitArea($name, $parent_id);
    }
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
