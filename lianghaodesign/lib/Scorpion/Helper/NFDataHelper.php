<?php
require_once 'Scorpion/Utility/NFUtil.php';

class NFDataHelper {
    private $action;
    
    public function __construct($action) {
        $this->action = $action;
    }
    
    protected function getAction() {
        return $this->action;
    }
    
    protected function getAssets() {
        return null;
    }
    
    public function getData($key, array $args = null) {
        if (empty($key)) {
            throw new Exception('Invalid parameter.');
        }

        $method = 'get' . ucfirst($key);
        if (method_exists($this, $method)) {
            return $this->$method($args);
        }
    }
}
?>