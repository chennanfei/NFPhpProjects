<?php
require_once 'controller/BaseController.php';

class ErrorController extends BaseController {
    public function indexAction() {
        $message = '';
        $title = '';
        
        if ($this->request->getParameter('code') == '404') {
            $message = 'Page not found. Please check your url.';
            $title = 'Page not found';
        } else {
            $message = 'Something wrong happened. Please try again later.';
            $title = 'Internal server error';
        }
        
        $url = NFUtil::getUrl($this->session->isRecognizedUser() ? '/home' : '/');
        $this->smarty->setPageData(array(
            message => $message,
            homeUrl => $url,
            page => 'error',
            title => $title
        ))->displayPage('error');
    }
}
?>