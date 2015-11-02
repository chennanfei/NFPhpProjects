<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'model/entity/BaseEntity.php';

class SiteImage extends BaseEntity {
    const IMAGES_DIR = '/site-images/';
    private $ALLOWED_EXTS = array('jpg', 'png', 'jpeg');
    
    public function getImageName() {
        return $this->imageName;
    }
    
    public function setImageName($name) {
        $this->imageName = $name;
    }

    protected function validateImageName() {
        print_r('image name: ' . $this->imageName);
        if (strlen($this->imageName) < 5) {
            throw new Exception('image name is invalid');
        }
    }
    
    public function validateImageType() {
        if (!in_array($this->imageType, $this->ALLOWED_EXTS)) {
            throw new Exception('image type is invalid');
        }
    }
    
    public function getImageUrl() {
        return NFUtil::getBaseUrl() . self::IMAGES_DIR . $this->getImageName();
    }
    
    public function getImageNamePrefix() {
        return get_class($this);
    }
}
?>