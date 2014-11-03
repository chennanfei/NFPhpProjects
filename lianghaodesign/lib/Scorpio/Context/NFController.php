<?php
require_once 'Scorpio/Utility/NFRequest.php';
require_once 'Scorpio/Utility/NFSession.php';
require_once 'Scorpio/Utility/NFSmartyHelper.php';

class NFController {
    protected $request;
    protected $smarty;
    
    public function __construct() {
        $this->request = new NFRequest;
        $this->session = new NFSession;
        $this->smarty = new NFSmartyHelper;
        
        if (method_exists($this, 'initialize')) {
            $this->initialize();
        }
    }
}
?>