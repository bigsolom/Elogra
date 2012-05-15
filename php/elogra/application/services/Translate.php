<?php

/**
 * Description of Application_Service_Translate
 *
 * @author efoad
 */
class Application_Service_Translate {
    /**
     * takes multiple parameters, first parameter is the key in translation file
     * subsequent parameters are the variables to be replaced in the translated text
     * @return type string translated
     */
    public static function _() {
        $args = func_get_args();
        $numOfArgs = func_num_args();
        $registry = Zend_Registry::getInstance();
        $translate = $registry->get('Zend_Translate');
        $str = $translate->_(array_shift($args));//pass the key to the translation and remove it from the args
        if($numOfArgs){//there are replacements in the translation
            $str = vsprintf($str, $args);
        }
        return $str;
        
    }

}

?>
