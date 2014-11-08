<?php
require_once 'Scorpion/Helper/NFDataHelperInterface.php';

class NFDataHelper implements NFDataHelperInterface {
    private $action;
    
    public function __construct($action) {
        $this->action = $action;
    }
    
    protected function getAction() {
        return $this->action;
    }
    
    public function getAssets() {
        return null;
    }
}
?>