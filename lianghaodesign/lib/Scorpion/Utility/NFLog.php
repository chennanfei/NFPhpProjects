<?php
class NFLog {
    const ERROR = 10;
    const FATAL = 1;
    const INFO = 8;
    const WARN = 11;
    
    private static $_log = NULL;
    private static $_customerPriorities = array(
        'error' => self::ERROR,
        'fatal' => self::FATAL,
        'info'  => self::INFO,
        'warn'  => self::WARN,
    );
    
    function __construct() {
        $now = UcdDate::nowToDateString();
        $logPath = SITE_ROOT_PATH . "/logs/website-$now.log";
        
        $format = '[%timestamp%] %priorityName% (%priority%): %message%' . PHP_EOL;
        $formatter = new \Zend_Log_Formatter_Simple($format);
        $writer = new \Zend_Log_Writer_Stream($logPath);
        $writer->setFormatter($formatter);
        $this->addWriter($writer);

        // $filter = new Zend_Log_Filter_Priority(self::WARN);
        // $this->addFilter($filter);
        
        foreach (self::$_customerPriorities as $key => $val) {
            $this->addPriority($key, $val);
        }
    }
    
    public static function getLog() {
        if (self::$_log == NULL) {
            self::$_log = new NFLog();
        }

        return self::$_log;
    }
    
    public function addFatal($message) {
        $this->writeLog($message, self::FATAL);
    }
    
    public function addError($message) {
        $this->writeLog($message, self::ERROR);
    }
    
    public function addInfo($message) {
        $this->writeLog($message, self::INFO);
    }
    
    public function addWarn($message) {
        $this->writeLog($message, self::WARN);
    }
    
    private function writeLog($message, $level) {
        if (empty($message) || empty($level)) {
            return;
        }

        try {
            parent::log($message, $level);
        } catch (\Exception $e) {
            UcdDebug::dump(array(
            	'message' => $message,
                'level' => $level,
                'error' => $e->getMessage()), 'Cannot log');
        }
        
    }
}
?>