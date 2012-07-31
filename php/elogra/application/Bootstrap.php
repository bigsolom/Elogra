<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    

    protected function _initConfig()
    {
        $config = new Zend_Config($this->getOptions());
        Zend_Registry::set('config', $config);
        return $config;
    }
    
    function _initLayout() {
        $layout = Zend_Layout::startMvc();
        $layout->setLayout("application");
        $layout->setLayoutPath(APPLICATION_PATH . "/layouts/scripts/");
        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Layout', $layout);
    }
    
    protected function _initTranslate() {
        $registry = Zend_Registry::getInstance();
        $locale = new Zend_Locale();
        $translate = new Zend_Translate(
                        array(
                            'adapter' => 'array',
                            'content' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'languages',
                            'scan' => Zend_Translate::LOCALE_FILENAME,
                            'locale' => 'ar',
                            'disableNotices' => true, // This is a very good idea!
                            'logUntranslated' => false, // Change this if you debug
                ));
        $registry->set('Zend_Locale', $locale);
        $registry->set('Zend_Translate', $translate);
        Zend_Form::setDefaultTranslator($translate);
    }
    
    protected function _initActionHelpers(){
         Zend_Controller_Action_HelperBroker::addPrefix('Elogra_Controller_Helper');
    }


}

