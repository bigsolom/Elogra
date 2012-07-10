<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_redirect($this->view->url(array('controller'=>'hakawy','action'=>'index'),'default',true));
        //$this->_helper->viewRenderer->setNoRender(true);
       //$this->_helper->layout->disableLayout();
//        $entries = new Application_Model_Entries();
//        $this->view->entries = $entries->fetchAll()->toArray();
    }
    
    public function searchAction(){
        
    }
    
    public function submitAction(){
        
    }
    
    public function hakawyAction(){
        
    }


}

