<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Helper/NFDataHelper.php';
require_once 'model/service/UserService.php';
require_once 'model/service/SiteChannelService.php';

class AdminDataHelper extends NFDataHelper {
    private $secureActions;
    
    protected function initialize() {
        $this->scureActions = array('account', 'createProj', 'home', 'projects', 'updateGW', 'updateTeam');
    }

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

    // data for account page
    protected function getAccountPageData() {
        $message = '';
        $messageType = '';
        $req = $this->request;
        
        if ($req->isPost() && $req->getParameter('action') == 'updatePWD') {
            try {
                (new UserService)->changePassword(
                    $req->getParameter('userID'),
                    $req->getParameter('oldPwd'),
                    $req->getParameter('newPwd')
                );

                $message = 'Successfully updated your password!';
                $messageType = 'success';
            } catch (Exception $e) {
                $message = 'Failed to update your password. Password consists of 6~15 characters. Check your inputs.';
                $messageType = 'error';
            }
        }
        
        return array(
            'message'          => $message,
            'messageType'      => $messageType,
            'page'             => 'account',
            'pageContentTitle' => 'Change your password',
            'title'            => 'Change password'
        );
    }

    // data for gateway page
    protected function getGatewayPageData() {
        return array(
            'signInUrl' => $this->getSignInUrl(),
            'title'     => 'Sign in',
            'page'      => 'signIn',
            'pageContentTitle' => 'Sign in now',
        );
    }

    // data for home page
    protected function getHomePageData() {
        return array('title' => 'Welcome');
    }

    protected function getHomeUrl() {
        return NFUtil::getUrl('/admin/home');
    }

    protected function getMenuUrls() {
        return array(
            'accountUrl'    => NFUtil::getUrl('/admin/account'),
            'homeUrl'       => $this->getHomeUrl(),
            'newProjUrl'    => NFUtil::getUrl('/admin/createProj'),
            'projectsUrl'   => NFUtil::getUrl('/admin/projects'),
            'signOutUrl'    => NFUtil::getUrl('/admin/signout'),
            'updateGWUrl'   => NFUtil::getUrl('/admin/updateGW'),
            'updateTeamUrl' => NFUtil::getUrl('/admin/updateTeam'),
        );
    }
    
    // data for new project page
    protected function getNewProjectPageData() {
        $req = $this->request;
        if ($req->isPost()) {
            
        }
        
        $scService = new SiteChannelService;
        return array(
            'channels'         => $scService->getChannels(),
            'title'            => 'New project',
            'page'             => 'project',
            'pageContentTitle' => 'Create a new project',
        );
    }

    protected function getRedirectUrl() {
        $isRecognizedUser = $this->session->isRecognizedUser();
        $isSecureAction = in_array($this->action, $this->scureActions);

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
    
    // data for sign in page
    protected function getSignInPageData() {
        $req = $this->request;
        if (!$req->isPost()) {
            return array('isAuthOK' => false);
        }
        
        $userID = $req->getParameter('userID');
        $password = $req->getParameter('password');
        
        try {
            (new UserService)->authenticate($userID, $password);
            return array('isAuthOK' => true, 'homeUrl' => $this->getHomeUrl());
        } catch(Exception $e) {
            return array(
                'isAuthOK'    => false,
                'message'     => 'The user ID and password does not match.',
                'messageType' => 'error',
                'userID'      => $userID
            );
        }
    }
    
    // data for sign out page
    protected function getSignOutPageData() {
        (new UserService)->unauthenticate();
        return null;
    }

    protected function getSignInUrl() {
        return NFUtil::getUrl('/admin/signin');
    }
}
?>