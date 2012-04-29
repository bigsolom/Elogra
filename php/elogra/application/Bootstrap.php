<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    function _initLayout() {
        $layout = Zend_Layout::startMvc();
        $layout->setLayout("application");
        $layout->setLayoutPath(APPLICATION_PATH . "/layouts/scripts/");
        $registry = Zend_Registry::getInstance();
        $registry->set('Zend_Layout', $layout);
    }

}

