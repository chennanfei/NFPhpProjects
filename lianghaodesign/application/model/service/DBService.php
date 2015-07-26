<?php
require_once 'Scorpion/DB/NFDBService.php';

class DBService extends NFDBService {
    protected function getConfig() {
        return array(
            'dbname'    => getenv('DATABASE_NAME'),
            'driver'    => 'pdo_mysql',
            'host'      => getenv('DATABASE_HOST'),
            'password'  => getenv('DATABASE_PASSWORD'),
            'user'      => getenv('DATABASE_USER')
        );
    }
}
?>