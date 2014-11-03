<?php
class NFRequest {
    private $paramList;
    
    public function getParameter($name) {
        $params = $this->getParameters();
        if (array_key_exists($name, $params)) {
            return $params[$name];
        }
        
        return null;
    }
    
    public function getParameters() {
        if (!$this->paramList) {
            $this->paramList = array_merge($_POST, $_GET);
            
            if (empty($this->paramList)) {
                $this->paramList = array();
            }
        }
        return $this->paramList;
    }
    
    public function isPost() {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }
    
    public function redirect($url) {
        if (isset($url)) {
            Header("Location:$url");
        }
    }
}

?>