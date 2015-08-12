<?php
require_once 'controller/BaseController.php';

class ErrorController extends BaseController {
    public function initialize() {
        $this->setPageDataFromHelper('assets');
    }
    
    public function indexAction() {
        try {
            $this->gotoAdminErrorPage();
        } catch (Exception $e) {
            print_r($e);   
        }
    }
    
    private function gotoAdminErrorPage() {
        $this->setPageDataFromHelper('adminError', array(
            'code' => $this->request->getParameter('code'),
            'isRecognizedUser' => $this->session->isRecognizedUser()
        ));
        $this->displayPage('admin/error');
    }
}
?>