<?php
require_once 'model/service/DBService.php';

class BaseService {
    protected $dbService;

    public function __construct() {
        $this->dbService = new DBService;
    }    
}
?>