<?php
require_once 'Scorpion/Utility/NFUtil.php';
require_once 'Scorpion/Context/NFController.php';
require_once 'utility/Constants.php';

class BaseController extends NFController {
    protected function initialize() {
        $this->setPageData(array('page' => 'home', 'title' => 'Lianghao'));
        $this->setPageDataFromHelper('assets');
        $this->setPageDataFromHelper('menuUrls');

        // check if redirection is needed
        $redirectUrl = $this->getData('redirectUrl');
        if (isset($redirectUrl)) {
            $this->request->redirect($redirectUrl);
        }
    }
    
    protected function redirectError($code = 500) {
        return $this->request->redirect(NFUtil::getUrl('/error?code=' . $code));
    }
}
?>