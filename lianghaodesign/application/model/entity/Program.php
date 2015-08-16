<?php
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
    
    public function addProject($project) {
        array_push($this->projects, $project);
    }
    
    public function addProjects($projects) {
        if (!(isset($projects) and count($projects) < 1)) {
            return;
        }
        
        foreach ($p as $projects) {
            $this->addProject($p);
        }
    }
}
?>