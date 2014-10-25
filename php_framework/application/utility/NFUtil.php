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
    
        return self::$baseUrl = self::$baseUrl . '/' . self::getAppName();
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
        if (!empty($path) && $path[0] != '/') {
            $path = "/index.php/$path";
        }
        
        return self::getBaseUrl() . $path;
    }
    
    /* get current application name */
    public static function getAppName() {
        $terms = split('[\/*+\/]', $_SERVER['SCRIPT_NAME']);
        return $terms[1];
    }
}
?>