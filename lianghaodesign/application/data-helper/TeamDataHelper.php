<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/TeamService.php';
require_once 'model/entity/TeamMember.php';

class TeamDataHelper extends BaseDataHelper {
    public function initialize() {
        parent::initialize();
        $this->scureActions = array(
            'index',
            'member',
        );
    }
    
    protected function getMenuUrls() {
        return array(
            'teamUrl' => $this->urlHelper->getTeamUrl(),
            'memberUrl' => $this->urlHelper->getTeamMemberUrl(),
            'homeUrl' => $this->urlHelper->getHomeUrl(),
            'signOutUrl' => $this->urlHelper->getSignOutUrl(),
            'uploadImageUrl' => $this->urlHelper->getUploadImageUrl()
        );
    }
    
    protected function getAddMemberPageData() {
        if ($this->request->isPost()) {
            try {
                $result = $this->addMember();
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage());
                $result['messageType'] = 'error';
            }
        } else {
            $result = array();
        }
        
        if (!array_key_exists('member', $result)) {
            $result['member'] = new TeamMember;
        }
        
        $result['action'] = 'add';
        $result['page'] = 'teamMember';
        $result['pageContentTitle'] = 'New member';
        $result['title'] = 'New member';
        return $result;
    }
    
    private function addMember() {
        $data = $this->request->getParameters();
        $data['creator'] = $this->session->getUserID();
        try {
            $member = (new TeamService)->saveMember($data);
        } catch (Exception $e) {
            return array('messageType' => 'error', 'message' => $e->getMessage());
        }
        
        $result = array();
        if ($member->isValid()) {
            $result['nextUrl'] = $this->urlHelper->getTeamUrl();
        } else {
            $result['errors'] = $image->getErrors();
            $result['messageType'] = 'error';
        }
        $result['member'] = $member;
        return $result;
    }

    protected function getMemberListPageData() {
        $result = array(
            'members' => (new TeamService)->getMembers(),
            'page' => 'team',
            'pageContentTitle' => 'Team members',
            'title' => 'Team members'
        );
        return $result;
    }
}
?>