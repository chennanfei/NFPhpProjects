<?php
require_once 'model/service/UserService.php';
require_once 'controller/BaseController.php';

class AdminController extends BaseController {
    public function initialize() {
        parent::initialize();
        
        $this->setPageTemplateRoot('/pages/admin');
        $this->secureActions = array('account', 'home');
        
        // check if redirection is needed
        $redirectUrl = $this->getRedirectUrl();
        if (isset($redirectUrl)) {
            $this->request->redirect($redirectUrl);
            return;
        }
        
        $this->setPageDataFromHelper('menuLinks');
    }
    
    private function getRedirectUrl() {
        $isRecognizedUser = $this->session->isRecognizedUser();
        $isSecureAction = $this->isSecureAction();

        if ($this->getController() == 'error') {
            return null;
        } elseif ($isSecureAction && !$isRecognizedUser) {
            return NFUtil::getUrl('/admin/signin');
        } elseif (!$isSecureAction && $isRecognizedUser) {
            return NFUtil::getUrl('/admin/home');
        } else {
            return null;
        }
    }
    
    public function accountAction() {
        $message = '';
        $messageType = '';
        
        if ($this->request->isPost() && $this->request->getParameter('action') == 'updatePwd') {
            try {
                (new UserService)->changePassword(
                    $this->request->getParameter('userID'),
                    $this->request->getParameter('oldPwd'),
                    $this->request->getParameter('newPwd')
                );
                
                $message = 'Successfully updated your password!';
                $messageType = 'success';
            } catch (Exception $e) {
                $message = 'Failed to update your password. Password consists of 6~10 characters. Check your inputs.';
                $messageType = 'error';
            }
        }

        $this->displayPage('account', array(
            'message' => $message,
            'messageType' => $messageType,
            'pageContentTitle' => 'Change your password',
            'title' => 'Change password'
        ));
    }
    
    public function homeAction() {
        $this->displayPage('home', array(title => 'Welcome'));
    }
    
    public function indexAction() {
        $this->displayPage('gateway', array(
            signInUrl => NFUtil::getUrl('/admin/signin'),
            title => 'Sign in',
            page => 'signIn',
            pageContentTitle => 'Sign in now',
        ));
    }
    
    public function signinAction() {
        if (!$this->request->isPost()) {
            return $this->indexAction();
        }
        
        $userID = $this->request->getParameter('userID');
        $password = $this->request->getParameter('password');
        
        try {
            (new UserService)->authenticate($userID, $password);
            $this->request->redirect(NFUtil::getUrl('/admin/home'));
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