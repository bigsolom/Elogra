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
    public function commentAction(){
        $id = $this->_request->getParam('id');
        $text = $this->_request->getParam('comment');
        $nickname = $this->getNickName();
        $commentService = new Application_Service_Comment();
        $comment = $commentService->commentOnHekaya($id, $text, $nickname);
        if($comment){//comment was added
            $reply = array();
            $html = $comment['nickname'].' '.$comment['text'].' '.$comment['creation_date'];
            $reply['html'] = $html;
            $this->_helper->json($reply);
        }
        
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
