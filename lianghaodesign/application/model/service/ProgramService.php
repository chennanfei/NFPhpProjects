<?php
require_once 'model/service/BaseService.php';
require_once 'model/service/ProjectService.php';

class ProgramService extends BaseService {
    public function getPrograms($channelId) {
        $programs = $this->getPurePrograms($channelId);
        $projSrv = new ProjectService;
        foreach ($programs as $p) {
            $projects = $projSrv->getProjects($p->getId());
            $program->addProjects($projects);
        }
        
        return $programs;
    }
    
    public function getPurePrograms($channelId) {
        return $this->dbService->query('select p from Program p where p.siteChannelId=:cid order by p.displayOrder',
                                        array('cid' => $channelId));
    }
}
?>