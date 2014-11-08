<?php
require_once 'Scorpion/Helper/NFDataHelper.php';

class ErrorDataHelper extends NFDataHelper {
    public function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
        );
    }
}
?>