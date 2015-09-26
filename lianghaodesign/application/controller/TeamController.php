<?php
require_once 'controller/BaseController.php';

class TeamController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/admin/team');
        parent::initialize();
    }

    public function indexAction() {
        $this->setPageDataFromHelper('memberListPageData');
        $this->displayPage('list');
    }
    
    public function memberAction() {
        $action = $this->request->getParameter('a');
        switch ($action) {
            case 'add':
                return $this->addMember();
            default:
                return $this->redirectError(404);
        }
    }
    
    private function addMember() {
        $data = $this->getData('addMemberPageData');
        if (isset($data['nextUrl'])) {
            $this->request->redirect($data['nextUrl']);
        } else {
            $this->setPageData($data);
            $this->displayPage('member');
        }
    }
    
}
?>