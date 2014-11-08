<?php
require_once 'Scorpion/Helper/NFDataHelper.php';

class AdminDataHelper extends NFDataHelper {
    public function getAssets() {
        return array(
            'styles' => array(NFUtil::getStylePath('page.css')),
            
            // ThinkMVC has a bug that the modules depended by 'first' module are not downloaded
            // a solution is, separate thinkmvc to two parts: core and mvc. insert core part into page
            'jqJS' => NFUtil::getScriptUrl('lib/jquery-1.11.0.js'),
            'libJS' => NFUtil::getScriptUrl('lib/thinkmvc.js'),
            'pageJS' => NFUtil::getScriptUrl('page.js')
        );
    }

    public function getMenuLinks() {
        return array(
            'accountUrl'    => NFUtil::getUrl('/admin/account'),
            'newProjUrl'    => NFUtil::getUrl('/admin/createProj'),
            'projectsUrl'   => NFUtil::getUrl('/admin/projects'),
            'signOutUrl'    => NFUtil::getUrl('/admin/signout'),
            'updateGWUrl'   => NFUtil::getUrl('/admin/updateGW'),
            'updateTeamUrl' => NFUtil::getUrl('/admin/updateTeam'),
        );
    }
}
?>