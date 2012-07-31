<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Notifications
 *
 * @author efoad
 */
class Elogra_Controller_Helper_Notifications extends Zend_Controller_Action_Helper_Abstract {
    //put your code here
    
    public function notifyConnectedUsers($channel,$event,$dataToTransfer,$execlude){
        $pusherConfig = Zend_Registry::get('config')->get('pusher')->toArray();
        $pusher = new Elogra_Pusher($pusherConfig['key'],$pusherConfig['secret'],$pusherConfig['app_id']);
        $pusher->trigger($channel,$event,$dataToTransfer,$execlude);
    }
}

?>
