<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextFormatting
 *
 * @author efoad
 */
class Application_Service_TextFormatting {
    //put your code here
    
    public static function htmlNlEncoding2Br($input){
        return preg_replace("/&#13;&#10;/", "<br/>", $input);
    }
}

?>
