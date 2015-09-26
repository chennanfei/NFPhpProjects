<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/UserService.php';
require_once 'model/service/SiteChannelService.php';

class AdminDataHelper extends BaseDataHelper {
    public function initialize() {
        parent::initialize();
        $this->scureActions = array(
            'account',
            'home',
            'projects',
        );
    }

    // data for account page
    protected function getAccountPageData() {
        $message = '';
        $messageType = '';
        $req = $this->request;
        
        if ($req->isPost() && $req->getParameter('action') == 'updatePwd') {
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
            'signInUrl' => $this->urlHelper->getSignInUrl(),
            'title'     => 'Sign in',
            'page'      => 'signIn',
            'pageContentTitle' => 'Sign in now',
        );
    }
    
    // data for home page
    protected function getHomePageData() {
        return array('title' => 'Welcome');
    }

    protected function getMenuUrls() {
        return array(
            'accountUrl' => $this->urlHelper->getAcountUrl(),
            'homeUrl' => $this->urlHelper->getHomeUrl(),
            'signOutUrl' => $this->urlHelper->getSignOutUrl(),
            'imagesUrl' => $this->urlHelper->getGatewayImagesUrl(),
            'projectsUrl' => $this->urlHelper->getProjectsUrl(),
            'teamUrl' => $this->urlHelper->getTeamUrl()
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
            return array('nextUrl' => $this->urlHelper->getHomeUrl());
        } catch(Exception $e) {
            return array(
                'message' => $e->getMessage(),
                '$messageType' => 'error',
                'userID'  => $userID
            );
        }
    }
    
    // data for sign out page
    protected function getSignOutPageData() {
        (new UserService)->unauthenticate();
        return null;
    }

}
?>