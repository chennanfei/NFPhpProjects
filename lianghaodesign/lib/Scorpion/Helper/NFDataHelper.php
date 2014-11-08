<?php
require_once 'Scorpion/Utility/NFUtil.php';

class NFDataHelper {
    protected $action;
    protected $request;
    protected $session;

    public function __construct($action, $request, $session) {
        $this->action = $action;
        $this->request = $request;
        $this->session = $session;
        
        if (method_exists($this, 'initialize')) {
            $this->initialize();
        }
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