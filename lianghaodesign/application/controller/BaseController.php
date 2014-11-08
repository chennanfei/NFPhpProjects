<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Context/NFController.php';
require_once 'utility/Constants.php';

class BaseController extends NFController {
    protected $secureActions = array();
    
    public function initialize() {
        $this->setPageData(array('page' => 'home', 'title' => 'Lianghao'));
        $this->setPageDataFromHelper('assets');
    }
    
    protected function isSecureAction() {
        if (empty($this->secureActions)) {
            return false;
        }
        return in_array($this->getAction(), $this->secureActions, true);
    }
}
?>