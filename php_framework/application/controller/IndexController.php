<?php
require_once 'controller/BaseController.php';

class IndexController extends BaseController {
    public function indexAction() {
        $this->smarty->displayPage('index');
    }
}
?>