<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/GatewayImageService.php';
require_once 'model/service/SiteChannelService.php';

class GatewayImageDataHelper extends BaseDataHelper {
    protected function initialize() {
        $this->scureActions = array(
            'home',
            'listImages',
            'addImage',
        );
    }
    
    protected function getAddImagePageData() {
        $req = $this->request;
        $result = array('nextUrl' => null);
        if ($req->isPost()) {
            try {
                $data = $req->getParameters();
                $data['creator'] = $this->session->getUserID();
                $image = (new GatewayImageService)->saveImage($data);
                if ($image->isValid()) {
                    $result['nextUrl'] = NFUtil::getUrl('/gatewayImage/listImages');
                    return $result;
                } else {
                    $result['errors'] = $image->getErrors();
                }
            } catch (Exception $e) {
                $result['message'] = $e->getMessage();
            }
            $result['messageType'] = 'error';
        }
        
        $result['channels'] = (new SiteChannelService)->getChannels();
        $result['page'] = 'gwImageAdd';
        $result['pageContentTitle'] = 'Add new gateway image';
        $result['title'] = 'Add gateway image';
        return $result;
    }

    protected function getImageListPageData() {
        $images = (new GatewayImageService)->getImages();
        $channels = (new SiteChannelService)->getChannels();
        
        foreach ($images as $image) {
            foreach ($channels as $chan) {
                if ($chan->getId() == $image->getSiteChannelId()) {
                    $image->setSiteChannel($chan);
                }
            }
        }

        return array(
            'images' => $images,
            'page' => 'gwImageList',
            'pageContentTitle' => 'Gateway images',
            'title' => 'Gateway images'
        );
    }
    
    protected function getMenuUrls() {
        return array(
            'addImageUrl' => NFUtil::getUrl('/gatewayImage/addImage'),
            'listImagesUrl' => NFUtil::getUrl('/gatewayImage/listImages'),
            'homeUrl' => $this->getHomeUrl(),
            'signOutUrl' => NFUtil::getUrl('/admin/signout'),
        );
    }
}
?>