<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/GatewayImageService.php';
require_once 'model/service/ProgramService.php';
require_once 'model/service/SiteChannelService.php';

class IndexDataHelper extends BaseDataHelper {
    protected function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            'jqJS'   => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'libJS'  => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('site.js'),
            'favicon' => NFUtil::getImageUrl('favicon.ico'),
            'siteLogo' => NFUtil::getImageUrl('site_logo.png')
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
    
    protected function getWorkPageData() {
        return $this->getProgramPageData('work');
    }
    
    private function getProgramPageData($channelId) {
        $channel = (new SiteChannelService)->getChannel($channelId);
        $programs = (new ProgramService)->getPrograms($channelId);
        $result = array(
            'page' => $channelId,
            'programs' => $programs,
            'title' => $channel->getEnglishName(),
            'cnTitle' => $channel->getChineseName(),
        );
        return $result;
    }
    
    protected function getLifePageData() {
        return $this->getProgramPageData('life');
    }
    
    protected function getMenuUrls() {
        return array(
            'lifeUrl' => $this->urlHelper->getLifeUrl(),
            'workUrl' => $this->urlHelper->getWorkUrl(),
        );
    }
    
    protected function getProgramProjectsPageData() {
        $programId = $this->request->getParameter('pid');
        $program = (new ProgramService)->getProgram($programId);
        return array('program' => $program);
    }
}
?>