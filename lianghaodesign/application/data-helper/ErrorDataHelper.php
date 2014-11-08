<?php
require_once 'Scorpion/Helper/NFDataHelper.php';

class ErrorDataHelper extends NFDataHelper {
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
        );
    }
    
    protected function getAdminError(array $args) {
        if ($args['code'] == '404') {
            $message = 'Page not found. Please check your url.';
            $title = 'Page not found';
        } else {
            $message = 'Something wrong happened. Please try again later.';
            $title = 'Internal server error';
        }
        
        return array(
            'message' => $message,
            'homeUrl' => NFUtil::getUrl($args['isRecognizedUser'] ? '/admin/home' : '/admin'),
            'page' => 'error',
            'title' => $title
        );
    }
}
?>