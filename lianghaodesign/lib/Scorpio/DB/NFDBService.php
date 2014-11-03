<?php
require_once 'Scorpio/Utility/NFConstants.php';
require_once 'Doctrine/ORM/Tools/Setup.php';
require_once 'Doctrine/ORM/EntityManager.php';
require_once 'Doctrine/Common/EventManager.php';
require_once 'Doctrine/DBAL/DriverManager.php';

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Doctrine\DBAL\DriverManager;
use Doctrine\Common\EventManager;

class NFDBService {
    const DEFAULT_LIMIT = 20;
    const MAX_RESULTS_COUNT = 300;
    const OPERATION_CREATE = 'create';
    const OPERATION_DELETE = 'delete';
    const OPERATION_UPDATE = 'update';
    
    private static $connectionConfig;
    private static $annotationConfig;
    
    private $entityManager;
    
    public function __construct() {
        if (!self::$connectionConfig) {
            Setup::registerAutoloadPEAR();
            
            self::$connectionConfig = array(
                dbname => 'lianghao',
                driver => 'pdo_mysql',
                host => 'localhost',
                password => 'eric1980',
                user => 'root'
            );
            
            self::$annotationConfig = Setup::createAnnotationMetadataConfiguration(
                array(APPLICATION_ROOT_PATH . '/model/entity'), true);
        }
        
        $connection = DriverManager::getConnection(self::$connectionConfig, self::$annotationConfig);
        $this->entityManager = EntityManager::create($connection, self::$annotationConfig);
    }
    

    public function __destruct() {
        $this->entityManager->close();
    }
    
    /* http://docs.doctrine-project.org/projects/doctrine-orm/en/latest/reference/query-builder.html */
    public function getQueryBuilder() {
        return $this->entityManager->createQueryBuilder();
    }
    
    public function query($dql, $params = null) {
        if (empty($dql)) {
            throw new Exception('query statement is empty.', NFConstants::ERR_EMPTY_DQL);
        }
        
        $query = $this->entityManager->createQuery($dql);
        if (isset($params) && !empty($params)) {
            $query->setParameters($params);
        }
        
        return $query->getResult();
    }
    
    public function save($entity) {
        if (!isset($entity)) {
            throw new Exception('Invalid entity', NFConstants::ERR_INVALID_ENTITY);
        }
        
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}

?>