<?php
require_once 'controller/BaseController.php';

class GatewayImageController extends BaseController {
    protected function initialize() {
        $this->setPageTemplateRoot('/pages/admin');
        parent::initialize();
    }
    
    public function listImagesAction() {
        $this->setPageDataFromHelper('imageListPageData');
        $this->displayPage('gateway-images');
    }
    
    public function addImageAction() {
        $data = $this->getData('addImagePageData');
        if (isset($data['nextUrl'])) {
            $this->request->redirect($data['nextUrl']);
        } else {
            $this->setPageData($data);
            $this->displayPage('gateway-images-add');
        }
    }
}
?>