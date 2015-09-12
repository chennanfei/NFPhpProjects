<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/entity/GatewayImage.php';
require_once 'model/service/GatewayImageService.php';
require_once 'model/service/SiteChannelService.php';

class GatewayImageDataHelper extends BaseDataHelper {
    public function initialize() {
        parent::initialize();
        $this->scureActions = array(
            'image',
            'images',
        );
    }
    
    protected function getMenuUrls() {
        return array(
            'imageUrl' => $this->urlHelper->getGatewayImageUrl(),
            'imagesUrl' => $this->urlHelper->getGatewayImagesUrl(),
            'homeUrl' => $this->urlHelper->getHomeUrl(),
            'signOutUrl' => $this->urlHelper->getSignOutUrl(),
            'uploadImageUrl' => $this->urlHelper->getUploadImageUrl()
        );
    }
    
    protected function getAddImagePageData() {
        if ($this->request->isPost()) {
            try {
                $result = $this->addImage();
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage());
                $result['messageType'] = 'error';
            }
        }
        
        if (!array_key_exists('image', $result)) {
            $result['image'] = new GatewayImage;
        }
        $result['action'] = 'add';
        $result['channels'] = (new SiteChannelService)->getChannels();
        $result['page'] = 'gwImageAdd';
        $result['pageContentTitle'] = 'Add new gateway image';
        $result['title'] = 'Add gateway image';
        return $result;
    }
    
    private function addImage() {
        $data = $this->request->getParameters();
        $data['creator'] = $this->session->getUserID();
        $image = (new GatewayImageService)->saveImage($data);
        $result = array('image' => $image, 'nextUrl' => null);
        if ($image->isValid()) {
            $result['nextUrl'] = $this->urlHelper->getGatewayImagesUrl();
        } else {
            $result['errors'] = $image->getErrors();
            $result['messageType'] = 'error';
        }
        return $result;
    }

    protected function getImageListPageData() {
        return array(
            'images' => (new GatewayImageService)->getImages(),
            'page' => 'gwImageList',
            'pageContentTitle' => 'Gateway images',
            'title' => 'Gateway images'
        );
    }
    
    protected function getUpdateImagePageData() {
        if ($this->request->isPost()) {
            try {
                $result = $this->updateImage();
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage(), 'messageType' => 'error');
            }
        } else {
            $result = array();
        }
        
        if (!array_key_exists('image', $result)) {
            $result['image'] = (new GatewayImageService)->getImage($this->request->getParameter('id'));
        }
        $result['action'] = 'update';
        $result['channels'] = (new SiteChannelService)->getChannels();
        $result['page'] = 'gwImageUpdate';
        $result['pageContentTitle'] = 'Update gateway image';
        $result['title'] = 'Update gateway image';
        return $result;
    }
    
    private function updateImage() {
        $data = $this->request->getParameters();
        $image = (new GatewayImageService)->saveImage($data);
        if ($image->isValid()) {
            $result = array('message' => 'Successfully updated the image', 'messageType' => 'info');
        } else {
            $result = array('message' => $e->getMessage(), 'messageType' => 'error');
        }
        $result['image'] = $image;
        return $result;
    }
    
    protected function getDeleteImagePageData() {
        $imageId = $this->request->getParameter('id');
        $message = null;
        $messageType = null;
        try {
            (new GatewayImageService)->removeImage($imageId);
            $message = 'Successfully deleted the image';
            $messageType = 'info';
        } catch (Exception $e) {
            $message = $e->getMessage();
            $messageType = 'error';
        }
        $result = $this->getImageListPageData();
        $result['message'] = $message;
        return $result;
    }
}
?>