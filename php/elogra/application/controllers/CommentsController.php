<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentsController
 *
 * @author efoad
 */
class CommentsController extends Zend_Controller_Action{
    //put your code here
    public function postAction(){
        $id = $this->_request->getParam('id');
        $text = $this->_request->getParam('comment');
        $nickname = $this->getNickName();
        $commentService = new Application_Service_Comment();
        $comment = $commentService->commentOnHekaya($id, $text, $nickname);
        $notificationsHelper = $this->_helper->Notifications;
        if($comment){//comment was added
            $reply = array();
            $html = $this->view->partial('partials/_comment.phtml', array('comment' => $comment));
            $reply['html'] = $html;
            $notificationsHelper->notifyConnectedUsers('comments_channel',"comment_added_$id",$html,$this->_request->getParam('sock_id'));
            $this->_helper->json($reply);
        }
        
    }
    
    public function indexAction(){
        $id=$this->_request->getParam('id');
        $type='hakawy';
        $commentService = new Application_Service_Comment();
        $comments = $commentService->getComments($id, $type);
        $html = '';
        $reply = array();
        foreach ($comments as $comment){
            $html .= $this->view->partial('partials/_comment.phtml', array('comment' => $comment));
        }
        $reply['html'] = $html;
        $this->_helper->json($reply);
    }
    
    private function getNickName(){
        $nickSession = new Zend_Session_Namespace('nickSession');
        if (isset($nickSession->nickname)) {
            $nickname = $nickSession->nickname;
        } else {
            $nickname = $this->_request->getParam("nickname");
            $nickSession->nickname = $nickname;
        }
        return $nickname;
    }
    
}

?>
