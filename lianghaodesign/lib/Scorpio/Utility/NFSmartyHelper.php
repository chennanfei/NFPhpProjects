<?php
require_once 'smarty/Smarty.class.php';

class NFSmartyHelper {
    const TEMPLATES_ROOT = '/view/templates';
    const TEMPLATE_SUFFIX = '.tpl';
    
    private $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty();
        $this->smarty->left_delimiter = "{";
        $this->smarty->right_delimiter = "}";
        $this->smarty->compile_dir = SITE_ROOT_PATH . '/view/templates_c';
        $this->smarty->cache_dir = SITE_ROOT_PATH . '/view/templates_c/cache_c';
        $this->smarty->template_dir = SITE_ROOT_PATH . '/view/templates';
    }
    
    public function displayPage($page) {
        if (isset($page)) {
            $this->smarty->display(SITE_ROOT_PATH . self::TEMPLATES_ROOT . '/' . $page . self::TEMPLATE_SUFFIX);
        }
    }
    
    public function setPageData($data) {
        if (empty($data)) {
            return $this;
        }
        
        foreach ($data as $k => $v) {
            $this->smarty->assign($k, $v);
        }
        
        return $this;
    }
    
}
?>