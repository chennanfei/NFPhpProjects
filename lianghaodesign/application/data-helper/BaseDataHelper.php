<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Helper/NFDataHelper.php';
require_once 'data-helper/UrlDataHelper.php';

class BaseDataHelper extends NFDataHelper {
    protected $secureActions;
    
    public function initialize() {
        $this->urlHelper = new UrlDataHelper;
    }
    
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            
            // ThinkMVC has a bug that the modules depended by 'first' module are not downloaded
            // a solution is, separate thinkmvc to two parts: core and mvc. insert core part into page
            'jqJS' => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'jqFormJS' => NFUtil::getScriptUrl('lib/jquery.form.min.js'),
            'libJS' => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('page.js'),
            'favicon' => NFUtil::getImageUrl('favicon.ico')
        );
    }
    
    protected function getMenuUrls() {
        return null;
    }
    
    protected function getRedirectUrl() {
        $isRecognizedUser = $this->session->isRecognizedUser();
        $isSecureAction = $this->isSecureAction();
        if ($isSecureAction && !$isRecognizedUser) {
            return $this->urlHelper->getSignInUrl();
        } elseif (!$isSecureAction && $isRecognizedUser) {
            return $this->urlHelper->getHomeUrl();
        } else {
            return null;
        }
    }

    protected function getSecureActions() {
        return $this->scureActions;
    }
    
    protected function isSecureAction() {
        if (!isset($this->scureActions)) {
            return false;
        }
        return in_array($this->action, $this->scureActions);
    }
}
?>