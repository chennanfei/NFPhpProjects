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
    private $smarty;

    protected $request;
    protected $session;
    
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
    
    /** create data helper for the controller */
    private function createDataHelper() {
        // initialize the data helper when this API is firstly called.
        $this->isDataHelperInitialized = true;

        $helperClass = ucfirst($this->controller) . 'DataHelper';
        $helperClassPath = APPLICATION_ROOT_PATH . "/data-helper/$helperClass.php";
        if (!file_exists($helperClassPath)) {
            return null;
        }
        
        require_once $helperClassPath;
        return new $helperClass($this->action, $this->request, $this->session);
    }
    
    /** render the page by template name */
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
    
    protected function getData($key, array $args = null) {
        if (!$this->isDataHelperInitialized) {
            $this->isDataHelperInitialized = true;
            $this->dataHelper = $this->createDataHelper();
        }

        return isset($this->dataHelper) ? $this->dataHelper->getData($key, $args) : null;
    }
    
    protected function setPageData(array $data) {
        $this->smarty->setPageData($data);
    }
    
    /** $key: the getter's name of DataHelper, e.g. getAssets, $key should be 'assets' */
    protected function setPageDataFromHelper($key, array $args = null) {
        $data = $this->getData($key, $args);
        if (isset($data) && is_array($data)) {
            $this->setPageData($data);
        }
    }
    
    protected function setPageTemplateRoot($path) {
        $this->pageRoot = $path;
    }
}
?>