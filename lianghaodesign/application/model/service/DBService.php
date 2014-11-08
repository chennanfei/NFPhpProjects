<?php
require_once 'Scorpion/DB/NFDBService.php';

class DBService extends NFDBService {
    protected function getConfig() {
        return array(
            'dbname'    => 'lianghao',
            'driver'    => 'pdo_mysql',
            'host'      => 'localhost',
            'password'  => 'eric1980',
            'user'      => 'root'
        );
    }
}
?>