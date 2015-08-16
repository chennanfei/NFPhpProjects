<?php
require_once 'model/service/BaseService.php';
require_once 'model/service/ProjectService.php';

class ProgramService extends BaseService {
    public function getPrograms($channelId) {
        $programs = $this->dbService->query('select p from Program p where p.siteChannelId=:cid order by p.displayOrder',
                                            array('cid' => $channelId));
        $projSrv = new ProjectService;
        foreach ($p as $programs) {
            $projects = $projSrv->getProjects($p->getId());
            $program->addProjects($projects);
        }
        
        return $programs;
    }
}
?>