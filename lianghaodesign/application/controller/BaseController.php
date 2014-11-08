<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Context/NFController.php';
require_once 'utility/Constants.php';

class BaseController extends NFController {
    protected function initialize() {
        $this->setPageData(array('page' => 'home', 'title' => 'Lianghao'));
        $this->setPageDataFromHelper('assets');
    }
}
?>