<?php
require_once 'Scorpion/Context/NFRequestDispatcher.php';
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Utility/NFRequest.php';
require_once 'Scorpion/Utility/NFSmartyHelper.php';

class NFApplicationContext {
    
    private function dispathRequest() {
        $dispatcher = new NFRequestDispatcher;
        $controllerClass = $dispatcher->getControllerClass();
        $actionMethod = $dispatcher->getActionMethod();

        $controllerPath = APPLICATION_ROOT_PATH . "/controller/$controllerClass.php";
        if(!file_exists($controllerPath)) {
            $this->redirectToError('404');
            return;
        }

        require_once $controllerPath;
        $controller = new $controllerClass($dispatcher->getController(), $dispatcher->getAction());
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
            print_r($e);
            //$this->redirectToError();
        }
    }
}
?>