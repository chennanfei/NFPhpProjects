<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/entity/BaseEntity.php';

class SiteImage extends BaseEntity {
    public function getImageName() {
        return $this->imageName;
    }
    
    public function getImagePath() {
        return NFUtil::getImageUrl($this->imageName);
    }

    public function setImageName($name) {
        $this->imageName = $name;
    }

    protected function validateImageName() {
        print_r('image name: ' . $this->imageName);
        if (strlen($this->imageName) < 5) {
            throw new Exception('imageName is invalid');
        }
    }
}
?>