<?php
require_once 'Scorpion/Utility/NFRequest.php';
require_once 'Scorpion/Utility/NFSession.php';
require_once 'Scorpion/Utility/NFSmartyHelper.php';

class NFController {
    private $action;
    private $controller;
    private $dataHelpr;
    private $isDataHelperInitialized = false;
    private $pageRoot = '/pages';

    protected $request;
    protected $session;
    protected $smarty;
    
    public function __construct($controller, $action) {
        $this->action = $action;
        $this->controller = $controller;

        $this->request = new NFRequest;
        $this->session = new NFSession;
        $this->smarty = new NFSmartyHelper;
        
        if (method_exists($this, 'initialize')) {
            $this->initialize();
        }
    }
    
    protected function displayPage($page, array $data = null) {
        if (empty($page)) {
            throw new Exception('No template file was assigned.', Constants::ERR_INVALID_TEMPL_FILE);
        }
        
        if (!empty($data)) {
            $this->smarty->setPageData($data);
        }
        
        $this->smarty->displayPage($this->pageRoot . "/$page");
    }
    
    protected function getAction() {
        return $this->action;
    }
    
    protected function getController() {
        return $this->controller;
    }
    
    protected function getData($key) {
        if (!$this->isDataHelperInitialized) {
            // initialize the data helper when this API is firstly called.
            $this->isDataHelperInitialized = true;

            $helperClass = ucfirst($this->controller) . 'DataHelper';
            $helperClassPath = APPLICATION_ROOT_PATH . "/data-helper/$helperClass.php";
            if (!file_exists($helperClassPath)) {
                return null;
            }
            
            require_once $helperClassPath;
            $this->dataHelper = new $helperClass($this->action);
        }

        if (!isset($this->dataHelper) || empty($key)) {
            return null;
        }
        
        $method = 'get' . ucfirst($key);
        if (method_exists($this->dataHelper, $method)) {
            return $this->dataHelper->$method();
        }
        
        return null;
    }
    
    protected function setPageData(array $data) {
        $this->smarty->setPageData($data);
    }
    
    /** $key: the getter's name of DataHelper, e.g. getAssets, $key should be 'assets' */
    protected function setPageDataFromHelper($key) {
        $data = $this->getData($key);
        if (isset($data) && is_array($data)) {
            $this->setPageData($data);
        }
    }
    
    protected function setPageTemplateRoot($path) {
        $this->pageRoot = $path;
    }
}
?>