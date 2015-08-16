<?php
require_once 'data-helper/BaseDataHelper.php';
require_once 'model/service/ProjectService.php';
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

        return array(
            'projects' => (new ProjectService)->getProjects($channelId),
            'page' => 'projectList',
            'pageContentTitle' => 'Projects (' . $channelId . ')',
            'title' => 'Projects - ' . $channelId
        );
    }
    
    protected function getAddProjectPageData() {
        if ($this->request->isPost()) {
            try {
                $result = $this->addProject();
            } catch (Exception $e) {
                $result = array('message' => $e->getMessage());
                $result['messageType'] = 'error';
            }
        }
        
        if (!array_key_exists('project', $result)) {
            $result['project'] = new Project;
        }
        $result['action'] = 'add';
        $result['page'] = 'projectAdd';
        $result['pageContentTitle'] = 'Add new project';
        $result['title'] = 'Add new project';
        return $result;
    }
    
    private function addProject() {
        
    }
}
?>