<?php
require_once 'controller/BaseController.php';

class ProjectController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/admin/projects');
        parent::initialize();
    }
    
    public function projectAction() {
        $action = $this->request->getParameter('a');
        if (!isset($action)) {
            $action = 'add';
        }
        switch ($action) {
            case 'add':
                $this->addProject();
                break;
            case 'update':
                $this->updateProject();
                break;
            case 'delete':
                $this->deleteProject();
                break;
            default:
                $this->redirectError(404);
                break;
        }
    }
    
    private function addProject() {
        $data = $this->getData('addProjectPageData');
        if (isset($data['nextUrl'])) {
            $this->request->redirect($data['nextUrl']);
        } else {
            $this->setPageData($data);
            $this->displayPage('project');
        }
    }
    
    private function updateProject() {
        $data = $this->getData('updateProjectPageData');
        if (!array_key_exists('project', $data)) {
            return $this->redirectError(404);
        }

        $this->setPageData($data);
        $this->displayPage('project');
    }
    
    private function deleteProject() {
        $data = $this->getData('deleteProjectPageData');
        $this->setPageData($data);
        $this->displayPage('list');
    }
    
    public function projectsAction() {
        $this->setPageDataFromHelper('projectListPageData');
        $this->displayPage('list');
    }
}
?>