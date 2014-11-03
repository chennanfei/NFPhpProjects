<?php
require_once 'model/service/UserService.php';
require_once 'controller/BaseController.php';

class HomeController extends BaseController {
    public function initialize() {
        parent::initialize();
        
        if (!$this->session->isRecognizedUser()) {
            // redirect to sign in page if user is not authenticated.
            $this->request->redirect(NFUtil::getUrl('/index'));
            return;
        }
        
        // set menu items' url
        $this->smarty->setPageData(array(
            accountUrl => NFUtil::getUrl('/home/account'),
            newProjUrl => NFUtil::getUrl('/home/createProj'),
            projectsUrl => NFUtil::getUrl('/home/projects'),
            signOutUrl => NFUtil::getUrl('/index/signout'),
            updateGWUrl => NFUtil::getUrl('/home/updateGW'),
            updateTeamUrl => NFUtil::getUrl('/home/updateTeam'),
        ));
    }
    
    public function indexAction() {
        $this->smarty->setPageData(array(
            title => 'Welcome'
        ))->displayPage('home');
    }
    
    public function accountAction() {
        $message = '';
        $messageType = '';
        
        if ($this->request->isPost() && $this->request->getParameter('action') == 'updatePwd') {
            try {
                (new UserService)->changePassword(
                    $this->request->getParameter('userID'),
                    $this->request->getParameter('oldPwd'),
                    $this->request->getParameter('newPwd')
                );
                
                $message = 'Successfully updated your password!';
                $messageType = 'success';
            } catch (Exception $e) {
                $message = 'Failed to update your password. Password consists of 6~10 characters. Check your inputs.';
                $messageType = 'error';
            }
        }

        $this->smarty->setPageData(array(
            message => $message,
            messageType => $messageType,
            pageContentTitle => 'Change your password',
            title => 'Change password'
        ))->displayPage('account');
    }
}

?>