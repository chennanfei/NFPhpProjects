<?php
require_once 'model/entity/SiteImage.php';

/**
@Entity
@Table(name="project_images")
*/
class ProjectImage extends SiteImage {
    /** @id @Column(type="integer") @GeneratedValue */
    protected $id;
    
    /** @Column(type="string", name="image_name") */
    protected $imageName;
    
    /** @Column(type="string", name="alias_name") */
    protected $aliasName;
    
    /** @Column(type="string", name="project_id") */
    protected $projectId;

    /** @Column(type="integer", name="display_order") */
    protected $displayOrder;
    
    /** @Column(type="string", name="display_position") */
    protected $displayPosition;

    /** @Column(type="string", name="creator") */
    protected $creator;

    /** @Column(type="string", name="created_time") */
    protected $createdTime;
    
    /** @Column(type="string", name="updated_time") */
    protected $updatedTime;
    
    /** @Column(type="boolean", name="is_previewed") */
    protected $isPreviewed;
    
    /** @Column(type="boolean", name="is_half") */
    protected $isHalf;
    
    public function getIsPreviewed() {
        return $this->isPreviewed ? 1 : 0;
    }
    
    public function getIsHalf() {
        return $this->isHalf;
    }
    
    public function getDisplayPosition() {
        return $this->displayPosition;
    }
    
    public function getProjectId() {
        return $this->projectId;
    }
    
    public function setIsPreviewed($isPreviewed) {
        $this->isPreviewed = $isPreviewed;
    }
    
    public function setIsHalf($isHalf) {
        $this->isHalf = $isHalf;
    }
    
    public function setDisplayPosition($displayPosition) {
        $this->displayPosition = $displayPosition;
    }
    
    public function setProjectId($projectId) {
        $this->projectId = $projectId;
    }

    public function getDetailUrl() {
        $id = $this->id;
        $projectId = $this->projectId;
        return NFUtil::getUrl("/project/images?id=$id");
    }
    
    public function getAliasName() {
        return $this->aliasName;
    }
    
    public function setAliasName($name) {
        $this->aliasName = $name;
    }
}
?>