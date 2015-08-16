<?php
require_once 'Scorpion/Utility/NFUtil.php';

class UrlDataHelper {
    public function getAcountUrl() {
        return NFUtil::getUrl('admin/account');
    }
    
    public function getGatewayImageUrl() {
        return NFUtil::getUrl('gatewayImage/image');
    }
    
    public function getGatewayImagesUrl() {
        return NFUtil::getUrl('gatewayImage/images');
    }
    
    public function getHomeUrl() {
        return NFUtil::getUrl('admin/home');
    }
    
    public function getLifeUrl() {
        return NFUtil::getUrl('index/life');
    }
    
    public function getProjectUrl() {
        return NFUtil::getUrl('project/project');
    }
    
    public function getProjectsUrl() {
        return NFUtil::getUrl('project/projects');
    }
    
    public function getSignInUrl() {
        return NFUtil::getUrl('admin/signin');
    }
    
    public function getSignOutUrl() {
        return NFUtil::getUrl('admin/signout');
    }
    
    public function getWorkUrl() {
        return NFUtil::getUrl('index/work');
    }
}
?>