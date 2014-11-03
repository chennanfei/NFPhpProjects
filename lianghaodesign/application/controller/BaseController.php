<?php
require_once 'Scorpio/Utility/NFUtil.php';
require_once 'Scorpio/Context/NFController.php';

class BaseController extends NFController {
    public function initialize() {
        $this->smarty->setPageData(array(
            page => 'home',
            title => 'Lianghao'
        ));
        $this->initPageAssets();
    }
    
    private function initPageAssets() {
        $this->smarty->setPageData(array(
            styles => array(NFUtil::getStylePath('page.css')),
            
            // ThinkMVC has a bug that the modules depended by 'first' module are not downloaded
            // a solution is, separate thinkmvc to two parts: core and mvc. insert core part into page
            jqJS => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            libJS => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            pageJS => NFUtil::getScriptUrl('page.js')
        ));
    }
}
?>