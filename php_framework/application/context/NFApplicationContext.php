<?php
require_once 'context/NFRequestDispatcher.php';
require_once 'utility/NFSmartyHelper.php';

class NFApplicationContext {
    private function dispathRequest() {
        $dispatcher = new NFRequestDispatcher;
        $controllerClass = $dispatcher->getControllerClass();
        $actionMethod = $dispatcher->getActionMethod();
        $controllerPath = "controller/$controllerClass.php";
        if(!file_exists(APPLICATION_ROOT_PATH . "/$controllerPath")) {
            (new NFSmartyHelper)->displayPage('404');
            return;
        }
        
        require_once "controller/$controllerClass.php";
        $controller = new $controllerClass;
        if (method_exists($controller, $actionMethod)) {
            $controller->$actionMethod();    
        } else {
            (new NFSmartyHelper)->displayPage('404');
        } 
    }
    
    public function run() {
        $this->dispathRequest();  
    }
}
?>