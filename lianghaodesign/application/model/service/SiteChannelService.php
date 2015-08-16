<?php
require_once 'model/entity/SiteChannel.php';
require_once 'model/entity/Program.php';
require_once 'model/service/BaseService.php';

class SiteChannelService extends BaseService {
    public function getChannel($channelId) {
        $channels = $this->dbService->query('select s from SiteChannel s where s.id=:sid',
                                            array('sid' => $channelId));
        if (count($channels) == 1) {
            return $channels[0];
        } else {
            throw new Exception('Channel was not found');
        }
    }
    
    public function getChannels() {
        $channels = $this->dbService->query('select s from SiteChannel s');
        return $channels;
    }
}
?>