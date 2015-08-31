<?php
require_once 'Scorpion/DB/NFDBService.php';

class DBService extends NFDBService {
    protected function getConfig() {
        $port = getenv('DATABASE_PORT');
        if (!$port) {
            $port = 3306;
        }
        return array(
            'dbname'    => getenv('DATABASE_NAME'),
            'driver'    => 'pdo_mysql',
            'host'      => getenv('DATABASE_HOST'),
            'port'      => $port,
            'password'  => getenv('DATABASE_PASSWORD'),
            'user'      => getenv('DATABASE_USER')
        );
    }
}
?>
