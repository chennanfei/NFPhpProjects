<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/ProjectService.php';
require_once 'model/service/SiteChannelService.php';
require_once 'model/service/ProgramService.php';
require_once 'model/entity/Project.php';
require_once 'model/entity/ProjectImage.php';
 
class ProjectDataHelper extends BaseDataHelper {
    public function initialize() {
        parent::initialize();
        $this->scureActions = array(
            'project',
            'projects',
            'images',
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
    
    protected function getProjectImagesPageData() {
        $projectId = $this->request->getParameter('projectId');
        $imageId = $this->request->getParameter('imageId');
        $isPreviewed = $this->request->getParameter('preview') == 1 ? 1 : 0;
        
        try {
            $result = $this->initializeImagesPage($projectId, $isPreviewed);
        } catch (Exception $e) {
            return array('message' => $e->getMessage(), 'messageType' => 'error');
        }
        
        $result['image'] = $this->getEmptyImage($isPreviewed);
        $result['action'] = 'add';
        return $result;   
    }
    
    private function initializeImagesPage($projectId, $isPreviewed) {
        $result = array();
        $result['projectImagesUrl'] = $this->urlHelper->getProjectImagesUrl($projectId);
        $result['page'] = 'project';
        $result['pageContentTitle'] = $isPreviewed ? 'Previewed images' : 'Project images';
        $result['title'] = 'Project images';
        
        $service = new ProjectService;
        $result['images'] = $service->getImages($projectId, $isPreviewed);
        $result['project'] = $service->getProject($projectId);

        return $result;
    }
    
    private function getEmptyImage($isPreviewed) {
        $image = new ProjectImage;
        $image->setIsHalf(0);
        $image->setIsPreviewed($isPreviewed);
        $image->setDisplayPosition('center');
        return $image;
    }
    
    protected function getAddProjectImagePageData() {
        $data = $this->request->getParameters();
        $data['creator'] = $this->session->getUserID();
        try {
            $image = (new ProjectService)->saveImage($data);
            $result = array('image' => $image, 'nextUrl' => null);
            if ($image->isValid()) {
                $result['nextUrl'] = $this->urlHelper->getProjectImagesUrl($projectId);
                if ($data['isPreviewed']) {
                    $result['nextUrl'] = $result['nextUrl'] . '&preview=1';
                }
            } else {
                $result['errors'] = $image->getErrors();
                $result['messageType'] = 'error';
            }
        } catch (Exception $e) {
            $result = array('messageType' => 'error', 'message' => $e->getMessage());
        }
        
        return $result;
    }
    
    protected function getUpdateProjectImagePageData() {
        $imageId = $this->request->getParameter('id');
        $service = new ProjectService;
        $image = $service->getImage($imageId);
        $projectId = $image->getProjectId();
        $result = $this->initializeImagesPage($projectId, $image->getIsPreviewed());
        $result['action'] = 'update';
        if ($this->request->isPost()) {
            $data = $this->request->getParameters();
            $result['image'] = $service->saveImage($data);
            $result['message'] = 'Successfully saved the image';
        } else {
            $result['image'] = $image;
        }
        
        return $result;
    }
    
    private function deleteImage() {
        
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