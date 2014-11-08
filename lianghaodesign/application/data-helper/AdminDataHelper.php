<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Helper/NFDataHelper.php';

class AdminDataHelper extends NFDataHelper {
    
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            
            // ThinkMVC has a bug that the modules depended by 'first' module are not downloaded
            // a solution is, separate thinkmvc to two parts: core and mvc. insert core part into page
            'jqJS' => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'libJS' => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('page.js')
        );
    }
    
    protected function getAccountPageData(array $args = null) {
        if (isset($args) && $args['isUpdated'] == true) {
            $message = 'Successfully updated your password!';
            $messageType = 'success';
        } elseif (isset($args) && $args['isUpdated'] == false) {
            $message = 'Failed to update your password. Password consists of 6~10 characters. Check your inputs.';
            $messageType = 'error';
        } else {
            $message = '';
            $messageType = '';
        }
        
        return array(
            'message' => $message,
            'messageType' => $messageType,
            'pageContentTitle' => 'Change your password',
            'title' => 'Change password'
        );
    }
    
    protected function getGatewayPageData() {
        return array(
            signInUrl => $this->getSignInUrl(),
            title => 'Sign in',
            page => 'signIn',
            pageContentTitle => 'Sign in now',
        );
    }
    
    protected function getHomeUrl() {
        return NFUtil::getUrl('/admin/home');
    }

    protected function getMenuUrls() {
        return array(
            'accountUrl'    => NFUtil::getUrl('/admin/account'),
            'newProjUrl'    => NFUtil::getUrl('/admin/createProj'),
            'projectsUrl'   => NFUtil::getUrl('/admin/projects'),
            'signOutUrl'    => NFUtil::getUrl('/admin/signout'),
            'updateGWUrl'   => NFUtil::getUrl('/admin/updateGW'),
            'updateTeamUrl' => NFUtil::getUrl('/admin/updateTeam'),
        );
    }
    
    protected function getSecureActions() {
        return array('account', 'home');
    }
    
    protected function getSignInUrl() {
        return NFUtil::getUrl('/admin/signin');
    }
}
?>