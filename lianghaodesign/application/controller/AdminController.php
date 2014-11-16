<?php
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
        $this->setPageDataFromHelper('accountPageData');
        $this->displayPage('account');
    }
    
    public function createProjAction() {
        $this->setPageDataFromHelper('newProjectPageData');
        $this->displayPage('project-edit');
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
        $pageData = $this->getData('signInPageData');
        if ($pageData['isAuthOK']) {
            $this->request->redirect($pageData['homeUrl']);
        } else {
            $this->setPageData($pageData);
            $this->indexAction();
        }
    }

    public function signoutAction() {
        $this->setPageDataFromHelper('signOutPageData');
        $this->indexAction();
    }    
    
}

?>