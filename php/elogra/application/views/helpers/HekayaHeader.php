<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HekayaHeader
 *
 * @author efoad
 */
class Zend_View_Helper_HekayaHeader extends Zend_View_Helper_Abstract{
    //put your code here
    public function hekayaHeader($hekaya){
        $text =  Application_Service_Translate::_('hadoota').'&nbsp;'.$hekaya['nickname'];
        if(isset ($hekaya['address_ar'])){
            $text .= '&nbsp;'.Application_Service_Translate::_('from').'&nbsp;'.$hekaya['address_ar'];
        }else if (isset ($hekaya['address'])){
            $text .= '&nbsp;'.Application_Service_Translate::_('from').'&nbsp;'.$hekaya['address'];
        }
        return $text;
    }
}

?>
