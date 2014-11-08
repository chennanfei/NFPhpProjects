<?php
require_once 'model/service/UserService.php';
require_once 'controller/BaseController.php';

class AdminController extends BaseController {
    protected function initialize() {
        parent::initialize();
        
        $this->setPageTemplateRoot('/pages/admin');
        
        // check if redirection is needed
        $redirectUrl = $this->getData('redirectUrl');
        if (isset($redirectUrl)) {
            $this->request->redirect($redirectUrl);
            return;
        }
        
        $this->setPageDataFromHelper('menuUrls');
    }

    public function accountAction() {
        $args = null;
        if ($this->request->isPost() && $this->request->getParameter('action') == 'updatePwd') {
            try {
                (new UserService)->changePassword(
                    $this->request->getParameter('userID'),
                    $this->request->getParameter('oldPwd'),
                    $this->request->getParameter('newPwd')
                );
                
                $args = array('isUpdated' => true);
            } catch (Exception $e) {
                $args = array('isUpdated' => false);
            }
        }
        
        $this->setPageDataFromHelper('accountPageData', $args);
        $this->displayPage('account');
    }

    public function homeAction() {
        $this->setPageDataFromHelper('homePageData');
        $this->displayPage('home');
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
            $this->setPageDataFromHelper('signInErrorData', array(userID => $userID));
            $this->indexAction();
        }
    }

    public function signoutAction() {
        (new UserService)->unauthenticate();
        $this->indexAction();
    }    
    
}

?>