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
    }
    
    public function newnickAction(){
        $this->_helper->layout->disableLayout();
//        $this->_helper->viewRenderer->setNoRender(TRUE);

    }
    
    public function setnickAction(){
        $nick = $this->_request->getParam('nick');
        $nickSession = new Zend_Session_Namespace('nickSession');
        $nickSession->nickname = $nick;
        $result = true;
        $this->_helper->json($result);
        
    }


}

