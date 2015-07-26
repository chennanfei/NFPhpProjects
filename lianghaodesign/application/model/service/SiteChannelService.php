<?php
require_once 'model/entity/SiteChannel.php';
require_once 'model/entity/Program.php';
require_once 'model/service/BaseService.php';

class SiteChannelService extends BaseService {
    public function getChannels() {
        $channels = $this->dbService->query('select s from SiteChannel s');
        return $channels;
    }

    public function getPrograms($channelId) {
        $programs = $this->dbService->query('select p from Program p where p.siteChannelId=:cid order by p.displayOrder',
            array('cid' => $channelId));
        return $programs;
    }
}
?>