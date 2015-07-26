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
        $this->smarty->compile_dir = $_ENV['SMARTY_COMPILE_DIR'];
        $this->smarty->cache_dir = $_ENV['SMARTY_COMPILE_CACHE_DIR'];
        $this->smarty->template_dir = SITE_ROOT_PATH . self::TEMPLATES_ROOT;
    }
    
    public function displayPage($page) {
        if (!empty($page)) {
            if ($page[0] != '/') {
                $page = '/' . $page;
            }
            $this->smarty->display(SITE_ROOT_PATH . self::TEMPLATES_ROOT . $page . self::TEMPLATE_SUFFIX);
        }
    }
    
    public function setPageData(array $data) {
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