<?php
require_once 'Scorpio/Utility/NFUtil.php';
require_once 'controller/BaseController.php';
require_once 'model/service/UserService.php';

class IndexController extends BaseController {
    public function indexAction() {
        if ($this->session->isRecognizedUser()) {
            $this->request->redirect(NFUtil::getUrl('/home'));
        }
        
        $this->smarty->setPageData(array(
            signInUrl => NFUtil::getUrl('/index/signin'),
            title => 'Sign in',
            page => 'signIn',
            pageContentTitle => 'Sign in now',
        ))->displayPage('index');
    }
    
    public function signinAction() {
        $userID = $this->request->getParameter('userID');
        $password = $this->request->getParameter('password');
        
        try {
            (new UserService)->authenticate($userID, $password);
            $this->request->redirect(NFUtil::getUrl('/home'));
        } catch(Exception $e) {
            $this->smarty->setPageData(array(
                message => 'The user ID and password does not match.',
                messageType => 'error',
                userID => $userID
            ));
            
            $this->indexAction();
        }
    }
    
    public function signoutAction() {
        (new UserService)->unauthenticate();
        $this->indexAction();
    }
}
?>