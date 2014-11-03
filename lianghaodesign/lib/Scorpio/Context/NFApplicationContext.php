<?php
require_once 'Scorpio/Context/NFRequestDispatcher.php';
require_once 'Scorpio/Utility/NFRequest.php';
require_once 'Scorpio/Utility/NFSmartyHelper.php';

class NFApplicationContext {
    
    private function dispathRequest() {
        $appRoot = APPLICATION_ROOT_PATH;
        $dispatcher = new NFRequestDispatcher;
        $controllerClass = $dispatcher->getControllerClass();
        $actionMethod = $dispatcher->getActionMethod();
        $controllerPath = "$appRoot/controller/$controllerClass.php";
        if(!file_exists($controllerPath)) {
            $this->redirectToError('404');
            return;
        }
        
        require_once $controllerPath;
        $controller = new $controllerClass;
        if (method_exists($controller, $actionMethod)) {
            $controller->$actionMethod();    
        } else {
            $this->redirectToError('404');
        } 
    }
    
    private function redirectToError($code = 500) {
        (new NFRequest)->redirect(NFUtil::getUrl("/error?code=$code"));
    }
    
    public function run() {
        try {
            $this->dispathRequest();
        } catch (Exception $e) {
            $this->redirectToError();
        }
    }
}
?>