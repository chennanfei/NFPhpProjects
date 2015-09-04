<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/ProjectService.php';
require_once 'model/service/SiteChannelService.php';
require_once 'model/service/ProgramService.php';
require_once 'model/entity/Project.php';
 
class ProjectDataHelper extends BaseDataHelper {
    public function initialize() {
        parent::initialize();
        $this->scureActions = array(
            'project',
            'projects',
        );
    }
    
    protected function getMenuUrls() {
        return array(
            'lifeProjectsUrl' => $this->urlHelper->getProjectsUrl('life'),
            'workProjectsUrl' => $this->urlHelper->getProjectsUrl('work'),
            'projectUrl' => $this->urlHelper->getProjectUrl(),
            'projectsUrl' => $this->urlHelper->getProjectsUrl(),
            'homeUrl' => $this->urlHelper->getHomeUrl(),
            'signOutUrl' => $this->urlHelper->getSignOutUrl(),
        );
    }
    
    protected function getProjectListPageData() {
        $channelId = $this->request->getParameter('ch');
        if (!isset($channelId)) {
            $channelId = 'work';
        }
        
        $programSrv = new ProgramService;
        $programs = $programSrv->getPurePrograms($channelId);
        
        $programId = $this->request->getParameter('pg');
        if (!isset($programId)) {
            $programId = $programs[0]->getId();
        }
        
        return array(
            'channelId' => $channelId,
            'programId' => $programId,
            'programs' => $programs,
            'projects' => (new ProjectService)->getProjects($programId),
            'page' => 'projectList',
            'pageContentTitle' => 'Projects (' . $channelId . ')',
            'title' => 'Projects - ' . $channelId
        );
    }
    
    protected function getAddProjectPageData() {
        $isCreated = false;
        if ($this->request->isPost()) {
            try {
                $result = $this->addProject();
                $isCreated = true;
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage());
                $result['messageType'] = 'error';
            }
        } else {
            $result = array();
        }
        
        if (!array_key_exists('project', $result)) {
            $result['project'] = new Project;
        }
        
        $programId = $result['project']->getProgramId();
        $channelResult = $this->getProgramChannels($programId);
        $result = array_merge($result, $channelResult);
        
        if ($isCreated) {
            $result['nextUrl'] = $this->urlHelper->getProjectsUrl($result['curChannelId'], $programId);
        }
        
        $result['action'] = 'add';
        $result['page'] = 'project';
        $result['pageContentTitle'] = 'Add new project';
        $result['title'] = 'Add new project';
        return $result;
    }
    
    private function getProgramChannels($programId) {
        $result = array(
            'channels' => (new SiteChannelService)->getChannels()
        );
        foreach ($result['channels'] as $ch) {
            $programSrv = new ProgramService;
            $programs = $programSrv->getPurePrograms($ch->getId());
            $ch->setPrograms($programs);
            
            foreach ($programs as $program) {
                if ($programId == $program->getId()) {
                    $result['curChannelId'] = $ch->getId();
                }
            }
        }
        return $result;
    }
    
    protected function getUpdateProjectPageData() {
        if ($this->request->isPost()) {
            try {
                $result = $this->updateProject();
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage());
                $result['messageType'] = 'error';
            }
        } else {
            $result = array();
        }
        
        $projectId = $this->request->getParameter('id');
        if (!array_key_exists('project', $result)) {
            $result['project'] = (new ProjectService)->getProject($projectId);
        }
        
        $channelResult = $this->getProgramChannels($result['project']->getProgramId());
        $result = array_merge($result, $channelResult);
        
        $result['action'] = 'update';
        $result['page'] = 'project';
        $result['pageContentTitle'] = 'Update project';
        $result['title'] = 'Update project';
        
        $result['previewedImagesUrl'] = $this->urlHelper->getPreviewedProjectImagesUrl($projectId);
        $result['projectImagesUrl'] = $this->urlHelper->getProjectImagesUrl($projectId);
        return $result;
    }
    
    protected function getDeleteProjectPageData() {
        $projectId = $this->request->getParameter('id');
        $channelId = $this->request->getParameter('ch');
        $programId = $this->request->getParameter('pg');
        try {
            (new ProjectService)->removeProject($projectId);
            $url = $this->urlHelper->getProjectsUrl($channelId, $programId);
            $result = array('nextUrl' => $url);
        } catch (Exception $e) {
            $message = $e->getMessage();
            $messageType = 'error';
            $result = $this->getProjectListPageData();
            $result['message'] = $e->getMessage();
            $result['messageType'] = 'error';
        }
        return $result;
    }
    
    private function addProject() {
        $data = $this->request->getParameters();
        $data['creator'] = $this->session->getUserID();
        $project = (new ProjectService)->saveProject($data);
        $result = array('project' => $project, 'nextUrl' => null);
        if (!$project->isValid()) {
            $result['errors'] = $project->getErrors();
            $result['messageType'] = 'error';
        }
        return $result;
    }
    
    private function updateProject() {
        $data = $this->request->getParameters();
        $project = (new ProjectService)->saveProject($data);
        if ($project->isValid()) {
            $result = array('message' => 'Successfully updated the image', 'messageType' => 'info');
        } else {
            $result = array('message' => $e->getMessage(), 'messageType' => 'error');
        }
        $result['project'] = $project;
        return $result;
    }
}
?>