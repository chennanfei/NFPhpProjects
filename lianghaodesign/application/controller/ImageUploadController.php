<?php

require_once 'controller/BaseController.php';

class ImageUploadController extends BaseController {
    const IMAGES_DIR = '/uploaded_images';
    private $ALLOWED_EXTS = array('jpg', 'png', 'jpeg');
    
    public function indexAction() {
        $uploadedImage = $_FILES['uploadedImage'];
        $name = $uploadedImage['name'];
        $size = $uploadedImage['size'];
        $tmp = $uploadedImage['tmp_name'];

        $path = pathinfo($name);
        if (!in_array($path['extension'], $this->ALLOWED_EXTS)) {
            echo 'image type is wrong. only jpg, png are allowed';
            return;
        }
        
        if ($size > 1024 * 1024) {
            echo 'image size should be smaller than 1M';
            return;
        }
        
        $imageName = $this->request->getParameter('imageNamePrefix') . $path['basename'];
        $imagePath = self::IMAGES_DIR . "/$imageName";
        if (move_uploaded_file($tmp, $imagePath)) {
            $imageUrl = $this->getUploadedImageUrl($imageName);
            echo "<img src='$imageUrl' data-image-name='$imageName'>";
        } else {
            echo 'Failed to upload image. Please try again.';
        }
    }
    
    private function getUploadedImageUrl($imageName) {
        return NFUtil::getBaseUrl() . '/' . self::IMAGES_DIR . "/$imageName";
    }
}
?>