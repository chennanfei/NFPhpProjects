<?php
class NFUtil {
    private static $baseUrl;
    
    public static function getBaseUrl() {
        if (isset(self::$baseUrl)) {
            return self::$baseUrl;
        }
        
        $port = $_SERVER['SERVER_PORT'];
        $protocol = split('[\/]', $_SERVER['SERVER_PROTOCOL'])[0];
        self::$baseUrl = ($protocol == 'HTTP' ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'];
        if (($protocol == 'HTTP' && $port != '80') || ($protocol == 'HTTPS' && $port != '443')) {
            self::$baseUrl .= ':' . $_SERVER['SEVER_PORT'];
        }
    
        $appName = self::getAppName();
        if (isset($appName)) {
            self::$baseUrl = self::$baseUrl . '/' . self::getAppName();
        }
        return self::$baseUrl;
    }
    
    public static function getImageUrl($path) {
        $baseUrl = self::getBaseUrl();
        return "$baseUrl/assets/images/$path";
    }
    
    public static function getScriptUrl($path) {
        $baseUrl = self::getBaseUrl();
        return "$baseUrl/assets/js/$path";
    }
    
    public static function getStylePath($path) {
        $baseUrl = self::getBaseUrl();
        return "$baseUrl/assets/css/$path";
    }
    
    /* generate absolute url */
    public static function getUrl($path) {
        return self::getBaseUrl() . "/index.php/$path";
    }
    
    /* get current application name */
    public static function getAppName() {
        $terms = split('[\/*+\/]', $_SERVER['SCRIPT_NAME']);
        if ($terms[1] == 'index.php') {
            return null;
        }
        return $terms[1];
    }
    
    public static function getRealIP() {  
        $realIP = null;  
        if (isset($_SERVER)) {  
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $realIP = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {  
                $realIP = $_SERVER['HTTP_CLIENT_IP'];  
            } else {  
                $realIP = $_SERVER['REMOTE_ADDR'];  
            }  
        } else {  
            if (getenv('HTTP_X_FORWARDED_FOR')) {  
                $realIP = getenv( 'HTTP_X_FORWARDED_FOR');  
            } elseif (getenv('HTTP_CLIENT_IP')) {  
                $realIP = getenv('HTTP_CLIENT_IP');  
            } else {  
                $realIP = getenv('REMOTE_ADDR');  
            }  
        }  
        return $realIP;  
    }
    
    public static function now($format = 'Y-m-d H:i:s') {
        return date($format);
    }
}
?>