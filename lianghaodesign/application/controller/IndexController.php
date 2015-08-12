<?php
require_once 'controller/BaseController.php';

class IndexController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/site');
        parent::initialize();
    }

    public function indexAction() {
        $this->setPageDataFromHelper('gatewayPageData');
        $this->displayPage('gateway');
    }
    
    public function workAction() {
        print_r('not ready');
    }
    
    public function lifeAction() {
        print_r('not ready');
    }
}
?>