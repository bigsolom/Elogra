<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sanitize
 *
 * @author efoad
 */
class Elogra_Controller_Plugin_Sanitize extends Zend_Controller_Plugin_Abstract{
    //put your code here
    
    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        parent::preDispatch($request);
        $params = $request->getParams();
        foreach ($params as $key => $value) {
            $request->setParam($key, filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        }
        
    }
}

?>
