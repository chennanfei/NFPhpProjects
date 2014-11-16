<?php
require_once 'model/entity/SiteChannel.php';
require_once 'model/entity/Program.php';

class SiteChannelService {
    private $channels;
    
    public function __construct() {
        $this->channels = array(
            $this->createWorkChannel(),
            $this->createLefeChannel()
        );
    }
    
    public function getChannels() {
        return $this->channels;
    }
    
    private function createLefeChannel() {
        $channel = new SiteChannel('生活', 'Life', 2);
        $channel->addProgram(new Program('良好新闻', 'News', 21));
        $channel->addProgram(new Program('良好团队', 'Team', 21));
        $channel->addProgram(new Program('良好产品', 'Products', 22));
        $channel->addProgram(new Program('发现', 'Discovery', 23));
        return $channel;
    }
    
    private function createWorkChannel() {
        $channel = new SiteChannel('工作', 'Work', 1);
        $channel->addProgram(new Program('环境导向系统', 'Wayfinding System', 11));
        $channel->addProgram(new Program('网站设计', 'Website Design', 11));
        $channel->addProgram(new Program('品牌形象设计', 'Branding & VI System', 12));
        $channel->addProgram(new Program('其他设计', 'Other Design', 13));
        return $channel;
    }
}
?>