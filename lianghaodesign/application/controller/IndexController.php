<?php
require_once 'controller/BaseController.php';

class IndexController extends BaseController {
    protected $checkLogin = false;

    protected function initialize() {
        $this->setPageTemplateRoot('/pages/site');
        parent::initialize();
    }

    public function indexAction() {
        $this->setPageDataFromHelper('gatewayPageData');
        $this->displayPage('gateway');
    }
    
    public function workAction() {
        $this->setPageDataFromHelper('workPageData');
        $this->displayPage('work');
    }
    
    public function lifeAction() {
        $this->setPageDataFromHelper('lifePageData');
        $this->displayPage('life');
    }
    
    public function projectsAction() {
        $this->setPageDataFromHelper('programProjectsPageData');
        $this->displayPage('program-projects');
    }
}
?>