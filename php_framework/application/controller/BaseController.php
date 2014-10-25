<?php
require_once 'utility/NFUtil.php';
require_once 'controller/NFController.php';

class BaseController extends NFController {
    public function initialize() {
        $this->smarty->setPageData($this->getPageAssets())->setPageData(array(page => 'home'));
    }
    
    private function getPageAssets() {
        return array(
            scripts => array(
                NFUtil::getScriptUrl('lib/thinkmvc.js'),
                NFUtil::getScriptUrl('page.js'),
            ),

            styles => array(
                NFUtil::getStylePath('tm-base.css'),
                NFUtil::getStylePath('page.css')
            )
        );
    }
}
?>