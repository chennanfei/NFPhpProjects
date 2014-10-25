<?php
/* its duty is to look for correct controller and action.
    the request url is something like as below:
    1. host/app/ or host/app/index.php -> controller: index, action: index
    2. host/app/index.php/work -> controller: work, action: index
    3. host/app/index.php/work/update -> controller: work, action: update
*/
class NFRequestDispatcher {
    const SUFFIX_ACTION = 'Action';
    const SUFFIX_CONTROLLER = 'Controller';
    
    private $controller;
    private $action;
    
    public function __construct() {
        $pathInfo = array_key_exists('PATH_INFO', $_SERVER) ? $_SERVER['PATH_INFO'] : null;
        if (!isset($pathInfo) || empty($pathInfo)) {
            $this->controller = 'index';
            $this->action = 'index';
        } else {
            $terms = split('[\/]', $pathInfo);
            $this->controller = $terms[1];
            $this->action = count($terms) > 2 ? $terms[2] : 'index';
        }
    }
    
    public function getAction() {
        return $this->action;
    }
    
    public function getActionMethod() {
        return $this->action . self::SUFFIX_ACTION;
    }
    
    public function getController() {
        return $this->controller;
    }
    
    public function getControllerClass() {
        return ucfirst($this->controller) . self::SUFFIX_CONTROLLER;
    }
}
?>