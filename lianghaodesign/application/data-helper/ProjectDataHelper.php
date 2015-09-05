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
            'uploadImageUrl' => $this->urlHelper->getUploadImageUrl(),
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
            return array('message' => "Successfully delete the project $projectId");
        } catch (Exception $e) {
            return array('message' => $e->getMessage());
        }
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
        $result['page'] = 'projectImageList';
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
        $image->setDisplayOrder(1);
        return $image;
    }
    
    protected function getAddProjectImagePageData() {
        $projectId = $this->request->getParameter('projectId');
        $isPreviewed = $this->request->getParameter('isPreviewed') == 1 ? 1 : 0;
        $result = $this->initializeImagesPage($projectId, $isPreviewed);
        if ($this->request->isPost()) {
            $result = array_merge($result, $this->addImage());
        }
        
        return $result;
    }
    
    private function addImage() {
        $data = $this->request->getParameters();
        $data['creator'] = $this->session->getUserID();
        try {
            $image = (new ProjectService)->saveImage($data);
        } catch (Exception $e) {
            return array('messageType' => 'error', 'message' => $e->getMessage());
        }
        
        $result = array();
        if ($image->isValid()) {
            $result['nextUrl'] = $this->getImageNextUrl($data['projectId'], $data['isPreviewed']);
        } else {
            $result['errors'] = $image->getErrors();
            $result['messageType'] = 'error';
        }
        $result['image'] = $image;
        return $result;
    }
    
    private function getImageNextUrl($projectId, $isPreviewed) {
        $nextUrl = $this->urlHelper->getProjectImagesUrl($projectId);
        if ($isPreviewed) {
            $nextUrl = "$nextUrl&preview=1";
        }
        return $nextUrl;
    }
    
    protected function getUpdateProjectImagePageData() {
        $imageId = $this->request->getParameter('id');
        $isPreviewed = $this->request->getParameter('isPreviewed');
        $projectId = $this->request->getParameter('pid');
        $isPreviewed = $this->request->getParameter('ip');
        
        $service = new ProjectService;
        $image = $service->getImage($imageId);
        if (!$image) {
            //return array('nextUrl' => $this->getImageNextUrl($projectId, $isPreviewed));
        }
        $projectId = $image->getProjectId();
        $result = $this->initializeImagesPage($projectId, $image->getIsPreviewed());
        $result['action'] = 'update';
        $result['image'] = $image;
        if (!$this->request->isPost()) {
            return $result;
        }

        $data = $this->request->getParameters();
        try {
            $result['image'] = $service->saveImage($data);
            if ($result['image']->isValid()) {
                $result['message'] = 'Successfully saved the image';
                $result['messageType'] = 'info';
            } else {
                $result['messageType'] = 'error';
                $result['errors'] = $image->getErrors();
            }
        } catch (Exception $e) {
            $result['messageType'] = 'error';
            $result['message'] = $e->getMessage();
        }
        
        return $result;
    }
    
    protected function getDeleteProjectImagePageData() {
        $imageId = $this->request->getParameter('id');
        try {
            (new ProjectService)->deleteImage($imageId);
            return array('message' => "Successfully deleted the image $imageId");
        } catch (Exception $e) {
            return array('message' => $e->getMessage());
        }
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