<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/GatewayImageService.php';

class IndexDataHelper extends BaseDataHelper {
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            'jqJS'   => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'libJS'  => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('site.js'),
            'favicon' => NFUtil::getImageUrl('favicon.ico')
        );
    }
    
    protected function getGatewayPageData() {
        $images = (new GatewayImageService)->getImages();
        $result = array(
            'images' => $images,
            'page' => 'loading',
            'title' => 'Welcome to Lianghao',
        );
        return $result;
    }
    
    protected function getMenuUrls() {
        return array(
            'lifeUrl' => $this->urlHelper->getLifeUrl(),
            'workUrl' => $this->urlHelper->getWorkUrl(),
        );
    }
}
?>