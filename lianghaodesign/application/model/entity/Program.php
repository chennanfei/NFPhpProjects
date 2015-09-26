<?php
require_once 'Scorpion/Utility/NFUtil.php';

/**
@Entity
@Table(name="programs")
*/
class Program {
    /** @id @Column(type="string") */
    private $id;

    /** @Column(type="string", name="chinese_title") */
    private $chineseName;

    /** @Column(type="string", name="english_title") */
    private $englishName;

    /** @Column(type="integer", name="display_order") */
    private $displayOrder;

    /** @Column(type="string", name="site_channel_id") */
    private $siteChannelId;
    
    private $projects = array();
    private $leftProjects = array();
    private $rightProjects = array();
    
    public function getChineseName() {
        return $this->chineseName;
    }
    
    public function getEnglishName() {
        return $this->englishName;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getDisplayOrder() {
        return $this->displayOrder;
    }

    public function getSiteChannelId() {
        return $this->siteChannelId;
    }
    
    public function getProjects() {
        return $this->projects;
    }
    
    public function getLeftProjects() {
        if (count($this->leftProjects) < 1) {
            $this->separateProjects($this->projects);
        }
        return $this->leftProjects;
    }
    
    public function getRightProjects() {
        if (count($this->rightProjects) < 1) {
            $this->separateProjects($this->projects);
        }
        return $this->rightProjects;
    }
    
    public function addProject($project) {
        array_push($this->projects, $project);
    }
    
    public function setProjects($projects) {
        if (!($projects && count($projects))) {
            return;
        }
        
        $this->projects = $projects;
        $this->separateProjects($projects);
    }
    
    private function separateProjects($projects) {
        $size = count($this->projects);
        for ($i = 0; $i < $size; $i++) {
            if ($i % 2 == 0) {
                array_push($this->leftProjects, $this->projects[$i]);
            } else {
                array_push($this->rightProjects, $this->projects[$i]);
            }
        }
    }
    
    public function getProjectsUrl() {
        return NFUtil::getUrl('/index/projects?pid=' . $this->getId());
    }
    
}
?>