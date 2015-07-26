<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Helper/NFDataHelper.php';

class BaseDataHelper extends NFDataHelper {
    protected $secureActions;
    
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            
            // ThinkMVC has a bug that the modules depended by 'first' module are not downloaded
            // a solution is, separate thinkmvc to two parts: core and mvc. insert core part into page
            'jqJS'   => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'libJS'  => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('page.js')
        );
    }
    
    protected function getHomeUrl() {
        return NFUtil::getUrl('/admin/home');
    }
    
    protected function getMenuUrls() {
        return null;
    }
    
    protected function getRedirectUrl() {
        $isRecognizedUser = $this->session->isRecognizedUser();
        $isSecureAction = $this->isSecureAction();
        if ($isSecureAction && !$isRecognizedUser) {
            return $this->getSignInUrl();
        } elseif (!$isSecureAction && $isRecognizedUser) {
            return $this->getHomeUrl();
        } else {
            return null;
        }
    }

    protected function getSecureActions() {
        return $this->scureActions;
    }
    
    protected function getSignInUrl() {
        return NFUtil::getUrl('/admin/signin');
    }
    
    protected function isSecureAction() {
        if (!isset($this->scureActions)) {
            return true;
        }
        return in_array($this->action, $this->scureActions);
    }
}
?>