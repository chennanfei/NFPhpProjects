<?php
require_once 'controller/BaseController.php';

class AdminController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/admin');
        parent::initialize();
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
        $data = $this->getData('signInPageData');
        if (isset($data['nextUrl'])) {
            $this->request->redirect($data['nextUrl']);
        } else {
            $this->setPageData($data);
            $this->indexAction();
        }
    }

    public function signoutAction() {
        $this->setPageDataFromHelper('signOutPageData');
        $this->indexAction();
    }    

}

?>