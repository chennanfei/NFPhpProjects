<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/entity/BaseEntity.php';

class SiteImage extends BaseEntity {
    public function getId() {
        return $this->id;
    }
    
    public function getImageName() {
        return $this->imageName;
    }
    
    public function getImagePath() {
        return NFUtil::getImageUrl($this->imageName);
    }

    public function getDisplayOrder() {
        return $this->displayOrder;
    }

    public function getCreator() {
        return $this->creator;
    }
    
    public function getCreatedTime() {
        return $this->createdTime;
    }
    
    public function getUpdatedTime() {
        return $this->updatedTime;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setImageName($name) {
        $this->imageName = $name;
    }

    public function setDisplayOrder($order) {
        $this->displayOrder = is_int($order) ? $order : (int) $order;
    }

    public function setCreator($creator) {
        $this->creator = $creator;
    }
    
    public function setCreatedTime($time) {
        $this->createdTime = $time;
    }
    
    public function setUpdatedTime($time) {
        $this->updatedTime = $time;
    }
    
    protected function validateDisplayOrder() {
        if ($this->displayOrder < 1 || $this->displayOrder > 100) {
            throw new Exception('displayOrder should be between 1 and 100');
        }
    }
}
?>