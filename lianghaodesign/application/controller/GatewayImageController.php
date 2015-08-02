<?php
require_once 'controller/BaseController.php';

class GatewayImageController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/admin/gateway-images');
        parent::initialize();
    }
    
    public function imagesAction() {
        $this->setPageDataFromHelper('imageListPageData');
        $this->displayPage('list');
    }
    
    public function imageAction() {
        $action = $this->request->getParameter('a');
        if (!isset($action)) {
            $action = 'add';
        }
        switch ($action) {
            case 'add':
                $this->addImage();
                break;
            case 'update':
                $this->updateImage();
                break;
            case 'delete':
                $this->deleteImage();
                break;
            default:
                $this->redirectError(404);
                break;
        }
    }
    
    private function addImage() {
        $data = $this->getData('addImagePageData');
        if (isset($data['nextUrl'])) {
            $this->request->redirect($data['nextUrl']);
        } else {
            $this->setPageData($data);
            $this->displayPage('image');
        }
    }
    
    private function updateImage() {
        $data = $this->getData('updateImagePageData');
        if (!array_key_exists('image', $data)) {
            return $this->redirectError(404);
        }

        $this->setPageData($data);
        $this->displayPage('image');
    }
    
    private function deleteImage() {
        $data = $this->getData('deleteImagePageData');
        $this->setPageData($data);
        $this->displayPage('list');
    }
}
?>