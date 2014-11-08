<?php
require_once 'controller/BaseController.php';

class ErrorController extends BaseController {
    public function initialize() {
        $this->setPageDataFromHelper('assets');
    }
    
    public function indexAction() {
        $this->gotoAdminErrorPage();
    }
    
    private function gotoAdminErrorPage() {
        $message = '';
        $title = '';
        
        if ($this->request->getParameter('code') == '404') {
            $message = 'Page not found. Please check your url.';
            $title = 'Page not found';
        } else {
            $message = 'Something wrong happened. Please try again later.';
            $title = 'Internal server error';
        }
        
        $url = NFUtil::getUrl($this->session->isRecognizedUser() ? '/admin/home' : '/admin');
        $this->displayPage('/admin/error', array(
            'message' => $message,
            'homeUrl' => $url,
            'page' => 'error',
            'title' => $title
        ));
    }
}
?>