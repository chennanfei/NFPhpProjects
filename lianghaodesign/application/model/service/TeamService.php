<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/service/BaseService.php';
require_once 'model/entity/TeamMember.php';

class TeamService extends BaseService {
    public function getMember($memberId) {
        $sql = 'select m from TeamMember m where m.id=:id';
        $members = $this->dbService->query($sql, array('id' => $memberId));
        if (count($members) > 0) {
            return $members[0];
        } else {
            throw new Exception('Image was not found');
        }
    }
    
    public function getMembers() {
        $sql = 'select m from TeamMember m order by m.displayOrder';
        $members = $this->dbService->query($sql);
        return $members;
    }
    
    public function removeMember($memberId) {
        $member = $this->getMember($memberId);
        $this->dbService->remove($member);
    }

    public function saveMember(array $data) {
        $time = NFUtil::now();
        $data['updatedTime'] = $time;
        if (array_key_exists('id', $data)) {
            $member = $this->getMember($data['id']);
        } else {
            $member = new TeamMember;
            $data['createdTime'] = $time;
        }
        
        $member->initialize($data);
        if ($member->isValid()) {
            $this->dbService->save($member);
        }
        return $member;
    }
}
?>