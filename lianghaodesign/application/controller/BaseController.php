<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Context/NFController.php';
require_once 'utility/Constants.php';

class BaseController extends NFController {
    public function initialize() {
        $this->setPageData(array('page' => 'home', 'title' => 'Lianghao'));
        $this->setPageDataFromHelper('assets');
    }
    
    protected function isSecureAction() {
        $secueActions = $this->getData('secureActions');
        if (empty($secueActions)) {
            return false;
        }
        return in_array($this->getAction(), $secueActions, true);
    }
}
?>