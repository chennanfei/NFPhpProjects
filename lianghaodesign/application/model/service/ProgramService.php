<?php
require_once 'model/service/BaseService.php';
require_once 'model/service/ProjectService.php';

class ProgramService extends BaseService {
    public function getPrograms($channelId) {
        $programs = $this->getPurePrograms($channelId);
        $this->fillProgramProjects($programs[0]);
        return $programs;
    }
    
    public function getProgram($programId) {
        if (!$programId) {
            throw new Exception('program id is invalid');
        }
        
        $programs = $this->dbService->query('select p from Program p where p.id=:id',
                                            array('id' => $programId));
        if (!count($programs)) {
            throw new Exception("program $programId was not found");
        }
        
        $this->fillProgramProjects($programs[0]);
        return $programs[0];
    }
    
    private function fillProgramProjects($program) {
        $projects = (new ProjectService)->getProjects($program->getId());
        if ($projects && count($projects)) {
            foreach ($projects as $project) {
                $this->setProjectImages($project);
            }
        }
        
        $program->setProjects($projects);
    }
    
    private function setProjectImages($project) {
        $srv = new ProjectService;
        $images = $srv->getImages($project->getId(), true);
        $project->setPreviewedImages($images);
        
        $images = $srv->getImages($project->getId(), false);
        $project->setImages($images);
    }
    
    public function getPurePrograms($channelId) {
        return $this->dbService->query('select p from Program p where p.siteChannelId=:cid order by p.displayOrder',
                                        array('cid' => $channelId));
    }
}
?>