<?php
require_once 'model/service/UserService.php';
require_once 'controller/BaseController.php';

class AdminController extends BaseController {
    public function initialize() {
        parent::initialize();
        
        $this->setPageTemplateRoot('/pages/admin');
        
        // check if redirection is needed
        $redirectUrl = $this->getRedirectUrl();
        if (isset($redirectUrl)) {
            $this->request->redirect($redirectUrl);
            return;
        }
        
        $this->setPageDataFromHelper('menuUrls');
    }
    
    private function getRedirectUrl() {
        $isRecognizedUser = $this->session->isRecognizedUser();
        $isSecureAction = $this->isSecureAction();

        if ($this->getController() == 'error') {
            return null;
        } elseif ($isSecureAction && !$isRecognizedUser) {
            return $this->getData('signInUrl');
        } elseif (!$isSecureAction && $isRecognizedUser) {
            return $this->getData('homeUrl');
        } else {
            return null;
        }
    }
    
    public function accountAction() {
        if ($this->request->isPost() && $this->request->getParameter('action') == 'updatePwd') {
            try {
                (new UserService)->changePassword(
                    $this->request->getParameter('userID'),
                    $this->request->getParameter('oldPwd'),
                    $this->request->getParameter('newPwd')
                );
                
                $this->setPageDataFromHelper('accountPageData', array('isUpdated' => true));
            } catch (Exception $e) {
                $this->setPageDataFromHelper('accountPageData', array('isUpdated' => false));
            }
        } else {
            $this->setPageDataFromHelper('accountPageData');
        }

        $this->displayPage('account');
    }
    
    public function homeAction() {
        $this->displayPage('home', array(title => 'Welcome'));
    }
    
    public function indexAction() {
        $this->setPageDataFromHelper('gatewayPageData');
        $this->displayPage('gateway');
    }
    
    public function signinAction() {
        if (!$this->request->isPost()) {
            return $this->indexAction();
        }
        
        $userID = $this->request->getParameter('userID');
        $password = $this->request->getParameter('password');
        
        try {
            (new UserService)->authenticate($userID, $password);
            $this->request->redirect($this->getData('homeUrl'));
        } catch(Exception $e) {
            $this->setPageData(array(
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